<?php
use MercadoPago\Client\Payment\PaymentClient;

require_once "../vendor/autoload.php";
require_once "../Config/Config.php";
require_once "../Libraries/Core/Conexion.php";


//file_put_contents("../log_webhook.txt", date('Y-m-d H:i:s') . " - " . file_get_contents("php://input") . PHP_EOL, FILE_APPEND);
function logWebhook($mensaje) {
    file_put_contents("../log_webhook.txt", date('Y-m-d H:i:s') . " - " . $mensaje . PHP_EOL, FILE_APPEND);
}
// Leer input
$input = file_get_contents("php://input");
logWebhook("Payload recibido: " . $input);

$event = json_decode($input, true);

// Validar estructura
if (!$event || !isset($event["type"]) || $event["type"] !== "payment") {
    logWebhook("Tipo de evento no es 'payment'.");
    http_response_code(400);
    exit("Notificación inválida.");
}

$paymentId = $event["data"]["id"] ?? null;

if (!$paymentId) {
    logWebhook("No se recibió ID de pago.");
    http_response_code(400);
    exit("ID de pago no encontrado.");
}

try {
    // Obtener info del pago desde la API
    logWebhook("Consultando API de MercadoPago con ID: $paymentId");
    MercadoPago\MercadoPagoConfig::setAccessToken(ACCESS_TOKEN_MP);
    $client = new PaymentClient();
    $payment = $client->get($paymentId);

    if ($payment->status !== "approved") {
        logWebhook("Pago no aprobado. Status: " . $payment->status);
        http_response_code(200);
        exit("Pago aún no aprobado.");
    }

    // Datos para registrar
    $transaccionid = $payment->external_reference;
    logWebhook("Transacción externa: " . $transaccionid);
    $fecha = date('Y-m-d H:i:s');
    $monto = $payment->transaction_amount;
    $status = $payment->status;
    $tipopagoid = 3; // MercadoPago
    $direccion = "Dirección por defecto"; 
    $costo_envio = COSTOENVIO;

    // Conexión a base de datos
    $con = new Conexion();
    $pdo = $con->conect();

    // Obtener productos temporales
    $stmt = $pdo->prepare("SELECT * FROM detalle_temp WHERE transaccionid = ?");
    $stmt->execute([$transaccionid]);
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$productos) {
        http_response_code(404);
        exit("No se encontraron productos para esta transacción.");
    }

    $personaid = $productos[0]["personaid"];

    // Insertar en pedido
    $stmt = $pdo->prepare("INSERT INTO pedido (referenciacobro, idtransaccionpaypal, datospaypal, personaid, fecha, costo_envio, monto, tipopagoid, direccion_envio, status)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $transaccionid,
        $paymentId,
        json_encode($payment),
        $personaid,
        $fecha,
        $costo_envio,
        $monto,
        $tipopagoid,
        $direccion,
        $status
    ]);

    $pedido_id = $pdo->lastInsertId();
    logWebhook("Pedido registrado. ID: $pedido_id");

    // Insertar detalle del pedido
    foreach ($productos as $prod) {
        $stmt = $pdo->prepare("INSERT INTO detalle_pedido (pedidoid, productoid, precio, cantidad) VALUES (?, ?, ?, ?)");
        $stmt->execute([$pedido_id, $prod["productoid"], $prod["precio"], $prod["cantidad"]]);
    }

    // Eliminar de tabla temporal
    $stmt = $pdo->prepare("DELETE FROM detalle_temp WHERE transaccionid = ?");
    $stmt->execute([$transaccionid]);

    // Éxito
    http_response_code(200);
    echo "Pedido registrado correctamente.";

} catch (Exception $e) {
    file_put_contents("../log_webhook.txt", "ERROR: " . $e->getMessage() . PHP_EOL, FILE_APPEND);
    http_response_code(500);
    echo "Error en el webhook: " . $e->getMessage();
}
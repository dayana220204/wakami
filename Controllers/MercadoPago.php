<?php

namespace Examples\Preference;

header('Content-Type: application/json');
require_once "../vendor/autoload.php";
require_once "../Config/Config.php";
require_once "../Libraries/Core/Conexion.php";

use Conexion;

use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Exceptions\MPApiException;
use MercadoPago\MercadoPagoConfig;

// Add access token e inicializar access token
MercadoPagoConfig::setAccessToken(ACCESS_TOKEN_MP);
$client = new PreferenceClient();

// --------------
// Conexion a bd
// --------------
session_start();
$con = new Conexion();
$pdo = $con->conect();


$data = json_decode(file_get_contents("php://input"), true);
$productos = $data["products"] ?? [];
$transaccionid = uniqid('mp_', true); // ejemplo: mp_64exxxxxxx
$personaid = htmlspecialchars($_SESSION["userData"]["idpersona"], ENT_QUOTES, "UTF-8");

// ------------------------------------
// Insertar productos en la tabla temp
// --------------------------------..
foreach ($productos as $producto) {
    $stmt = $pdo->prepare("INSERT INTO detalle_temp (personaid, productoid, precio, cantidad, transaccionid) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([
        $personaid,
        $producto["idproducto"],
        $producto["precio"],
        $producto["cantidad"],
        $transaccionid
    ]);
}


// ----------------
// crear preferencia
// ----------------

try {
    $request = [
        "items" => [],
        "payment_methods" => [
            "excluded_payment_types" => [], // No excluir ningun método de pago
            "installments" => 1  // Solo permitir una cuota
        ],
        "back_urls" => [ // Definimos pahts
            "success" => "https://dc91-2803-a3e0-19e2-6070-357d-6dcb-c8d9-1cc9.ngrok-free.app/",
            "failure" => "https://wakamieventos.com/pago-fallido.php",
            "pending" => "https://wakamieventos.com/pago-pendiente.php"
        ],
        "auto_return" => "approved", // Redirige automaticamente si el pago es exitoso
        "notification_url" => "https://dc91-2803-a3e0-19e2-6070-357d-6dcb-c8d9-1cc9.ngrok-free.app/webhooks/mercadopago.php",
        "external_reference" => $transaccionid,
    ];

    $items = [];

    foreach ($productos as $producto) {
        $items[] = [
            "title" => $producto["producto"],
            "unit_price" => (float)$producto["precio"],
            "quantity" => (int)$producto["cantidad"]
        ];
    }

    // Agregar ítem de costo de envío
    $items[] = [
        "title" => "Envío",
        "unit_price" => (float)COSTOENVIO,
        "quantity" => 1
    ];

    // Asignar items al request
    $request["items"] = $items;

    //Hacer la solicitud
    $preference = $client->create($request);
    echo json_encode(["preferenceId" => $preference->id]);

} catch (MPApiException $e) {

    echo "Status code: " . $e->getApiResponse()->getStatusCode() . "\n";
    echo "Content: ";
    var_dump($e->getApiResponse()->getContent());
    echo "\n";
} catch (\Exception $e) {
    echo $e->getMessage();
}

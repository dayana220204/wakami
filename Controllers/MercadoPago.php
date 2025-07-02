<?php

namespace Examples\Preference;

header('Content-Type: application/json');
require_once "../vendor/autoload.php"; //carga todas las clase de mercado pago
require_once "../Config/Config.php";


use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Exceptions\MPApiException;
use MercadoPago\MercadoPagoConfig;

// Add access token e inicializar access token
MercadoPagoConfig::setAccessToken(ACCESS_TOKEN_MP);
$client = new PreferenceClient();

$data = json_decode(file_get_contents("php://input"), true);
$productos = $data["products"] ?? [];


try {
    $request = [
        "items" => [],
        "payment_methods" => [
            "excluded_payment_types" => [], // No excluir ningun método de pago
            "installments" => 1  // Solo permitir una cuota
        ],
        "back_urls" => [ // Definimos pahts
            "success" => "https://wakamieventos.com/pago-exitoso.php",
            "failure" => "https://wakamieventos.com/pago-fallido.php",
            "pending" => "https://wakamieventos.com/pago-pendiente.php"
        ],
        "auto_return" => "approved", // Redirige automaticamente si el pago es exitoso
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

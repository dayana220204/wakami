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
$total = $data["products"] ?? null;

try {
    $request = [
        "items" => [
            [
                "title" => "Producto(s) Wakamy",
                "unit_price" => (float)$total,
                "quantity" => 1,
            ]
        ],
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


    //-------------------
    //Hacer la solicitud
    //-------------------
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

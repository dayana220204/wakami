<?php

require_once "../vendor/autoload.php";
require_once "../Config/Config.php";

use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Exceptions\MPApiException;
use MercadoPago\MercadoPagoConfig;


class MercadoPago extends Controllers
{

    /* public function create_preference()
    {

        // 1) Fuerza salida JSON
        header('Content-Type: application/json');

        // 2) Lee el payload del fetch
        $input = json_decode(file_get_contents('php://input'), true);

        // 3) Prepara un ID de prueba
        $preferenceId = 'TEST_' . uniqid();

        // 4) Devuelve algo parecido a lo que espera tu JS
        echo json_encode([
            'preferenceId' => $preferenceId,
            'received'     => $input['products']  // para ver lo que mandaste
        ]);
    } */

    public function create_preference() 
    {
        header('Content-Type: application/json');

        MercadoPagoConfig::setAccessToken(ACCESS_TOKEN_MP);
        $client = new PreferenceClient();            

        try {
            $request = [
                "items" => [
                    [
                        "title" => "Product",
                        "unit_price" => 10,
                        "quantity" => 1
                    ]
                ],
                "payment_methods" => [
                    "excluded_payment_types" => [], // No excluir ningun método de pago
                    "installments" => 1  // Solo permitir una cuota
                ],
                "back_urls" => [ // Definimos pahts
                    "success" => "https://hd0bbg0n-8000.use.devtunnels.ms/view/payNotification/pago-exitoso.php",
                    "failure" => "https://hd0bbg0n-8000.use.devtunnels.ms/view/payNotification/pago-fallido.php",
                    "pending" => "https://hd0bbg0n-8000.use.devtunnels.ms/view/payNotification/pago-pendiente.php"
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

    }
}

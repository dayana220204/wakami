document.addEventListener("DOMContentLoaded", () => {
    const Carrito = JSON.parse(document.getElementById("data_mp").dataset.products);
    const PUBLIC_KEY_MP = document.getElementById("data_mp").dataset.key;
    const BASE_URL = document.getElementById("data_mp").dataset.url;
    let Click = false;
    //const total_pagar = document.getElementById("data_mp").dataset.total;
    const mp = new MercadoPago(PUBLIC_KEY_MP, {
        locale: "es-PE"
    });
    // Accion principal
    document.getElementById("PagarMC").addEventListener("click", () => {
        if (Click) return;
        Click = true;
        
        document.getElementById("loadermp").style.display = "flex";
        SendData();
    })

    function SendData() {

        //ENVIAR EL CARRITO AL BACKEND
        //const carrito = JSON.parse(localStorage.getItem("cart")); // convierte texto a JSON
        //console.log(carrito);
        fetch(`${BASE_URL}/Controllers/MercadoPago.php`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                products: Carrito
            }) 
        })
            .then(res => res.json())
            .then(data => {
                console.log("Respuesta del backend:");
                console.log(data);
                document.getElementById("loadermp").style.display = "none";
                const preferenceId = data.preferenceId;
                generateBrick(preferenceId);
            })
            .catch(error => {
                console.error("Ocurrió un error en el fetch:", error);
                document.getElementById("loadermp").style.display = "none";
            });
    }

    function generateBrick(preferenceId) {
        mp.bricks().create("wallet", "wallet_container", {
            initialization: {
                redirectMode: "self",
                preferenceId: preferenceId
            },

            callbacks: {
                onReady: () => {
                    console.log("Brick listo");
                },
                onSubmit: (data) => {
                    // SE PUEDE USAR PARA REGISTRAR ORDEN EN LA BD
                    if (!data || !data.paymentData) {
                        console.error("No se recibió paymentData:", data); // ESTO SALE POR DEFAULT
                        return;
                    }
                    console.log("Pago enviado", data.paymentData);
                },
                onError: (error) => {
                    console.error("Error en el pago", error);
                    alert("Hubo un problema con el pago. Intenta Nuevamente");
                },
                onPaymentApproved: (payment) => {
                    console.log("Pago Aprobado", payment);
                    window.location.href = "<?= $BASE_URL ?>/view/payNotification/pago-exitoso.php";
                },
                onPaymentRejected: (payment) => {
                    console.log("Pago rechazado", payment);
                    window.location.href = "<?= $BASE_URL ?>/view/payNotification/pago-fallido.php";
                }
            },

            customization: {
                theme: "dark", // TEMA DEL BOTON
                customStyle: {
                    valueProp: 'practicality',
                },
            }
        })
    }


})

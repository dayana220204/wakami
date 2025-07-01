<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $data['page_tag']; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Al hacer clic en una opción del encabezado
            $('.header-option').on('click', function() {
                // Eliminar la clase activa de todas las opciones del encabezado
                $('.header-option').removeClass('header-option-active');

                // Agregar la clase activa a la opción clicada
                $(this).addClass('header-option-active');
            });
        });
    </script>

    <?php
    $nombreSitio = NOMBRE_EMPESA;
    $descripcion = DESCRIPCION;
    $nombreProducto = NOMBRE_EMPESA;
    $urlWeb = base_url();
    $urlImg = media() . "/images/portada.jpg";
    if (!empty($data['producto'])) {
        //$descripcion = $data['producto']['descripcion'];
        $descripcion = DESCRIPCION;
        $nombreProducto = $data['producto']['nombre'];
        $urlWeb = base_url() . "/tienda/producto/" . $data['producto']['idproducto'] . "/" . $data['producto']['ruta'];
        $urlImg = $data['producto']['images'][0]['url_image'];
    }


    ?>
    <meta property="og:locale" content='es_ES' />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="<?= $nombreSitio; ?>" />
    <meta property="og:description" content="<?= $descripcion; ?>" />
    <meta property="og:title" content="<?= $nombreProducto; ?>" />
    <meta property="og:url" content="<?= $urlWeb; ?>" />
    <meta property="og:image" content="<?= $urlImg; ?>" />

    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= media() ?>/tienda/images/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/fonts/linearicons-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/MagnificPopup/magnific-popup.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/chosen.min.css">
    <!--===============================================================================================-->
</head>

<style>
    .mt-100 {
        margin-top: 100px
    }

    body {
        background: #00B4DB;
        background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);
        background: linear-gradient(to right, #0083B0, #00B4DB);
        color: #514B64;
        min-height: 100vh
    }

    input:focus,
    textarea:focus,
    select:focus,
    option:focus {
        border-color: #FD4D5A !important;
        border-width: 2px !important;
    }
</style>

<body>

    <div style="background-image: url(<?= media() . '/tienda/images/hero.jpg'; ?>); width: 100%">

        <div class="py-5" style="width: 100%;">
            <!-- End -->
            <div class="">
                <div class="mx-auto " style="width: 75%;">
                    <div class=" rounded-lg shadow-sm" style="opacity: 1; background-color: #2A2A2A; border-radius: 20px; padding: 5rem 10rem;">
                        <div class="row mb-3">
                            <div class=" mx-auto text-left">
                                <h1 class="h3 font-weight-bold text-white pb-1" style="font-family: Montserrat-Bold;">COTIZA CON NOSOTROS</h1>
                                <hr style="border-width: 2px; border-color: #5D5D5D; ">
                            </div>
                        </div>

                        <div class="tab-content">

                            <!-- credit card info-->
                            <div id="nav-tab-card" class="tab-pane fade show active">

                                <form role="form" action="" method="POST" id="formCotizar">
                                    <input type="hidden" name="situacion" id="situacion" value="PENDIENTE">
                                    <div class="form-group">
                                        <!-- <label for="username" class="">ID</label> -->
                                        <input type="hidden" name="id_cotizacion" id="id_cotizacion" placeholder="ID de cotización" required class="form-control">
                                    </div>

                                    <div class="input-group">
                                        <div class="form-group w-50">
                                            <label for="username" class=" text-white" style="font-family: Montserrat-Regular;">Tipo de evento</label>
                                            <select name="id_tipo_evento" id="id_tipo_evento" class="form-control w-100 text-white " style="background-color: #3F3F3F; border-color: #5D5D5D; border-radius: 10px; font-family: Montserrat-Regular;">
                                                <option value="TP001">Boda</option>
                                                <option value="TP002">Quinceañera</option>
                                            </select>
                                        </div>
                                        &nbsp;
                                        &nbsp;
                                        <div class="form-group w-50">
                                            <label for="username" class="text-white" style="font-family: Montserrat-Regular;">¿Cómo deseas que te contactemos?</label>
                                            <select name="id_metodo_atencion" id="id_metodo_atencion" class="form-control w-100 text-white" style="background-color: #3F3F3F; border-color: #5D5D5D;  border-radius: 10px; font-family: Montserrat-Regular;">
                                                <option value="M01">Por Whatsapp</option>
                                                <option value="M02">Porllamada</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="input-group">
                                        <div class="form-group w-50">
                                            <label for="username" class="text-white" style="font-family: Montserrat-Regular;">Nombres <span class="text-danger h4">*</span></label>
                                            <input type="text" name="nombres" id="nombres" placeholder="Ingrese nombres" class="form-control w-100 text-white" style="background-color: #3F3F3F;  border-color: #5D5D5D;  border-radius: 10px; font-family: Montserrat-Regular;" required>
                                        </div>
                                        &nbsp;
                                        &nbsp;
                                        <div class="form-group w-50">
                                            <label for="username" class="text-white" style="font-family: Montserrat-Regular;">Apellidos <span class="text-danger h4">*</span></label>
                                            <input type="text" name="apellidos" id="apellidos" placeholder="Ingrese apellidos" class="form-control w-100 text-white" style="background-color: #3F3F3F; border-color: #5D5D5D;  border-radius: 10px; font-family: Montserrat-Regular;" required>
                                        </div>
                                    </div>

                                    <div class="input-group">
                                        <div class="form-group" style="width: 33.3%">
                                            <label for="username" class="text-white" style="font-family: Montserrat-Regular;">Celular <span class="text-danger h5">*</span></label>
                                            <input type="number" name="celular" id="celular" placeholder="Ingrese celular" class="form-control w-100 text-white" style="background-color: #3F3F3F; border-color: #5D5D5D;  border-radius: 10px; font-family: Montserrat-Regular;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required maxlength="9">
                                        </div>
                                        &nbsp;
                                        &nbsp;
                                        <div class="form-group" style="width: 33.3%">
                                            <label for="username" class="text-white" style="font-family: Montserrat-Regular;">Teléfono fijo</label>
                                            <input type="number" name="telefono_fijo" id="telefono_fino" placeholder="Ingrese teléfono fijo" class="form-control  w-100 text-white" style="background-color: #3F3F3F; border-color: #5D5D5D;  border-radius: 10px; font-family: Montserrat-Regular;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required maxlength="9">
                                        </div>
                                        &nbsp;
                                        &nbsp;
                                        <div class="form-group" style="width: 33.3%">
                                            <label for="username" class="text-white" style="font-family: Montserrat-Regular;">Correo</label>
                                            <input type="email" name="correo" id="correo" placeholder="Ingrese correo" class="form-control  w-100 text-white" style="background-color: #3F3F3F; border-color: #5D5D5D;  border-radius: 10px; font-family: Montserrat-Regular">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="username" class="text-white" style="font-family: Montserrat-Regular;">Nombre de la empresa</label>
                                        <input type="text" name="nombre_empresa" id="nombre_empresa" placeholder="Ingrese el nombre de la empresa" class="form-control text-white" style="background-color: #3F3F3F; border-color: #5D5D5D; border-radius: 10px; font-family: Montserrat-Regular;" required>
                                    </div>

                                    <div class="input-group">
                                        <div class="form-group w-25">
                                            <label for="username" class="text-white" style="font-family: Montserrat-Regular;">Número de invitados <span class="text-danger h4">*</span></label>
                                            <input type="number" name="n_invitados" id="n_invitados" placeholder="Ingrese el número de invitados" class="form-control w-100  text-white" style="background-color: #3F3F3F; border-color: #5D5D5D;  border-radius: 10px; font-family: Montserrat-Regular;" required>
                                        </div>
                                        &nbsp;
                                        &nbsp;
                                        <div class="form-group w-25">
                                            <label for="username" class="text-white" style="font-family: Montserrat-Regular;">Fecha del evento <span class="text-danger h4">*</span></label>
                                            <input type="date" class="form-control w-100 text-white d-inline-block" name="fecha_evento" id="fecha_evento" style="color-scheme: dark; background-color: #3F3F3F; border-color: #5D5D5D;  border-radius: 10px; font-family: Montserrat-Regular;" required>
                                        </div>
                                        &nbsp;
                                        &nbsp;
                                        <div class="form-group w-25">
                                            <label for="username" class="text-white" style="font-family: Montserrat-Regular;">Hora de inicio <span class="text-danger h4">*</span></label>
                                            <input type="time" name="hora_inicio" id="hora_inicio" class="form-control w-100 text-white d-inline-block" style="color-scheme: dark; background-color: #3F3F3F; border-color: #5D5D5D; border-radius: 10px; font-family: Montserrat-Regular;" required>
                                        </div>
                                        &nbsp;
                                        &nbsp;
                                        <div class="form-group w-25">
                                            <label for="username" class="text-white" style="font-family: Montserrat-Regular;">Hora de fin <span class="text-danger h4">*</span></label>
                                            <input type="time" name="hora_fin" id="hora_fin" class="form-control w-100 text-white d-inline-block" style="color-scheme: dark; background-color: #3F3F3F; border-color: #5D5D5D; border-radius: 10px; font-family: Montserrat-Regular;" required>
                                        </div>
                                    </div>

                                    <!-- <div class="form-group w-100 d-inline-block">
                                        <label for="username" class="text-white" style="font-family: Montserrat-Regular;">Servicios que se desea incluir<span class="text-danger h4">*</span></label>

                                        <input type="checkbox" class="d-inline-block "><span class="text-white p-3" style="font-family: Montserrat-Regular;">Buffete Criollo</span>
                                        <input type="checkbox" class="d-inline-block "><span class="text-white p-3" style="font-family: Montserrat-Regular;">Bocaditos</span>
                                        <input type="checkbox" class="d-inline-block "><span class="text-white p-3" style="font-family: Montserrat-Regular;">Sandwich</span>
                                        <input type="checkbox" class="d-inline-block "><span class="text-white p-3" style="font-family: Montserrat-Regular;">Platos servidos</span>
                                        <input type="checkbox" class="d-inline-block "><span class="text-white p-3" style="font-family: Montserrat-Regular;">Mesa de dulces</span>
                                    </div> -->




                                    <div class="form-group">
                                        <label for="username" class="text-white" style="font-family: Montserrat-Regular;">Otros detalles o comentarios</label>
                                        <textarea name="detalles_comentarios" id="detalles_comentarios" class="form-control text-white" style="background-color: #3F3F3F; border-color: #5D5D5D; border-radius: 10px; font-family: Montserrat-Regular;"></textarea>
                                    </div>

                                    <div style="display: inline-block; font-family: Montserrat-Regular;">
                                        <div style="width: 90px; display: inline-block;" class="text-white">
                                            Suscribirse
                                        </div>
                                        <div style="display: inline-block;">
                                            <input type="checkbox" name="suscrito" id="suscrito" class="form-control" style="width:20px; height:20px;">
                                        </div>
                                    </div>



                                    <div class="d-flex">
                                        <button id="btnActionForm" name="btnActionForm" class="btn btn-danger ml-auto" type="submit" style="width: 15%; height: 45px;">
                                            <i class="bi bi-check-circle-fill me-2"></i>
                                            <span id="btnEnviar" style="font-family: Montserrat-Bold;">Enviar</span>
                                        </button>

                                        <!-- <button class="btnhj btn-primary" data-toggle="modal" data-target="#exampleModal">TEST</button> -->
                                    </div>


                                    <!-- 
                                        <div class="form-group">
                                            <label for="cardNumber">Card number</label>
                                            <div class="input-group">
                                                <input type="text" name="cardNumber" placeholder="Your card number" class="form-control" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text text-muted">
                                                        <i class="fa fa-cc-visa mx-1"></i>
                                                        <i class="fa fa-cc-amex mx-1"></i>
                                                        <i class="fa fa-cc-mastercard mx-1"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label><span class="hidden-xs">Expiration</span></label>
                                                    <div class="input-group">
                                                        <input type="number" placeholder="MM" name="" class="form-control" required>
                                                        <input type="number" placeholder="YY" name="" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-4">
                                                    <label data-toggle="tooltip" title="Three-digits code on the back of your card">CVV
                                                        <i class="fa fa-question-circle"></i>
                                                    </label>
                                                    <input type="text" required class="form-control">
                                                </div>
                                            </div>



                                        </div>
                                        <button type="button" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> Confirm </button> -->
                                </form>
                            </div>
                            <!-- End -->

                            <!-- Paypal info -->
                            <!-- <div id="nav-tab-paypal" class="tab-pane fade">
                                <p>Paypal is easiest way to pay online</p>
                                <p>
                                    <button type="button" class="btn btn-primary rounded-pill"><i class="fa fa-paypal mr-2"></i> Log into my Paypal</button>
                                </p>
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                </p>
                            </div> -->
                            <!-- End -->

                            <!-- bank transfer info -->
                            <!-- <div id="nav-tab-bank" class="tab-pane fade">
                                <h6>Bank account details</h6>
                                <dl>
                                    <dt>Bank</dt>
                                    <dd> THE WORLD BANK</dd>
                                </dl>
                                <dl>
                                    <dt>Account number</dt>
                                    <dd>7775877975</dd>
                                </dl>
                                <dl>
                                    <dt>IBAN</dt>
                                    <dd>CZ7775877975656</dd>
                                </dl>
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                </p>
                            </div> -->
                            <!-- End -->
                            <!-- </div> -->
                            <!-- End -->

                            <!-- </div> -->
                            <!-- </div> -->
                            <!-- </div> -->
                            <!-- </div> -->



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    // getModal('modalCotizar', $data);
    ?>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</body>




<script>
    const base_url = "<?= base_url(); ?>";


    $(document).ready(function() {

        var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
            removeItemButton: true,
            maxItemCount: 5,
            searchResultLimit: 5,
            renderChoiceLimit: 5
        });


    });
</script>

<!-- Essential javascripts for application to work-->
<script src="<?= media(); ?>js/jquery-3.7.0.min.js"></script>
<script src="<?= media(); ?>js/bootstrap.min.js"></script>
<script src="<?= media(); ?>js/main.js"></script>

<script src="<?= media(); ?>js/chosen/chosen.jquery.min.js"></script>
<script src="<?= media(); ?>js/main.js"></script>

<!-- Data table plugin-->
<script type="text/javascript" src="<?= media(); ?>js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= media(); ?>js/bootstrap.min.js"></script>

<!--Notificaaciones de Swal -->
<script src="<?= media(); ?>js/plugins/sweetalert2.js"></script>

<script src="<?= media(); ?>/js/functionsCotizar.js"></script>
<?php footerAdmin($data); ?>
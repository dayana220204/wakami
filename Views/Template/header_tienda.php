 <?php 
	$cantCarrito = 0;
	if(isset($_SESSION['arrCarrito']) and count($_SESSION['arrCarrito']) > 0){ 
		foreach($_SESSION['arrCarrito'] as $product) {
			$cantCarrito += $product['cantidad'];
		}
	}
	$tituloPreguntas = !empty(getInfoPage(PPREGUNTAS)) ? getInfoPage(PPREGUNTAS)['titulo'] : "";
	$infoPreguntas = !empty(getInfoPage(PPREGUNTAS)) ? getInfoPage(PPREGUNTAS)['contenido'] : "";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?= $data['page_tag']; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 

    <!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?= media() ?>/tienda/images/favicon.ico"/>
	<!--===============================================================================================-->

    <!-- Bootstrap Core CSS -->
    <link href="<?= media() ?>/tienda/asset/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome CSS -->
    <link href="<?= media() ?>/tienda/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- Animate CSS -->
    <link href="<?= media() ?>/tienda/css/animate.css" rel="stylesheet" >
    
    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="<?= media() ?>/tienda/css/owl.carousel.css" >
    <link rel="stylesheet" href="<?= media() ?>/tienda/css/owl.theme.css" >
    <link rel="stylesheet" href="<?= media() ?>/tienda/css/owl.transitions.css" >

    <!-- Custom CSS -->
    <link href="<?= media() ?>/tienda/css/style.css" rel="stylesheet">
    <link href="<?= media() ?>/tienda/css/responsive.css" rel="stylesheet">
    <!-- Colors CSS -->
    <link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/css/color/green.css">
    <!-- Colors CSS -->
    <link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/css/color/green.css" title="green">
    <link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/css/color/light-red.css" title="light-red">
    <link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/css/color/blue.css" title="blue">
    <link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/css/color/light-blue.css" title="light-blue">
    <link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/css/color/yellow.css" title="yellow">
    <link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/css/color/light-green.css" title="light-green">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/fonts/linearicons-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/MagnificPopup/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/style.css">



    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <!-- Modernizer js -->
    <script src="<?= media() ?>/tienda/js/modernizr.custom.js"></script>
	<!--  MERCAQDO PAGO SDK    -->
    <script src="https://sdk.mercadopago.com/js/v2"></script>


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
		$urlImg = media()."/images/portada.jpg";
		if(!empty($data['producto'])){
			//$descripcion = $data['producto']['descripcion'];
			$descripcion = DESCRIPCION;
			$nombreProducto = $data['producto']['nombre'];
			$urlWeb = base_url()."/tienda/producto/".$data['producto']['idproducto']."/".$data['producto']['ruta'];
			$urlImg = $data['producto']['images'][0]['url_image'];
		}
	?>
	<meta property="og:locale" 		content='es_ES'/>
	<meta property="og:type"        content="website" />
	<meta property="og:site_name"	content="<?= $nombreSitio; ?>"/>
	<meta property="og:description" content="<?= $descripcion; ?>" />
	<meta property="og:title"       content="<?= $nombreProducto; ?>" />
	<meta property="og:url"         content="<?= $urlWeb; ?>" />
	<meta property="og:image"       content="<?= $urlImg; ?>" />

 

<!--===============================================================================================-->



</head>
  <!-- Header desktop -->


		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="<?= base_url(); ?>"><img src="<?= media() ?>/tienda/images/logo.png" alt="Tienda Virtual"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>
				<?php if($data['page_name'] != "carrito" and $data['page_name'] != "procesarpago"){ ?>
				<div class="cantCarrito icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?= $cantCarrito; ?>">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>
				<?php } ?>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>
<body class="index">
    
    <!-- =============== Styleswitcher =============== -->
        <div class="colors-switcher" style=" right: -100px;">
            <a id="show-panel" class="hide-panel"><i class="fa fa-tint"></i></a>        
                <ul class="colors-list">
                    <li><a title="Light Red" onClick="setActiveStyleSheet('light-red'); return false;" class="light-red"></a></li>
                    <li><a title="Blue" class="blue" onClick="setActiveStyleSheet('blue'); return false;"></a></li>
                    <li class="no-margin"><a title="Light Blue" onClick="setActiveStyleSheet('light-blue'); return false;" class="light-blue"></a></li>
                    <li><a title="Green" class="green" onClick="setActiveStyleSheet('green'); return false;"></a></li>
                    
                    <li class="no-margin"><a title="light-green" class="light-green" onClick="setActiveStyleSheet('light-green'); return false;"></a></li>
                    <li><a title="Yellow" class="yellow" onClick="setActiveStyleSheet('yellow'); return false;"></a></li>
                </ul>
        </div>  
<!-- =============== Styleswitcher End ================= -->




	<div class="container-menu-desktop">
				    <!-- Navigation -->
	    <nav class="navbar navbar-default navbar-fixed-top">
	        <div class="container">
	            <!-- Brand and toggle get grouped for better mobile display -->
	            <div class="navbar-header page-scroll">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand page-scroll" href="index.php">Wakami</a>
	            </div>

	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	                <ul class="nav navbar-nav navbar-right">
	                    <li class="hidden">
	                        <a href="#page-top"></a>
	                    <li>
	                        <a class="page-scroll" href="index.php">Inicio</a>
	                    </li>
	                    <li>
	                        <a class="page-scroll" href="#about-us">Nosotros</a>
	                    </li>
	                    <li>
	                        <a class="page-scroll" href="#service">Servicios</a>
	                    </li>
	                    <li>
	                        <a class="page-scroll" href="#team">Equipo</a>
	                    </li>
	                    <li>
	                        <a class="page-scroll" href="#pricing">Producto</a>
	                    </li>
	                    <!--
	                    <li>
	                        <a class="page-scroll" href="#latest-news">Novedades</a>
	                    </li>
	                    <li>
	                        <a class="page-scroll" href="#testimonial">Tes</a>
	                    </li>
	                	-->
	                    <li>
	                        <a class="page-scroll" href="#partner">Partner</a>
	                    </li>
	                    <li>
	                        <a class="page-scroll" href="#contact">Contacto</a>
	                    </li>

	                    <?php if(isset($_SESSION['login'])){ ?>
						<li>
						    <a class="page-scroll" href="<?= base_url() ?>/dashboard">
						        Mi cuenta
						    </a>
						</li>
						<li>
						    <a class="page-scroll" href="<?= base_url() ?>/logout">
						        Salir
						    </a>
						</li>
						<?php } else { ?>
						<li>
						    <a class="page-scroll" href="<?= base_url() ?>/login">
						        Iniciar Sesión
						    </a>
						</li>
						<?php } ?>


	                    <!-- Icon header -->
						<div class="wrap-icon-header flex-w flex-r-m">
							 
							<?php if($data['page_name'] != "carrito" and $data['page_name'] != "procesarpago"){ ?>
							<div class="cantCarrito icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?= $cantCarrito; ?> ">
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>
							<?php } ?>
						</div>



	                </ul>
	            </div>
	            <!-- /.navbar-collapse -->
	        </div>
	        <!-- /.container-fluid -->

	        <!-- Cart -->
		<div class="wrap-header-cart js-panel-cart">
			<div class="s-full js-hide-cart"></div>
			<div class="header-cart flex-col-l p-l-65 p-r-25">
				<div class="header-cart-title flex-w flex-sb-m p-b-8">
					<span class="mtext-103 cl2">
						Tu carrito
					</span>

					<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
						<i class="zmdi zmdi-close"></i>
					</div>
				</div>
				<div id="productosCarrito" class="header-cart-content flex-w js-pscroll">
					<?php getModal('modalCarrito',$data); ?>
				</div>
			</div>
		</div>

	    </nav>
	</div>

    

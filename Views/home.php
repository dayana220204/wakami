<?php 
	headerTienda($data);
	$arrSlider = $data['slider'];
	$arrBanner = $data['banner'];
	$arrProductos = $data['productos'];

	$contentPage = "";
	if(!empty($data['page'])){
		$contentPage = $data['page']['contenido'];
	}
	 
 ?>


    <!-- Start Home Page Slider -->
    <section id="page-top">
        <!-- Carousel -->
        <div id="main-slide" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#main-slide" data-slide-to="0" class="active"></li>
                <li data-target="#main-slide" data-slide-to="1"></li>
                <li data-target="#main-slide" data-slide-to="2"></li>
            </ol>
            <!--/ Indicators end-->

            <!-- Carousel inner -->
            <div class="carousel-inner">
                <div class="item active">
                    <img class="img-responsive" src="<?= media() ?>/tienda/images/s1.png" alt="slider">
                    <div class="slider-content">
                        <div class="col-md-12 text-center">
                            <h1 class="animated3">
                                <span><strong>Wakami</strong> Eventos corporativos</span>
                            </h1>
                            <p class="animated2">Transformamos ideas en experiencias que destacan.</p>	
                           <a class="animated3 slider btn btn-primary btn-min-block" href="cotizar" target="_blank">Cotizar</a>

                        </div>
                    </div>
                </div>
                <!--/ Carousel item end -->
                
                <div class="item">
                    <img class="img-responsive" src="<?= media() ?>/tienda/images/s2.png" alt="slider">
                    
                    <div class="slider-content">
                        <div class="col-md-12 text-center">
                            <h1 class="animated1">
                    		  <span>EXPERIENCIAS <strong>MEMORABLES</strong></span>
                    	    </h1>
                            <p class="animated2">Crea conexiones duraderas con estrategias fuera de lo convencional.</p>
                            <a class="animated3 slider btn btn-primary btn-min-block" href="cotizar" target="_blank">Cotizar</a>

                        </div>
                    </div>
                </div>
                <!--/ Carousel item end -->
                
                <div class="item">
                    <img class="img-responsive" src="<?= media() ?>/tienda/images/s33.png" alt="slider">
                    <div class="slider-content">
                        <div class="col-md-12 text-center">
                            <h1 class="animated2">
                                <span>Crea <strong>Impacto</strong></span>
                            </h1>
                            <p class="animated1">Transformamos ideas en experiencias que destacan</p>	
                             <a class="animated3 slider btn btn-primary btn-min-block" href="cotizar" target="_blank">Cotizar</a>

                                
                        </div>
                    </div>
                </div>
                <!--/ Carousel item end -->
            </div>
            <!-- Carousel inner end-->

            <!-- Controls -->
            <a class="left carousel-control" href="#main-slide" data-slide="prev">
                <span><i class="fa fa-angle-left"></i></span>
            </a>
            <a class="right carousel-control" href="#main-slide" data-slide="next">
                <span><i class="fa fa-angle-right"></i></span>
            </a>
        </div>
        <!-- /carousel -->
    </section>
    <!-- End Home Page Slider -->


	 
    <!-- Start About Us Section -->
    <section id="about-us" class="about-us-section-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title text-center">
                            <h3>Sobre Nosotros</h3>
                            <p>"Transformamos tus sueños en celebraciones inolvidables"</p>
                        </div>
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-4">
				    <div class="welcome-section text-center">
				        <img src="<?= media() ?>/tienda/images/about-01.jpeg" class="img-responsive" alt="..">
				        <h4>FILOSOFÍA DE TRABAJO</h4>
				        <div class="border"></div>
				        <p style="text-align: justify;">En Wakami Eventos, creemos firmemente que la innovación constante es el motor que impulsa nuestra capacidad para ofrecer experiencias únicas y personalizadas en cada evento que organizamos. Nos comprometemos a mantenernos a la vanguardia de las tendencias y tecnologías del sector para proporcionar soluciones creativas y de alta calidad que satisfagan las expectativas de nuestros clientes. Este compromiso con la innovación nos permite diseñar y ejecutar eventos que no solo cumplen, sino que superan, las expectativas, convirtiéndose en recuerdos inolvidables.</p>
				    </div>
				</div>

                
                <div class="col-md-4">
                    <div class="welcome-section text-center">
                        <img src="<?= media() ?>/tienda/images/about-02.jpeg" class="img-responsive" alt="..">
                        <h4>MISIÓN Y VISIÓN</h4>
                        <div class="border"></div>
                        <p style="text-align: justify;">En Wakami Eventos, nuestra misión es transformar sueños en realidad brindando soluciones integrales para la organización de eventos, combinando creatividad, calidad, y tecnología avanzada. Aspiramos a ser la empresa líder en la organización de eventos en el ámbito nacional, reconocidos por nuestra innovación, eficiencia, y compromiso con la satisfacción del cliente. Nos proyectamos como pioneros en el uso de tecnologías avanzadas para ofrecer servicios excepcionales y personalizados, superando las expectativas y proporcionando experiencias inolvidables.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="welcome-section text-center">
                        <img src="<?= media() ?>/tienda/images/about-03.jpeg" class="img-responsive" alt="..">
                        <h4>Valores y Reglas de Trabajo</h4>
                        <div class="border"></div>
                        <p style="text-align: justify;">En Wakami Eventos, valoramos la excelencia, la innovación, y el compromiso, buscando siempre la perfección en cada detalle de nuestros servicios. Actuamos con integridad, fomentando un ambiente de colaboración y adaptabilidad para satisfacer las necesidades de nuestros clientes. Nuestras reglas de trabajo priorizan la orientación al cliente, manteniendo altos estándares de calidad, eficiencia operativa, y comunicación clara para ofrecer soluciones rápidas y efectivas que superen las expectativas y aseguren experiencias memorables.

						</p>
                    </div>
                </div>
                
            </div><!-- /.row -->            
            
        </div><!-- /.container -->
    </section>
    <!-- End About Us Section -->


    <!-- Start About Us Section 2 -->
    <div class="about-us-section-2">
        <div class="container">
            <div class="row">
                
                <div class="col-md-6">
                    <div class="skill-shortcode">
                        
                        <!-- Progress Bar -->
                        <div class="skill">
                            <p class="coltexmiguel">Planificación y Organización de Eventos</p>          
                            <div class="progress">         
                                <div class="progress-bar" role="progressbar"  data-percentage="100">
                                    <span class="progress-bar-span" >100%</span>
                                    <span class="sr-only">100% Complete</span>
                                </div>
                            </div>  
                        </div>
                        
                        <!-- Progress Bar -->
                        <div class="skill">
                            <p class="coltexmiguel">Servicios Creativos y de Diseño</p>          
                            <div class="progress">         
                                <div class="progress-bar" role="progressbar"  data-percentage="95">
                                    <span class="progress-bar-span" >95%</span>
                                    <span class="sr-only">95% Complete</span>
                                </div>
                            </div>  
                        </div>
                        
                        <!-- Progress Bar -->
                        <div class="skill">
                            <p class="coltexmiguel">Marketing y Promoción del Evento</p>          
                            <div class="progress">         
                                <div class="progress-bar" role="progressbar"  data-percentage="80">
                                    <span class="progress-bar-span" >80%</span>
                                    <span class="sr-only">80% Complete</span>
                                </div>
                            </div>  
                        </div>
                        
                        <!-- Progress Bar -->
                        <div class="skill">
                            <p class="coltexmiguel">Servicios de Catering y Hospitalidad</p>          
                            <div class="progress">         
                                <div class="progress-bar" role="progressbar"  data-percentage="100">
                                    <span class="progress-bar-span" >100%</span>
                                    <span class="sr-only">100% Complete</span>
                                </div>
                            </div>  
                        </div>
                        
                        <!-- Progress Bar -->
                        <div class="skill">
                            <p class="coltexmiguel">Actividades y Entretenimiento</p>          
                            <div class="progress">         
                                <div class="progress-bar" role="progressbar"  data-percentage="70">
                                    <span class="progress-bar-span" >70%</span>
                                    <span class="sr-only">70% Complete</span>
                                </div>
                            </div>  
                        </div>
                                                            
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div id="carousel-example-generic" class="carousel slide about-slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="<?= media() ?>/tienda/images/porcentaje/p1.jpeg" alt="">
                            </div>
                            <div class="item">
                                <img src="<?= media() ?>/tienda/images/porcentaje/p2.jpeg" alt="">
                            </div>
                            <div class="item">
                                <img src="<?= media() ?>/tienda/images/porcentaje/p3.jpeg" alt="">
                            </div>
    
                        </div>
  
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Start About Us Section 2 -->


    


    <!-- Start Feature Section -->
        <section id="service" class="services-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <h3>Nuestro Servicios</h3>
                            <p>De la planificación a la celebración: éxito garantizado</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="feature-2">
                            <div class="media">
                                <div class="pull-left">
                                    <i class="fa fa-calendar-alt"></i>
                                    <div class="border"></div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">PLANIFICACIÓN DE EVENTOS</h4>
                                    <p class="coltejustificado">Coordinamos todos los aspectos de tu evento, desde la selección de la fecha y el lugar hasta la logística, asegurándonos de que cada detalle se gestione de manera eficiente para garantizar el éxito de tu evento.</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="feature-2">
                            <div class="media">
                                <div class="pull-left">
                                    <i class="fa fa-paint-brush"></i>
                                    <div class="border"></div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">DISEÑO CREATIVO</h4>
                                    <p class="coltejustificado">Creamos y desarrollamos la identidad visual de tu evento, incluyendo logotipos, invitaciones, y otros materiales gráficos, logrando una presentación coherente y atractiva que capte la esencia y el estilo de tu evento</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="feature-2">
                            <div class="media">
                                <div class="pull-left">
                                    <i class="fa fa-handshake"></i>
                                    <div class="border"></div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">GESTIÓN DE PROVEEDORES</h4>
                                    <p class="coltejustificado">Seleccionamos y coordinamos a los proveedores necesarios para tu evento, como catering, transporte, y servicios adicionales, asegurando que todos trabajen en conjunto para cumplir con tus expectativas.</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="feature-2">
                            <div class="media">
                                <div class="pull-left">
                                    <i class="fa fa-bullhorn"></i>
                                    <div class="border"></div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">MARKETING Y PROMOCIÓN</h4>
                                    <p class="coltejustificado">Diseñamos e implementamos estrategias de marketing para promocionar tu evento, utilizando campañas en redes sociales y otros canales de comunicación para aumentar la visibilidad y atraer a más asistentes.</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="feature-2">
                            <div class="media">
                                <div class="pull-left">
                                    <i class="fa fa-utensils"></i>
                                    <div class="border"></div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">SERVICIOS DE CATERING</h4>
                                    <p class="coltejustificado">Organizamos menús personalizados y servicios de bar, garantizando una oferta gastronómica de calidad que satisfaga las preferencias y necesidades de tus invitados, mejorando su experiencia durante el evento.</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="feature-2">
                            <div class="media">
                                <div class="pull-left">
                                    <i class="fa fa-magic"></i>
                                    <div class="border"></div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">ENTRETENIMIENTO Y ACTIVIDADES</h4>
                                    <p class="coltejustificado">Planificamos y coordinamos actividades, espectáculos, y entretenimiento en general, creando momentos emocionantes y memorables que mantendrán a tus asistentes comprometidos y entretenidos.</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.col-md-4 -->
                    
                </div><!-- /.row -->
            
            </div><!-- /.container -->
        </section>
        <!-- End Feature Section -->
    
    
    
    <!-- Start Fun Facts Section -->
    <section class="fun-facts">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                      <div class="counter-item">
                        <i class="fa fa-gift"></i>
                        <div class="timer" id="item1" data-to="991" data-speed="5000"></div>
                        <h5>Eventos Organizados</h5>                               
                      </div>
                    </div>  
                    <div class="col-xs-12 col-sm-6 col-md-3">
                      <div class="counter-item">
                        <i class="fa fa-check"></i>
                        <div class="timer" id="item2" data-to="7394" data-speed="5000"></div>
                        <h5>Proyectos Completados</h5>                               
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                      <div class="counter-item">
                        <i class="fa fa-clock"></i>
                        <div class="timer" id="item3" data-to="25" data-speed="5000"></div>
                        <h5>Años de Experiencia</h5>                               
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                      <div class="counter-item">
                        <i class="fa fa-smile"></i>
                        <div class="timer" id="item4" data-to="8423" data-speed="5000"></div>
                        <h5>Clientes Satisfechos</h5>                               
                      </div>
                    </div>
            </div>
        </div>
    </section>
    <!-- End Fun Facts Section -->



    <!-- Start Team Member Section -->
    <section id="team" class="team-member-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title text-center">
                            <h3>Nuestro equipo</h3>
                            <p>Nuestro equipo, tu confianza; nuestra garantía, tu experiencia inolvidable</p>
                        </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div id="team-section">
                   
                                <div class="our-team">

							<div class="team-member">
							    <img src="<?= media() ?>/tienda/images/team/T1.jpeg" class="img-responsive" alt="">
							    <div class="team-details">
							        <h4>Wilfredo Vasquez</h4>
							        <p>Director y Fundador</p>
							        <ul class="social-icons">
							            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
							            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
							            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
							            <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
							            <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
							        </ul>
							    </div>
							</div>

							<div class="team-member">
							    <img src="<?= media() ?>/tienda/images/team/T2.jpeg" class="img-responsive" alt="">
							    <div class="team-details">
							        <h4>Ana Villalobos</h4>
							        <p>Gerente General</p>
							         <ul class="social-icons">
							            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
							            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
							            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
							            <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
							            <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
							        </ul>
							    </div>
							</div>

							<div class="team-member">
							    <img src="<?= media() ?>/tienda/images/team/T3.png" class="img-responsive" alt="">
							    <div class="team-details">
							        <h4>María García</h4>
							        <p>Coordinadora de Eventos</p>
							         <ul class="social-icons">
							            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
							            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
							            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
							            <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
							            <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
							        </ul>
							    </div>
							</div>

							<div class="team-member">
							    <img src="<?= media() ?>/tienda/images/team/manage-1.jpg" class="img-responsive" alt="">
							    <div class="team-details">
							        <h4>Pablo Rodríguez</h4>
							        <p>Especialista en Marketing</p>
							         <ul class="social-icons">
							            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
							            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
							            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
							            <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
							            <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
							        </ul>
							    </div>
							</div>


                                </div>
                    </div>
                </div>
            </div>
                
        </div>
    </section>
    <!-- End Team Member Section -->



    <!-- Start Pricing Table Section -->
    <div id="pricing" class="pricing-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3>Productos más Vendidos</h3>
                     <br>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="pricingf">
                <section class="bg0 p-t-23 p-b-140">
                    <div class="container">
                       
                        <div class="row isotope-grid">
                            <?php 
                                for ($p = 0; $p < count($arrProductos); $p++) {
                                    $rutaProducto = $arrProductos[$p]['ruta']; 
                                    $portada = count($arrProductos[$p]['images']) > 0 
                                        ? $arrProductos[$p]['images'][0]['url_image'] 
                                        : media() . '/images/uploads/product.png';
                            ?>
                                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                                    <div class="block2">
                                        <div class="block2-pic hov-img0">
                                            <img src="<?= $portada ?>" alt="<?= $arrProductos[$p]['nombre'] ?>">
                                            <a href="<?= base_url() . '/tienda/producto/' . $arrProductos[$p]['idproducto'] . '/' . $rutaProducto; ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                                Ver producto
                                            </a>
                                        </div>

                                        <div class="block2-txt flex-w flex-t p-t-14">
                                            <div class="block2-txt-child1 flex-col-l">
                                                <a href="<?= base_url() . '/tienda/producto/' . $arrProductos[$p]['idproducto'] . '/' . $rutaProducto; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                    <?= $arrProductos[$p]['nombre'] ?>
                                                </a>
                                                <span class="stext-105 cl3">
                                                    <?= SMONEY.formatMoney($arrProductos[$p]['precio']); ?>
                                                </span>
                                            </div>
                                            <div class="block2-txt-child2 flex-r p-t-3">
                                                <a href="#" id="<?= openssl_encrypt($arrProductos[$p]['idproducto'], METHODENCRIPT, KEY); ?>" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2 js-addcart-detail icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                                                    <i class="zmdi zmdi-shopping-cart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
 
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

    <!-- End Pricing Table Section -->
    

    <!-- Clients Aside -->
    <section id="partner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3>Nuestro Honorable Socio</h3>
                        <p>Nuestros socios confían en nosotros para transformar sus ideas en eventos inolvidables, gracias a nuestra experiencia y compromiso con la excelencia.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="clients">
                    
                    <div class="col-md-12">
                        <img src="<?= media() ?>/tienda/images/logos/l1.jpg" class="img-responsive" alt="...">
                    </div>
                    
                    <div class="col-md-12">
                        <img src="<?= media() ?>/tienda/images/logos/l2.png" class="img-responsive" alt="...">
                    </div>
                    
                    <div class="col-md-12">
                        <img src="<?= media() ?>/tienda/images/logos/l3.png" class="img-responsive" alt="...">
                    </div>
                    
                    <div class="col-md-12">
                        <img src="<?= media() ?>/tienda/images/logos/l4.png" class="img-responsive" alt="...">
                    </div>
                    
                    <div class="col-md-12">
                        <img src="<?= media() ?>/tienda/images/logos/l5.jpg" class="img-responsive" alt="...">
                    </div>
                    
                    <div class="col-md-12">
                        <img src="<?= media() ?>/tienda/images/logos/l7.png" class="img-responsive" alt="...">
                    </div>
                    
                    <div class="col-md-12">
                        <img src="<?= media() ?>/tienda/images/logos/l8.png" class="img-responsive" alt="...">
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    
    
    
    

    <section id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h3>Contactar con nosotros</h3>
                        <p class="white-text">Si tiene dudas o consultas, no dude en contactarnos por este medio.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Digite su nombre." id="name" required data-validation-required-message="Digite su nombre.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Tu correo " id="email" required data-validation-required-message="Digite su correo">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Tu numero de telefono" id="phone" required data-validation-required-message="Digite su numero">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder=" Mensaje" id="message" required data-validation-required-message="Mensaje a comunicar"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-contact-info">
                        <h4>Datos de Contacto</h4>
                        <ul>
                            <li><strong>Email:</strong> wakamiev@wakamieventos.com</li>
                            <li><strong>Telefono :</strong> +51 993403860</li>
                            <li><strong>Celular :</strong> 993403860</li>
                            <li><strong>Web :</strong> wakamieventos.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-4">
                    <div class="footer-contact-info">
                        <h4>Horas Laborales</h4>
                        <ul>
                            <li><strong>Lun-Miércoles :</strong> 9 am to 8 pm</li>
                            <li><strong>Jueves a viernes :</strong> 9 pm to 10 pm</li>
                            <li><strong>Sábado :</strong> 9 am to 6 pm</li>
                            <li><strong>Domingo  :</strong> Cerrado</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

<?php 
	footerTienda($data);
 ?>


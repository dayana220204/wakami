<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Abel OSH">
  <meta name="theme-color" content="#009688">
  <link rel="shortcut icon" href="<?= media(); ?>/images/favicon.ico">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/main.css">
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/login.css">

  <title><?= $data['page_tag']; ?></title>
</head>

<body>

  <!-- <section class="login-content">
  
      <div class="logo">
        <h1><?= $data['page_title']; ?></h1>
      </div>
      <div class="login-box">
        <div id="divLoading" >
          <div>
            <img src="<?= media(); ?>/images/loading.svg" alt="Loading">
          </div>
        </div>
        <form class="login-form" name="formLogin" id="formLogin" action="">
          <h3 class="login-head">INICIAR SESIÓN</h3>
          <div class="form-group">
            <input id="txtEmail" name="txtEmail" class="form-control" type="email" placeholder="Email" autofocus>
          </div>
          <div class="form-group">
            <input id="txtPassword" name="txtPassword" class="form-control" type="password" placeholder="Contraseña">
          </div>
          <div class="form-group">
            <div class="utility">
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">¿Olvidaste tu contraseña?</a></p>
            </div>
          </div>
          <div id="alertLogin" class="text-center"></div>
          <div class="form-group btn-container">
            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i> INICIAR SESIÓN</button>
          </div>
        </form>
        <form id="formRecetPass" name="formRecetPass" class="forget-form" action="">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>¿Olvidaste contraseña?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input id="txtEmailReset" name="txtEmailReset" class="form-control" type="email" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>REINICIAR</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Iniciar sesión</a></p>
          </div>
        </form>
      </div>
      
    </section> -->


  <!-- Logo -->
  <div class="logo " id="divLoading">
    <i class="fas fa-shopping-cart"></i>
    <h1><?= $data['page_title']; ?></h1>
  </div>
    
  <section class="section-login">
    <div class="login-container">
      <!-- Formulario de Login -->
      <div class="login-form-section">

        <!-- Texto de bienvenida -->
        <div class="welcome-text">
          <h2>¡Bienvenido de vuelta!</h2>
          <p>Inicia sesión en tu cuenta para continuar</p>
        </div>

        <!-- Formulario -->
        <form class="login-form" name="formLogin" id="formLogin" action="">
          <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <div class="input-wrapper">
              <input type="email" id="txtEmail" name="txtEmail" class="form-control" placeholder="tu@email.com" autofocus>

              <i class="fas fa-envelope"></i>
            </div>
          </div>

          <div class="form-group">
            <label for="password">Contraseña</label>
            <div class="input-wrapper">
              <input type="password" class="form-control" placeholder="••••••••" id="txtPassword" name="txtPassword">
              <i class="fas fa-lock"></i>
            </div>
          </div>

          <div class="form-options">
            <a href="<?= BASE_URL?>">Back Home</a>
            <a href="#" class="forgot-password" id="OpenModalResetPass">¿Olvidaste tu contraseña?</a>
          </div>
          <div id="alertLogin" class="text-center"></div>
          <button type="submit" class="btn-login">
            <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
          </button>
        </form>

        <div id="modal_reset_password" style="display:none" class="modal">
          <!-- aqui va el modal -->
          <div class="modal-content">
            <span class="close" onclick="document.getElementById('modal_reset_password').style.display='none'">&times;</span>
            <div class="icon-container">
              <i class="fas fa-envelope-open-text"></i>
            </div>
            <h2>Recuperar contraseña</h2>
            <p>Ingresa tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.</p>
            <form id="formRecetPass">
              <input type="email" id="txtEmailReset" name="txtEmailReset" placeholder="Correo electrónico" />
              <button type="submit">Enviar</button>
            </form>
          </div>
        </div>


        <!-- Link de registro -->
        <div class="signup-link">
          ¿No tienes cuenta? <a href="#">Regístrate aquí</a>
        </div>
      </div>

      <!-- Sección de imagen -->
      <div class="login-image-section">
        <div class="image-content">
          <i class="fas fa-shopping-bag"></i>
          <h2><?= $data['page_title']; ?></h2>
          <p>Descubre miles de productos increíbles y ofertas exclusivas para ti</p>
        </div>
      </div>
    </div>

  </section>

  <script>
    const base_url = "<?= base_url(); ?>";
  </script>
  <!-- Essential javascripts for application to work-->
  <script src="<?= media(); ?>/js/jquery-3.3.1.min.js"></script>
  <script src="<?= media(); ?>/js/popper.min.js"></script>
  <script src="<?= media(); ?>/js/bootstrap.min.js"></script>
  <script src="<?= media(); ?>/js/fontawesome.js"></script>
  <script src="<?= media(); ?>/js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="<?= media(); ?>/js/plugins/pace.min.js"></script>
  <script type="text/javascript" src="<?= media(); ?>/js/plugins/sweetalert.min.js"></script>
  <script src="<?= media(); ?>/js/<?= $data['page_functions_js']; ?>"></script>
</body>

</html>
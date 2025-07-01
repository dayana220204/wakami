<?php 
headerTienda($data);
 ?>
 <style type="text/css">
  
    .container-menu-desktop {
        background-color: #1b1919; /* Fondo oscuro */
        padding: 10px 0; /* Espaciado superior e inferior */
        color: #fff; /* Color del texto */
    }

    .navbar-default.navbar-shrink {
        padding: 10px 0;
        background-color: #222;
    }

    .navbar-header{
      padding: 10px 0;
        background-color: #222; 
    }

    .navbar-default{
      padding: 10px 0;
        background-color: #222; 
    }
</style>
<br><br><br>
<div class="jumbotron text-center">
  <h1 class="display-4">¡Gracias por tu compra!</h1>
  <p class="lead">Tu pedido fue procesado con éxito.</p>
  <p>No. Orden: <strong> <?= $data['orden']; ?> </strong></p>
  	<?php 
  		if(!empty($data['transaccion'])){
    ?>
    <p>Transacción: <strong> <?= $data['transaccion']; ?> </strong></p>
   <?php } ?>
  <hr class="my-4">
  <p>Muy pronto estaremos en contacto para coordinar la entrega.</p>
  <p>Puedes ver el estado de tu pedido en la sección pedidos de tu usuario.</p>
  <br>
  <a class="btn btn-primary btn-lg" href="<?= base_url(); ?>" role="button">Continuar</a>
</div>

<?php 
	footerTienda($data);
?>
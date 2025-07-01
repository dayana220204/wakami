<?php 
    headerAdmin($data); 
    getModal('modalCotizaciones',$data);
?>
<div id="contentAjax">
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1>
            <i class="bi bi-speedometer"></i> <?=$data["page_title"];?>
            <!-- <button class="btn btn-primary" type="button" onclick="openModal();"><i class="bi bi-plus-lg"></i> Nuevo</button> -->
          </h1>
          <p>Gestión de cotizaciones</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item"><a href="<?=base_url();?>roles"><?=$data["page_title"];?></a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tableCotizaciones">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>EVENTO</th>
                      <th>MÉTODO DE ATENCIÓN</th>
                      <th>NOMBRES</th>
                      <th>APELLIDOS</th>
                      <th>CELULAR</th>
                      <th>TELEFONO FIJO</th>
                      <th>CORREO</th>
                      <th>NOMBRE DE EMPRESA</th>
                      <th>NÚMERO DE INVITADOS</th>
                      <th>FECHA DE EVENTO</th>
                      <th>HORA DE INICIO</th>
                      <th>HORA DE FIN</th>
                      <th>DETALLES Y COMENTARIOS</th>
                      <th>SUSCRITO</th>
                      <th>SITUACION</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
</div>
     <!-- Page specific javascripts-->

<?php footerAdmin($data); ?>
    
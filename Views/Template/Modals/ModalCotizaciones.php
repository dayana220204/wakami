<div class="modal fade" id="modalFormCotizacion" tabindex="-1"  role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header headerRegister">
            <h5 class="modal-title" id="titleModal">Nueva Cotización</h5>
            <button type="button" class="btn-close" name="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="formCotizacion" name="formCotizacion">
                  <input type="hidden" id="idCotizacion" name="idCotizacion" value="">
                
                  <div class="mb-3">
                    <label  class="form-label" for="txtIdCotizacion">ID</label>
                    <input id="txtIdCotizacion" name="txtIdCotizacion" class="form-control" type="text" placeholder="Ingrese ID de cotización" >
                  </div>

                  <div class="mb-3">
                          <label class="form-label" for="listSituacion">Situación</label>
                          <select id="listSituacion" name="listSituacion" class="form-control" >
                            <!-- <option value="ATENDIDO">Atendido</option>
                            <option value="PENDIENTE">Pendiente</option> -->
                          </select>
                  </div>
                
                  <div class="tile-footer">
                      <button  id="btnActionForm" name="btnActionForm" class="btn btn-primary" type="submit">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span id="btnText">Guardar</span>
                      </button>&nbsp;&nbsp;&nbsp;
                      <a class="btn btn-secondary" href="#" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle-fill me-2"></i>Cancelar
                      </a>
                  </div>              
            </form>
          </div>
        </div>
      </div>
  </div>  

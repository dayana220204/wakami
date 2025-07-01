


document.addEventListener('DOMContentLoaded', function () {

    let tableCotizaciones;

    tableCotizaciones = $('#tableCotizaciones').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "ajax": {
            "url": " " + base_url + "/Cotizaciones/getCotizaciones",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id_cotizacion" },
            { "data": "evento" },
            { "data": "metodo_atencion" },
            { "data": "nombres" },
            { "data": "apellidos" },
            { "data": "celular" },
            { "data": "telefono_fijo" },
            { "data": "correo" },
            { "data": "nombre_empresa" },
            { "data": "n_invitados" },
            { "data": "fecha_evento" },
            { "data": "hora_inicio" },
            { "data": "hora_fin" },
            { "data": "detalles_comentarios" },
            { "data": "suscrito" },
            { "data": "situacion" },
            { "data": "acciones" }
        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });



    var formCotizacion = document.querySelector("#formCotizacion");
    formCotizacion.onsubmit = function (e) {
        e.preventDefault();

        var strCotizacion = document.querySelector('#idCotizacion').value;
        var strSituacion = document.querySelector('#listSituacion').value;

        if (strSituacion == '') {
            swal("Atención", "Todos los campos son obligatorios.", "success");
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + '/Cotizaciones/setCotizacion';
        var formData = new FormData(formCotizacion);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                console.log("dddd");

                tableCotizaciones.api().ajax.reload();
                var objData = JSON.parse(request.responseText);
                if (objData.status) {
                    $('#modalFormCotizacion').modal("hide");
                    formCotizacion.reset();
                    swal("Cotizaciones de clientes", objData.msg, "success");
                } else {
                    swal("Error", objData.msg, "error");
                }
            }
            return false;
        }
    }

    // Integra el manejo del menú aquí, si es necesario

});

function openModal() {
    document.querySelector('#idCotizacion').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Cotizacion";
    document.querySelector("#formCotizacion").reset();
    $('#modalFormCotizacion').modal('show');
}

window.addEventListener('load', function () {
    fntEditCotizacion();
    //   fntDelRol();
    //  fntPermisos();
}, false);

function fntEditCotizacion(idCotizacion) {
    document.querySelector('#titleModal').innerHTML = "Actualizar Situación de Cotizacion";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";

    var idCotizacion = idCotizacion;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

    var ajaxUrl = base_url + '/Cotizaciones/getCotizacion/' + idCotizacion;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#idCotizacion").value = objData.data.id_cotizacion;
                document.querySelector("#txtIdCotizacion").value = objData.data.id_cotizacion;

                let select1 = "";
                let select2 = "";
                // var optionSelect = objData.data.situacion == "ATENDIDO" ?
                //     '<option value="ATENDIDO" selected class="notBlock">ATENDIDO</option>' :
                //     '<option value="PENDIENTE" selected class="notBlock">PENDIENTE</option>';

               objData.data.situacion == "ATENDIDO" ?
                    select1 = "selected": select2 = "selected";

                // var htmlSelect = `${optionSelect}
                //                   <option value="ATENDIDO">ATENDIDO</option>
                //                   <option value="PENDIENTE">PENDIENTE</option>`;
                
                var htmlSelect = `<option value="ATENDIDO" ${select1} >ATENDIDO</option>
                                  <option value="PENDIENTE" ${select2}>PENDIENTE</option>`;
                                  
                document.querySelector("#listSituacion").innerHTML = htmlSelect;
                $('#modalFormCotizacion').modal('show');
            } else {
                Swal.fire({
                    title: "Error",
                    text: objData.msg,
                    ico: "error"
                });
            }
        }
    }
}

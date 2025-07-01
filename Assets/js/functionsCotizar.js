// var tableCotizaciones;
// alert('sadsadsads')
document.addEventListener('DOMContentLoaded', function () {


        //LISTAR TIPOS DE EVENTOS
        //******************************************************** */
 
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    
        var ajaxUrl = base_url + '/TipoEventos/getTipoEventos';
        request.open("GET", ajaxUrl, true);
        request.send();
    
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);              
                    console.log(objData);     
                   
                let strTipoEvento = document.querySelector('#id_tipo_evento');
                strTipoEvento.innerHTML = "";
                for(let i = 0; i < objData.length; i++){                    
                    // console.log(objData[i]);             
                    let opcion = document.createElement("option");
                    let texto = document.createTextNode(objData[i].nombre);
                    opcion.value = objData[i].id_tipo_evento;
                    opcion.appendChild(texto);
                    strTipoEvento.append(opcion);
                }//end FOR
       
            }// end REQUEST.READYSTATE
            
        //******************************************************** */

            //LISTAR METODO DE ATENCIÓN
        //******************************************************** */
 
        let request2 = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    
        ajaxUrl = base_url + '/MetodosAtencion/getMetodosAtencion';
        request2.open("GET", ajaxUrl, true);
        request2.send();
    
        request2.onreadystatechange = function () {
            if (request2.readyState == 4 && request2.status == 200) {
                var objData = JSON.parse(request2.responseText);              
                    console.log(objData);     
                //    return;
                let strTipoEvento = document.querySelector('#id_metodo_atencion');
                strTipoEvento.innerHTML = "";
                for(let i = 0; i < objData.length; i++){                    
                    // console.log(objData[i]);             
                    let opcion = document.createElement("option");
                    let texto = document.createTextNode(objData[i].nombre);
                    opcion.value = objData[i].id_metodo_atencion;
                    opcion.appendChild(texto);
                    strTipoEvento.append(opcion);
                }//end FOR
       
            }// end request2.READYSTATE
        }
        //******************************************************** */
        

        
        

   
    //REGISTRAR COTIZACION
    var formCotizacion = document.querySelector("#formCotizar");
    formCotizacion.onsubmit = function (e) {
        e.preventDefault();
        // alert('bb');
        // return;
        // var strCotizacion = document.querySelector('#id_cotizacion').value;
        // var strSituacion = document.querySelector('#id_tipo_evento').value;
   
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + '/Cotizar/setCotizar';
        var formData = new FormData(formCotizacion);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
       
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);
                console.log(objData);
                alert("Cotización registrada correctamente");
                location.reload();
                // if (objData.status) {
                //     $('#modalCotizar').modal("hide");
                //     formCotizacion.reset();
                //     // Swal.fire({
                //     //     title: "Cotizaciones de clientes",
                //     //     text: objData.msg,
                //     //     icon: "success"
                //     // });

                //     // $('#modalFormCotizacion').modal("hide");
                //     formCotizacion.reset();
                //     swal("Cotizaciones de clientes", objData.msg, "success");
                // //     tableCotizaciones.api().ajax.reload();
                // } else {
                //     Swal.fire({
                //         title: "Error",
                //         text: objData.msg,
                //         icon: "error"
                //     });
                // }
            }
            return false;
        }
     }
    }
});

// tableCotizaciones = $('#tableCotizaciones').dataTable();
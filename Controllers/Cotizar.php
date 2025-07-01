<?php

require_once("Models/TCategoria.php");
require_once("Models/TProducto.php");
class Cotizar extends Controllers
{
    use TCategoria, TProducto;
    public function __construct()
    {
        parent::__construct();
    }

    public function Cotizar()
    {
        // $data['page_id'] = 3;
        // $data['page_tag'] = "Solicitar Cotización";
        // $data['page_title'] = "Cotizando datos";
        // $data['page_name'] = "Cotizar";



        $pageContent = getPageRout('inicio');
        $data['page_tag'] = NOMBRE_EMPESA;
        $data['page_title'] = NOMBRE_EMPESA;
        $data['page_name'] = "tienda_virtual";
        $data['page'] = $pageContent;
        $data['slider'] = $this->getCategoriasT(CAT_SLIDER);
        $data['banner'] = $this->getCategoriasT(CAT_BANNER);


        $this->views->getView($this, "Cotizar", $data);
        // $data['productos'] = $this->getProductosT();
        // $this->views->getView($this, "home", $data);
    }


    public function setCotizar()
    {



        $id_cotizacion = $_POST['id_cotizacion'];
        $id_tipo_evento = $_POST['id_tipo_evento'];
        $id_metodo_atencion = $_POST['id_metodo_atencion'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $celular = $_POST['celular'];
        $telefono_fijo = $_POST['telefono_fijo'];
        $correo = $_POST['correo'];
        $nombre_empresa = $_POST['nombre_empresa'];
        $n_invitados = $_POST['n_invitados'];
        $fecha_evento = $_POST['fecha_evento'];
        $hora_inicio = $_POST['hora_inicio'];
        $hora_fin = $_POST['hora_fin'];
        $detalles_comentarios = $_POST['detalles_comentarios'];
        $suscrito = "NO";

        if (isset($_POST['suscrito'])) {
            $suscrito = $_POST['suscrito'];
        }
        
        $situacion = $_POST['situacion'];


        $request_cotizacion = "";
        // echo json_encode($_POST);


        if ($suscrito == "" || $suscrito == null) {
            $suscrito = "NO";
        } else {
            $suscrito = "SI";
        }

        $request_cotizacion = $this->model->insertCotizacion($id_cotizacion, $id_tipo_evento, $id_metodo_atencion, $nombres, $apellidos, $celular,  $telefono_fijo, $correo, $nombre_empresa,  $n_invitados, $fecha_evento, $hora_inicio,  $hora_fin, $detalles_comentarios, $suscrito, $situacion, '1');
        $option = 1;


        if ($request_cotizacion > 0) {
            if ($option == 1) {
                $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
            }

            // else if ($request_cotizacion == 'exist') {

            // 	$arrResponse = array('status' => false, 'msg' => '¡Atención! La cotización ya existe.');
            // } else {
            // 	$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
            // }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            // die();
        }
    }
}//end class

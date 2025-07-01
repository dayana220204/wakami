<?php
class Cotizaciones extends Controllers
{
	public function __construct()
	{
		parent::__construct();
		session_start();
		//session_regenerate_id(true);
		if(empty($_SESSION['login']))
		{
			header('Location: '.base_url().'/login');
			die();
		}
		getPermisos(MCLIENTES);
	}

	public function cotizaciones()
	{
		$data['page_id'] = 3;
		$data['page_tag'] = "Cotizaciones";
		$data['page_title'] = "Cotizaciones de <small> Clientes </small>";
		$data['page_name'] = "Cotizaciones de clientes";
		$data['page_functions_js'] = "functionsCotizaciones.js";
		$this->views->getView($this, "cotizaciones", $data);
	}
	public function getCotizaciones()
	{
		//1-----------------------------------------
		$arrData = $this->model->selectCotizaciones();
		//echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		//die();
		//2-----------------------------------------------
		//Para la columna estado. el resultado se muestra en palabras
		for ($i = 0; $i < count($arrData); $i++) {

			if ($arrData[$i]['situacion'] == "ATENDIDO") {
				$arrData[$i]['situacion'] = '<span class="me-1 badge bg-success  text-white">ATENDIDO</span>';
			} elseif ($arrData[$i]['situacion'] == "PENDIENTE") {
				$arrData[$i]['situacion'] = '<span class="me-1 badge bg-danger text-white">PENDIENTE</span>';
			}
			$arrData[$i]['acciones'] = '<div class="text-center">				
				<button type="button" name="btnEditCotizacion" class="btn btn-primary btnEditCotizacion" onClick="fntEditCotizacion(\'' . $arrData[$i]['id_cotizacion'] . '\')" title="Editar"><i class="fas fa-pencil-alt"></i></button>
				</div>';
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();

		// onclick="fn('c01')"
	}


	public function getCotizacion(string $idCotizacion)
	{

		$strIdCotizacion = $idCotizacion;
		if ($strIdCotizacion != "") {
			$arrData = $this->model->selectCotizacion($strIdCotizacion);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
	}

	public function setCotizacion()
	{
		$strIdCotizacion = $_POST['txtIdCotizacion'];
		// $strRol =  strClean($_POST['txtNombre']);
		// $strDescipcion = strClean($_POST['txtDescripcion']);
		$strSituacion = $_POST['listSituacion'];
		$request_cotizacion = "";
		if ($strIdCotizacion == "") {
			//Crear
			// $request_cotizacion = $this->model->insertCotizacion($strRol, $strDescipcion, $intStatus);
			$option = 1;
		} else {
			//Actualizar
			$request_cotizacion = $this->model->updateCotizacion($strIdCotizacion, $strSituacion);
			$option = 2;
		}

		if ($request_cotizacion > 0) {
			if ($option == 1) {
				$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
			} else {
				$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
			}
		} else if ($request_cotizacion == 'exist') {

			$arrResponse = array('status' => false, 'msg' => '¡Atención! La cotización ya existe.');
		} else {
			$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}


}//end class

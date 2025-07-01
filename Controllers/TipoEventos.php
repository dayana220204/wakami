<?php
class TipoEventos extends Controllers
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

	public function tipoEventos()
	{
		$data['page_id'] = 3;
		$data['page_tag'] = "Tipos de eventos";
		$data['page_title'] = "Tipos de<small> Eventos </small>";
		$data['page_name'] = "Tipos de eventos de clientes";
		// $data['page_functions_js'] = "functionsCotizaciones.js";
		// $this->views->getView($this, "cotizaciones", $data);
	}
	public function getTipoEventos()
	{
		//1-----------------------------------------
		$arrData = $this->model->selectTipoEventos();
		//echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		//die();
		//2-----------------------------------------------
		//Para la columna estado. el resultado se muestra en palabras
		// for ($i = 0; $i < count($arrData); $i++) {

		// 	if ($arrData[$i]['situacion'] == "ATENDIDO") {
		// 		$arrData[$i]['situacion'] = '<span class="me-1 badge bg-success  text-white">ATENDIDO</span>';
		// 	} elseif ($arrData[$i]['situacion'] == "PENDIENTE") {
		// 		$arrData[$i]['situacion'] = '<span class="me-1 badge bg-danger text-white">PENDIENTE</span>';
		// 	}
		// 	$arrData[$i]['acciones'] = '<div class="text-center">				
		// 		<button type="button" name="btnEditCotizacion" class="btn btn-primary btnEditCotizacion" onClick="fntEditCotizacion(\'' . $arrData[$i]['id_cotizacion'] . '\')" title="Editar"><i class="fas fa-pencil-alt"></i></button>
		// 		</div>';
		// }
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
	

		// onclick="fn('c01')"
	}

}//end class

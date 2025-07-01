<?php
class MetodosAtencion extends Controllers
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

	public function metodosAtencion()
	{
		// $data['page_id'] = 3;
		// $data['page_tag'] = "Tipos de eventos";
		// $data['page_title'] = "Tipos de<small> Eventos </small>";
		// $data['page_name'] = "Tipos de eventos de clientes";
		// // $data['page_functions_js'] = "functionsCotizaciones.js";
		// $this->views->getView($this, "cotizaciones", $data);
	}
	public function getMetodosAtencion()
	{
		$arrData = $this->model->selectMetodoAtencion();	
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
	}

}//end class

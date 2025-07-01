<?php 

	class TipoEventosModel extends Mysql
	{
		// public $intIdrol;
		public $strIdCotizacion;
		public $strSituacion;
		// public $intStatus;
		public function __construct()
		{
			parent::__construct();
		}	
        public function selectTipoEventos()
		{
			$sql = "SELECT * FROM tipo_evento WHERE estado = 1";
			$request = $this->select_all($sql);
			return $request;
		}
		
    }
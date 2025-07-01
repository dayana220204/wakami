<?php 

	class MetodosAtencionModel extends Mysql
	{
		// public $intIdrol;
		public $strIdCotizacion;
		public $strSituacion;
		// public $intStatus;
		public function __construct()
		{
			parent::__construct();
		}	
        public function selectMetodoAtencion()
		{
			$sql = "SELECT * FROM metodo_atencion WHERE estado = 1";
			$request = $this->select_all($sql);
			return $request;
		}
		
    }
<?php 

	class CotizacionesModel extends Mysql
	{
		// public $intIdrol;
		public $strIdCotizacion;
		public $strSituacion;
		// public $intStatus;
		public function __construct()
		{
			parent::__construct();
		}	
        public function selectCotizaciones()
		{
			//EXTRAE ROLES
			$sql = "select cotizacion.id_cotizacion, tipo_evento.nombre as 'evento', metodo_atencion.nombre as 'metodo_atencion',";
			$sql .= "cotizacion.nombres, cotizacion.apellidos, cotizacion.celular, cotizacion.telefono_fijo, cotizacion.correo,";
			$sql .= "cotizacion.nombre_empresa, cotizacion.n_invitados, cotizacion.fecha_evento, cotizacion.hora_inicio, cotizacion.hora_fin,";
			$sql.= "cotizacion.detalles_comentarios, cotizacion.suscrito, cotizacion.situacion";
			$sql .= " from cotizacion inner join tipo_evento on cotizacion.id_tipo_evento = tipo_evento.id_tipo_evento";
			$sql .= " inner join metodo_atencion on cotizacion.id_metodo_atencion = metodo_atencion.id_metodo_atencion;";
			$request = $this->select_all($sql);
			return $request;
		}


		public function selectCotizacion(string $idCotizacion)
		{

			//BUSCAR COTIZACION
			$this->strIdCotizacion = $idCotizacion;
			$sql = "SELECT id_cotizacion, situacion FROM cotizacion WHERE id_cotizacion = '$this->strIdCotizacion'";
			$request = $this->select($sql);
			return $request;
		}




		public function updateCotizacion(string $idCotizacion, string $situacion){
			$this->strIdCotizacion = $idCotizacion;
			$this->strSituacion = $situacion;
	

			// $sql = "SELECT id_cotizacion, situacion FROM cotizacion WHERE nombrerol = '$this->strRol' AND idrol != $this->intIdrol";
			// $request = $this->select_all($sql);

			// if(empty($request))
			// {
				$sql = "UPDATE cotizacion SET situacion = ? WHERE id_cotizacion = '$this->strIdCotizacion'";
				$arrData = array($this->strSituacion);
				$request = $this->update($sql,$arrData);
			// }else{
			// 	$request = "exist";
			// }
		    return $request;			
		}

    }
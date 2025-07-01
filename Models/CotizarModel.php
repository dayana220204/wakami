<?php 

	class CotizarModel extends Mysql
	{
        public $id_cotizacion;
        public $id_tipo_evento;
        public $id_metodo_atencion;
        public $nombres;
        public $apellidos;
        public $celular;
        public $telefono_fijo;
        public $correo;
        public $nombre_empresa;
        public $n_invitados;
        public $fecha_evento;
        public $hora_inicio;
        public $hora_fin;
        public $detalles_comentarios;
        public $suscrito;
        public $situacion;
        public $estado;

		public function __construct()
		{
			parent::__construct();
		}	
      

        public function insertCotizacion($id_cotizacion, $id_tipo_evento, $id_metodo_atencion, $nombres, $apellidos, $celular,  $telefono_fijo, $correo, $nombre_empresa,  $n_invitados, $fecha_evento, $hora_inicio,  $hora_fin, $detalles_comentarios, $suscrito, $situacion, $estado){

			$return = "";
            $this->id_cotizacion = $id_cotizacion;
            $this->id_tipo_evento = $id_tipo_evento;
            $this->id_metodo_atencion = $id_metodo_atencion;
            $this->nombres = $nombres;
            $this->apellidos = $apellidos;
            $this->celular = $celular;
            $this->telefono_fijo = $telefono_fijo;
            $this->correo = $correo;
            $this->nombre_empresa = $nombre_empresa;
            $this->n_invitados = $n_invitados;
            $this->fecha_evento = $fecha_evento;
            $this->hora_inicio = $hora_inicio;
            $this->hora_fin = $hora_fin;
            $this->detalles_comentarios = $detalles_comentarios;
            $this->suscrito = $suscrito;
            $this->situacion = $situacion;
            $this->estado = $estado;

			// $sql = "SELECT * FROM rol WHERE nombrerol = '{$this->strRol}' ";
			// $request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO cotizacion VALUES(NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	        	$arrData = array($this->id_tipo_evento, $this->id_metodo_atencion, $this->nombres, $this->apellidos, $this->celular,  $this->telefono_fijo, $this->correo, $this->nombre_empresa,  $this->n_invitados, $this->fecha_evento, $this->hora_inicio,  $this->hora_fin, $this->detalles_comentarios, $this->suscrito, $this->situacion, $this->estado);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = 0;
			}
			return $return;
		}	



    }
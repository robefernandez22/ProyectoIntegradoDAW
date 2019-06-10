<?php

	require_once "Conexion.php";

	class Valoraciones {

		private $id;
		private $descripcion;
		private $puntuacion;
		private $fecha;
		private $hoteles_id;
		private $usuarios_correo;

		function __construct($fila) {

			$this->id = $fila["id"];
			$this->descripcion = $fila["descripcion"];
			$this->puntuacion = $fila["puntuacion"];
			$this->fecha = $fila["fecha"];
			$this->hoteles_id = $fila["hoteles_id"];
			$this->usuarios_correo = $fila["usuarios_correo"];

		}

		public function getId() {
			return $this->id;
		}

		public function getDescripcion() {
			return $this->descripcion;
		}

		public function getPuntuacion() {
			return $this->puntuacion;
		}

		public function getFecha() {
			return $this->fecha;
		}

		public function getHotelesId() {
			return $this->hoteles_id;
		}

		public function getUsuariosCorreo() {
			return $this->usuarios_correo;
		}

		public static function getValoraciones($idHotel) {

			$conexion = Conexion::conexionBD();

			if ($idHotel != 0) {
			
				$sql = "SELECT * FROM valoraciones WHERE hoteles_id = '$idHotel'";

			} else {

				$sql = "SELECT * FROM valoraciones";

			}
			
			$resultado = $conexion->query($sql);

			$valoraciones = [];
			while ($registros = $resultado->fetch()) {
				$valoraciones[] = new Valoraciones($registros);
			}

			return $valoraciones;

		}

		public static function eliminarValoracion($idValoracion) {

			$conexion = Conexion::conexionBD();

			$sql = "DELETE FROM valoraciones WHERE id = '$idValoracion'";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

	}

?>
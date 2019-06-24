<?php

	require_once "Conexion.php";

	class Valoraciones {

		private $id;
		private $descripcion;
		private $puntuacion;
		private $fecha;
		private $hoteles_id;
		private $usuarios_correo;
		private $reservas_id;

		/** 
		 * crea un objeto Valoraciones
		 * @param array $fila
		*/
		function __construct($fila) {

			$this->id = $fila["id"];
			$this->descripcion = $fila["descripcion"];
			$this->puntuacion = $fila["puntuacion"];
			$this->fecha = $fila["fecha"];
			$this->hoteles_id = $fila["hoteles_id"];
			$this->usuarios_correo = $fila["usuarios_correo"];
			$this->reservas_id = $fila["reservas_id"];

		}

		/** 
		 * devuelve el id de una valoración
		 * @return string
		*/
		public function getId() {
			return $this->id;
		}

		/** 
		 * devuelve la descripción de una valoración
		 * @return string
		*/
		public function getDescripcion() {
			return $this->descripcion;
		}

		/** 
		 * devuelve la puntuación de una valoración
		 * @return string
		*/
		public function getPuntuacion() {
			return $this->puntuacion;
		}

		/** 
		 * devuelve la fecha de una valoración
		 * @return string
		*/
		public function getFecha() {
			return $this->fecha;
		}

		/** 
		 * devuelve el id del hotel de una valoración
		 * @return string
		*/
		public function getHotelesId() {
			return $this->hoteles_id;
		}

		/** 
		 * devuelve el correo del usuario de una valoración
		 * @return string
		*/
		public function getUsuariosCorreo() {
			return $this->usuarios_correo;
		}

		/** 
		 * devuelve el id de la reserva de una valoración
		 * @return string
		*/
		public function getReservasId() {
			return $this->reserva_id;
		}

		/** 
		 * inserta una valoración
		 * @param string $descripcion
		 * @param string $puntuacion
		 * @param string $fecha
		 * @param string $hotelId
		 * @param string $usuario
		 * @param string $reservaId
		 * @return string
		*/
		public static function insertarValoracion($descripcion, $puntuacion, $fecha, $hotelId, $usuario, $reservaId) {

			$conexion = Conexion::conexionBD();

			$sql = "INSERT INTO `valoraciones`(`id`, `descripcion`, `puntuacion`, `fecha`, `hoteles_id`, `usuarios_correo`, `reservas_id`) VALUES (NULL,'$descripcion','$puntuacion','$fecha','$hotelId','$usuario','$reservaId')";
			$resultado = $conexion->exec($sql);
			return $resultado;

		}

		/** 
		 * busca una valoración por id y devuelve los datos de esa valoración
		 * @param string $reservaId
		 * @return string
		*/
		public static function buscarValoracion($reservaId) {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT * FROM valoraciones WHERE reservas_id = '$reservaId'";
			$resultado = $conexion->query($sql);
			$fila = $resultado->fetch();

			return $fila;

		}

		/** 
		 * obtiene todas las valoraciones de un hotel en concreto
		 * @param string $idHotel
		 * @return array
		*/
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

		/** 
		 * elimina una valoración en concreto
		 * @param string $idValoracion
		 * @return string
		*/
		public static function eliminarValoracion($idValoracion) {

			$conexion = Conexion::conexionBD();

			$sql = "DELETE FROM valoraciones WHERE id = '$idValoracion'";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

	}

?>
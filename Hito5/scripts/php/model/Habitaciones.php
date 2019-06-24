<?php

	require_once "Conexion.php";

	class Habitaciones {

		private $id;
		private $hoteles_id;
		private $descripcion;
		private $num_camas;
		private $num_habitacion;
		private $num_planta;
		private $precio_noche;
		private $television;
		private $vistas;
		private $aire;

		/** 
		 * crea un objeto Habitaciones
		 * @param array $fila
		*/
		function __construct($fila) {

			$this->id = $fila["id"];
			$this->hoteles_id = $fila["hoteles_id"];
			$this->descripcion = $fila["descripcion"];
			$this->num_camas = $fila["num_camas"];
			$this->num_habitacion = $fila["num_habitacion"];
			$this->num_planta = $fila["num_planta"];
			$this->precio_noche = $fila["precio_noche"];
			$this->television = $fila["television"];
			$this->vistas = $fila["vistas"];
			$this->aire = $fila["aire"];

		}

		/** 
		 * devuelve el ID de una habitación
		 * @return string
		*/
		public function getId() {

			return $this->id;

		}

		/** 
		 * devuelve el ID del hotel de una habitación
		 * @return string
		*/
		public function getHotelId() {

			return $this->hoteles_id;

		}

		/** 
		 * devuelve la descripción de una habitación
		 * @return string
		*/
		public function getDescripcion() {

			return $this->descripcion;

		}

		/** 
		 * devuelve el número de camas de una habitación
		 * @return string
		*/
		public function getCamas() {

			return $this->num_camas;

		}

		/** 
		 * devuelve el número de una habitación
		 * @return string
		*/
		public function getNumHabitacion() {

			return $this->num_habitacion;

		}

		/** 
		 * devuelve el número de planta una habitación
		 * @return string
		*/
		public function getNumPlanta() {

			return $this->num_planta;

		}

		/** 
		 * devuelve el precio por noche de una habitación
		 * @return string
		*/
		public function getPrecioNoche() {

			return $this->precio_noche;

		}

		/** 
		 * devuelve si una habitación tiene televisión o no
		 * @return string
		*/
		public function getTelevision() {

			return $this->television;

		}

		/** 
		 * devuelve si una habitación tiene vistas o no
		 * @return string
		*/
		public function getVistas() {

			return $this->vistas;

		}

		/** 
		 * devuelve si una habitación tiene aire o no
		 * @return string
		*/
		public function getAire() {

			return $this->aire;

		}

		/** 
		 * devuelve todas las reservas de una habitación siempre y cuando la fecha de salida sea mayor que la fecha actual
		 * @param string $idHabitacion
		 * @param string $fechaActual
		 * @return array
		*/
		public static function obtenerReservas($idHabitacion, $fechaActual) {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT r.id, ho.nombre
					FROM reservas r, reservas_habitaciones rh, hoteles ho, habitaciones ha
					where r.id = rh.reservas_id
					and ha.id = rh.habitaciones_id
					and ha.hoteles_id = ho.id
					and ha.id = '$idHabitacion'
					and r.fecha_salida > '$fechaActual'";

			$resultado = $conexion->query($sql);
			$reservas = [];
			while ($registros = $resultado->fetch()) {
				$reservas[] = $registros;
			}

			return $reservas;

		}

		/** 
		 * devuelve todas las habitaciones que cumplan los parámetros recibidos
		 * @param string $fechaEntrada
		 * @param string $fechaSalida
		 * @param string $numPersonas
		 * @param string $hotelId
		 * @return array
		*/
		public static function getHabitacionesParametros($fechaEntrada, $fechaSalida, $numPersonas, $hotelId) {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT HA.ID FROM HABITACIONES HA
					WHERE NOT EXISTS (SELECT NULL
					                  FROM RESERVAS_HABITACIONES RH, RESERVAS R
					                  WHERE RH.HABITACIONES_ID = HA.ID
					                  AND RH.RESERVAS_ID = R.ID
									  AND '$fechaEntrada' <= R.FECHA_SALIDA
									  AND '$fechaSalida' >= R.FECHA_ENTRADA)
					AND HA.DESCRIPCION LIKE '$numPersonas'
					AND HA.HOTELES_ID = '$hotelId'
					ORDER BY HA.ID";

			$resultado = $conexion->query($sql);
			$habitaciones = [];
			while ($registros = $resultado->fetch()) {
				$habitaciones[] = $registros;
			}

			return $habitaciones;

		}

		/** 
		 * devuelve los extras que tenga una habitación en concreto
		 * @return string
		*/
		public function getExtras() {

			$extras = "";

			if ($this->getTelevision() == "S") {
				$extras = "<li>Televisión</li>";
			}

			if ($this->getVistas() == "S") {
				$extras .= "<li>Vistas</li>";
			}

			if ($this->getAire() == "S") {
				$extras .= "<li>Aire Acondicionado</li>";
			}

			return $extras;

		}

		/** 
		 * devuelve todas las imagenes de una habitación en concreto
		 * @return array
		*/
		public function getImagenes() {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT * FROM imagenes_habitaciones WHERE habitaciones_id = '$this->id'";
			$resultado = $conexion->query($sql);

			$imagenes = [];
			while ($registros = $resultado->fetch()) {
				$imagenes[] = $registros;
			}

			return $imagenes;

		}

		/** 
		 * busca una habitación en concreto
		 * @param string $id
		 * @return string
		*/
		public static function buscarHabitacion($id) {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT * FROM habitaciones WHERE id LIKE '$id'";

			$resultado = $conexion->query($sql);
			$fila = $resultado->fetch();
			return $fila;

		}

		/** 
		 * busca si hay alguna habitación con el mismo número que la habitación que se quiere insertar/modificar
		 * @param string $hotelId
		 * @param string $numHabitacion
		 * @return string
		*/
		public static function buscarHabitacionRepetida($hotelId, $numHabitacion) {

			$conexion = Conexion::conexionBD();
			$sql = "SELECT * FROM habitaciones WHERE hoteles_id = '$hotelId' AND num_habitacion = '$numHabitacion'";
			$resultado = $conexion->query($sql);
			$fila = $resultado->fetch();
			return $fila;

		}

		/** 
		 * devuelve todas las habitaciones de un hotel en concreto
		 * @param string $hoteles_id
		 * @return array
		*/
		public static function devolverHabitaciones($hoteles_id) {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT * FROM habitaciones WHERE hoteles_id = '$hoteles_id'";
			
			$resultado = $conexion->query($sql);

			$habitaciones = [];
			while ($registros = $resultado->fetch()) {
				$habitaciones[] = new Habitaciones($registros);
			}

			return $habitaciones;

		}

		/** 
		 * inserta una habitación
		 * @param string $id
		 * @param string $hoteles_id
		 * @param string $descripcion
		 * @param string $num_camas
		 * @param string $num_habitacion
		 * @param string $num_planta
		 * @param string $precio_noche
		 * @param string $television
		 * @param string $vistas
		 * @param string $aire
		 * @return string
		*/
		public static function insertarHabitacion($id, $hoteles_id, $descripcion, $num_camas, $num_habitacion, $num_planta, $precio_noche, $television, $vistas, $aire) {

			$conexion = Conexion::conexionBD();

			$sql = "INSERT INTO habitaciones (id, hoteles_id, descripcion, num_camas, num_habitacion, num_planta, precio_noche, television, vistas, aire) VALUES (NULL, '$hoteles_id', '$descripcion', '$num_camas', '$num_habitacion', '$num_planta', '$precio_noche', '$television', '$vistas', '$aire')";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

		/** 
		 * actualiza una habitación
		 * @param string $id
		 * @param string $descripcion
		 * @param string $num_camas
		 * @param string $num_habitacion
		 * @param string $num_planta
		 * @param string $precio_noche
		 * @param string $television
		 * @param string $vistas
		 * @param string $aire
		 * @return string
		*/
		public static function actualizarHabitacion($id, $descripcion, $num_camas, $num_habitacion, $num_planta, $precio_noche, $television, $vistas, $aire) {

			$conexion = Conexion::conexionBD();

			$sql = "UPDATE habitaciones SET descripcion = '$descripcion', num_camas = '$num_camas', num_habitacion = '$num_habitacion', num_planta = '$num_planta', precio_noche = '$precio_noche', television = '$television', vistas = '$vistas', aire = '$aire' WHERE id = '$id'";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

		/** 
		 * elimina una habitación en concreto
		 * @param string $id
		 * @return string
		*/
		public static function eliminarHabitacion($id) {

			$conexion = Conexion::conexionBD();

			$sql = "DELETE FROM habitaciones WHERE id = '$id'";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

		/** 
		 * inserta una imagen en la tabla imagenes_habitaciones
		 * @param string $habitacion_id
		 * @param string $img_path
		 * @return string
		*/
		public static function insertarImagen($habitacion_id, $img_path) {

			$conexion = Conexion::conexionBD();

			$sql = "INSERT INTO imagenes_habitaciones (img_path, habitaciones_id)
			VALUES ('$img_path', '$habitacion_id')";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

		/** 
		 * elimina la imagen de una habitación en concreto
		 * @param string $id
		 * @return string
		*/
		public static function eliminarImagen($id) {

			$conexion = Conexion::conexionBD();

			$sql = "DELETE FROM imagenes_habitaciones WHERE id LIKE '$id'";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

	}

?>
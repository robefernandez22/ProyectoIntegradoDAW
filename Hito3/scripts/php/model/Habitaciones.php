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

		}

		public function getId() {

			return $this->id;

		}

		public function getHotelId() {

			return $this->hoteles_id;

		}

		public function getDescripcion() {

			return $this->descripcion;

		}

		public function getCamas() {

			return $this->num_camas;

		}

		public function getNumHabitacion() {

			return $this->num_habitacion;

		}

		public function getNumPlanta() {

			return $this->num_planta;

		}

		public function getPrecioNoche() {

			return $this->precio_noche;

		}

		public function getTelevision() {

			return $this->television;

		}

		public function getVistas() {

			return $this->vistas;

		}

		public static function buscarHabitacion($id) {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT * FROM habitaciones WHERE id LIKE '".$id."'";

			$resultado = $conexion->query($sql);
			$fila = $resultado->fetch();
			return $fila;

		}

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

		public static function insertarHabitacion($id, $hoteles_id, $descripcion, $num_camas, $num_habitacion, $num_planta, $precio_noche, $television, $vistas) {

			$conexion = Conexion::conexionBD();

			$sql = "INSERT INTO habitaciones (id, hoteles_id, descripcion, num_camas, num_habitacion, num_planta, precio_noche, television, vistas) VALUES (NULL, '$hoteles_id', '$descripcion', '$num_camas', '$num_habitacion', '$num_planta', '$precio_noche', '$television', '$vistas')";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

		public static function actualizarHabitacion($id, $descripcion, $num_camas, $num_habitacion, $num_planta, $precio_noche, $television, $vistas) {

			$conexion = Conexion::conexionBD();

			$sql = "UPDATE habitaciones SET descripcion = '$descripcion', num_camas = '$num_camas', num_habitacion = '$num_habitacion', num_planta = '$num_planta', precio_noche = '$precio_noche', television = '$television', vistas = '$vistas' WHERE id = '$id'";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

		public static function eliminarHabitacion($id) {

			$conexion = Conexion::conexionBD();

			$sql = "DELETE FROM habitaciones WHERE id = '".$id."'";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

	}

?>
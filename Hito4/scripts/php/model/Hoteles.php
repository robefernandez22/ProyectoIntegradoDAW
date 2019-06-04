<?php

	require_once "Conexion.php";

	class Hoteles {

		private $id;
		private $nombre;
		private $descripcion;
		private $num_habitaciones;
		private $ciudad;
		private $calle;
		private $numero;
		private $cod_postal;
		private $estrellas;
		private $garaje;
		private $piscina;
		private $aire_acondicionado;
		private $wifi;

		function __construct($fila) {

			$this->id = $fila["id"];
			$this->nombre = $fila["nombre"];
			$this->descripcion = $fila["descripcion"];
			$this->ciudad = $fila["ciudad"];
			$this->calle = $fila["calle"];
			$this->numero = $fila["numero"];
			$this->cod_postal = $fila["cod_postal"];
			$this->estrellas = $fila["estrellas"];
			$this->garaje = $fila["garaje"];
			$this->piscina = $fila["piscina"];
			$this->aire_acondicionado = $fila["aire_acondicionado"];
			$this->wifi = $fila["wifi"];

		}

		public function getId() {

			return $this->id;

		}

		public function getNombre() {

			return $this->nombre;

		}

		public function getDescripcion() {

			return $this->descripcion;

		}

		public function getCiudad() {

			return $this->ciudad;

		}

		public function getCalle() {

			return $this->calle;

		}

		public function getNumero() {

			return $this->numero;

		}

		public function getCodPostal() {

			return $this->cod_postal;

		}

		public function getEstrellas() {

			return $this->estrellas;

		}

		public function getGaraje() {

			return $this->garaje;

		}

		public function getPiscina() {

			return $this->piscina;

		}

		public function getAire() {

			return $this->aire_acondicionado;

		}

		public function getWifi() {

			return $this->wifi;

		}

		public function getDireccion() {

			return $this->calle.", Nº" . $this->numero.", " . $this->cod_postal;

		}

		public function getHabitaciones() {
			
			$conexion = Conexion::conexionBD();

			$sql = "SELECT COUNT(*) FROM habitaciones WHERE hoteles_id = '".$this->id."'";

			$resultado = $conexion->query($sql);
			$fila = $resultado->fetch();
			return $fila[0];
		}

		public function getImagenes() {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT * FROM imagenes_hoteles WHERE hoteles_id = '".$this->id."'";
			$resultado = $conexion->query($sql);

			$imagenes = [];
			while ($registros = $resultado->fetch()) {
				$imagenes[] = $registros["img_path"];
			}

			return $imagenes;

		}

		public static function getAllImagenes() {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT * FROM imagenes_hoteles";
			$resultado = $conexion->query($sql);

			$imagenes = [];
			while ($registros = $resultado->fetch()) {
				$imagenes[] = $registros;
			}

			return $imagenes;

		}

		public static function buscarHotel($id) {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT * FROM hoteles WHERE id LIKE '$id'";

			$resultado = $conexion->query($sql);
			$fila = $resultado->fetch();
			return $fila;

		}

		public static function devolverHoteles() {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT * FROM hoteles";
			
			$resultado = $conexion->query($sql);

			$hoteles = [];
			while ($registros = $resultado->fetch()) {
				$hoteles[] = new Hoteles($registros);
			}

			return $hoteles;

		}

		public static function insertarHotel($nombre, $descripcion, $ciudad, $calle, $numero, $cod_postal, $estrellas, $garaje, $piscina, $aire_acondicionado, $wifi) {

			$conexion = Conexion::conexionBD();

			$sql = "INSERT INTO hoteles (id, nombre, descripcion, ciudad, calle, numero, cod_postal, estrellas, garaje, piscina, aire_acondicionado, wifi) VALUES (NULL, '$nombre', '$descripcion', '$ciudad', '$calle', '$numero', '$cod_postal', '$estrellas', '$garaje', '$piscina', '$aire_acondicionado', '$wifi')";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

		public static function insertarImagen($hoteles_id, $img_path) {

			$conexion = Conexion::conexionBD();

			$sql = "INSERT INTO imagenes_hoteles (img_path, hoteles_id)
			VALUES ('$img_path', '$hoteles_id')";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

		public static function actualizarHotel($id, $nombre, $descripcion, $ciudad, $calle, $numero, $cod_postal, $estrellas, $garaje, $piscina, $aire_acondicionado, $wifi) {

			$conexion = Conexion::conexionBD();

			$sql = "UPDATE hoteles SET nombre='$nombre', descripcion='$descripcion', ciudad='$ciudad', calle='$calle', numero='$numero', cod_postal='$cod_postal', estrellas='$estrellas', garaje='$garaje', piscina='$piscina', aire_acondicionado='$aire_acondicionado', wifi='$wifi' WHERE id = '$id'";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

		public static function eliminarHotel($id) {

			$conexion = Conexion::conexionBD();

			$sql = "DELETE FROM hoteles WHERE id = '".$id."'";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

		public static function eliminarImagen($id) {

			$conexion = Conexion::conexionBD();

			$sql = "DELETE FROM imagenes_hoteles WHERE id LIKE '$id'";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

	}

?>
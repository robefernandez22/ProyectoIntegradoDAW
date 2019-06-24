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
		private $wifi;

		/** 
		 * crea un objeto Hoteles
		 * @param array $fila
		*/
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
			$this->wifi = $fila["wifi"];

		}

		/** 
		 * devuelve el ID de un hotel
		 * @return string
		*/
		public function getId() {

			return $this->id;

		}

		/** 
		 * devuelve el nombre de un hotel
		 * @return string
		*/
		public function getNombre() {

			return $this->nombre;

		}

		/** 
		 * devuelve la descripción de un hotel
		 * @return string
		*/
		public function getDescripcion() {

			return $this->descripcion;

		}

		/** 
		 * devuelve la ciudad de un hotel
		 * @return string
		*/
		public function getCiudad() {

			return $this->ciudad;

		}

		/** 
		 * devuelve la calle de un hotel
		 * @return string
		*/
		public function getCalle() {

			return $this->calle;

		}

		/** 
		 * devuelve el número de la calle de un hotel
		 * @return string
		*/
		public function getNumero() {

			return $this->numero;

		}

		/** 
		 * devuelve el código postal de un hotel
		 * @return string
		*/
		public function getCodPostal() {

			return $this->cod_postal;

		}

		/** 
		 * devuelve las estrellas de un hotel
		 * @return string
		*/
		public function getEstrellas() {

			return $this->estrellas;

		}

		/** 
		 * devuelve si un hotel tiene garaje o no
		 * @return string
		*/
		public function getGaraje() {

			return $this->garaje;

		}

		/** 
		 * devuelve si un hotel tiene piscina o no
		 * @return string
		*/
		public function getPiscina() {

			return $this->piscina;

		}

		/** 
		 * devuelve si un hotel tiene wifi o no
		 * @return string
		*/
		public function getWifi() {

			return $this->wifi;

		}

		/** 
		 * devuelve la dirección completa de un hotel
		 * @return string
		*/
		public function getDireccion() {

			return $this->calle.", Nº" . $this->numero.", " . $this->cod_postal;

		}

		/** 
		 * devuelve la valoración media de un hotel
		 * @return integer
		*/
		public function getValoracionMedia() {

			$conexion = Conexion::conexionBD();
			$sql = "SELECT puntuacion FROM valoraciones WHERE hoteles_id = '$this->id'";
			$resultado = $conexion->query($sql);
			
			$suma = 0;
			$contador = 0;
			$media = 0;
			while ($registros = $resultado->fetch()) {
				$suma = $suma + $registros[0];
				$contador++;
			}

			if ($suma != 0) {
				$media = $suma / $contador;
			}

			return $media;

		}

		/** 
		 * devuelve todos los hoteles que cumplan los parámetros
		 * @param string $fechaEntrada
		 * @param string $fechaSalida
		 * @param string $numPersonas
		 * @param string $ciudad
		 * @return array
		*/
		public static function getHotelesParametros($fechaEntrada, $fechaSalida, $numPersonas, $ciudad) {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT DISTINCT HA.HOTELES_ID FROM HABITACIONES HA
					WHERE NOT EXISTS (SELECT NULL
					                  FROM RESERVAS_HABITACIONES RH, RESERVAS R
					                  WHERE RH.HABITACIONES_ID = HA.ID
					                  AND RH.RESERVAS_ID = R.ID
									  AND '$fechaEntrada' <= R.FECHA_SALIDA
									  AND '$fechaSalida' >= R.FECHA_ENTRADA)
					AND HA.DESCRIPCION LIKE '$numPersonas'
                    AND HA.HOTELES_ID IN (SELECT ID
                                         FROM HOTELES
                                         WHERE CIUDAD LIKE '$ciudad')
                    AND HA.HOTELES_ID IN (SELECT DISTINCT HOTELES_ID
                                         FROM TIPOS_PENSIONES)
					ORDER BY HA.ID";

			$resultado = $conexion->query($sql);
			$hoteles = [];
			while ($registros = $resultado->fetch()) {
				$hoteles[] = $registros;
			}

			return $hoteles;

		}

		/** 
		 * devuelve todos los hoteles de una ciudad en concreto
		 * @param string $ciudad
		 * @return array
		*/
		public static function getHotelesByCiudad($ciudad) {

			$conexion = Conexion::conexionBD();			

			$sql = "SELECT id FROM hoteles WHERE ciudad LIKE '$ciudad'";
			$resultado = $conexion->query($sql);

			$hoteles = [];
			while ($registros = $resultado->fetch()) {
				$hoteles[] = $registros;
			}

			return $hoteles;

		}

		/** 
		 * devuelve todas las reservas de un hotel siempre y cuando la fecha de salida sea mayor que la fecha actual
		 * @param string $idHotel
		 * @param string $fechaActual
		 * @return array
		*/
		public static function obtenerReservas($idHotel, $fechaActual) {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT r.id, ho.nombre
					FROM reservas r, reservas_habitaciones rh, hoteles ho, habitaciones ha
					where r.id = rh.reservas_id
					and ha.id = rh.habitaciones_id
					and ha.hoteles_id = ho.id
					and ho.id = '$idHotel'
					and r.fecha_salida > '$fechaActual'";

			$resultado = $conexion->query($sql);
			$reservas = [];
			while ($registros = $resultado->fetch()) {
				$reservas[] = $registros;
			}

			return $reservas;

		}

		/** 
		 * modifica una pensión en concreto
		 * @param string $pensionId
		 * @param string $precio
		 * @return string
		*/
		public static function setPension($pensionId, $precio) {

			$conexion = Conexion::conexionBD();

			$sql = "UPDATE tipos_pensiones SET precio = $precio WHERE id = '$pensionId'";
			$resultado = $conexion->exec($sql);
			return $resultado;

		}

		/** 
		 * devuelve todas las pensiones de un hotel en concreto
		 * @param string $hotelId
		 * @return array
		*/
		public static function getPensiones($hotelId) {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT * FROM TIPOS_PENSIONES WHERE HOTELES_ID = '$hotelId'";

			$resultado = $conexion->query($sql);
			$pensiones = [];
			while ($registros = $resultado->fetch()) {
				$pensiones[] = $registros;
			}

			return $pensiones;

		}

		/** 
		 * devuelve todas las ciudades donde haya hoteles
		 * @return array
		*/
		public static function getCiudades() {

			$conexion = Conexion::conexionBD();			

			$sql = "SELECT DISTINCT ciudad FROM hoteles";
			$resultado = $conexion->query($sql);

			$ciudades = [];
			while ($registros = $resultado->fetch()) {
				$ciudades[] = $registros;
			}

			return $ciudades;

		}

		/** 
		 * devuelve el número de habitaciones de un hotel en concreto
		 * @return string
		*/
		public function getHabitaciones() {
			
			$conexion = Conexion::conexionBD();

			$sql = "SELECT COUNT(*) FROM habitaciones WHERE hoteles_id = '$this->id'";

			$resultado = $conexion->query($sql);
			$fila = $resultado->fetch();
			return $fila[0];
		}

		/** 
		 * devuelve todas las imágenes de un hotel en concreto
		 * @return array
		*/
		public function getImagenes() {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT * FROM imagenes_hoteles WHERE hoteles_id = '$this->id'";
			$resultado = $conexion->query($sql);

			$imagenes = [];
			while ($registros = $resultado->fetch()) {
				$imagenes[] = $registros;
			}

			return $imagenes;

		}

		/** 
		 * devuelve todas las imagenes de todos los hoteles
		 * @return array
		*/
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

		/** 
		 * busca un hotel por su id y devuelve los datos de dicho hotel
		 * @param string $id
		 * @return string
		*/
		public static function buscarHotel($id) {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT * FROM hoteles WHERE id LIKE '$id'";

			$resultado = $conexion->query($sql);
			$fila = $resultado->fetch();
			return $fila;

		}

		/** 
		 * devuelve todos los hoteles existentes
		 * @return array
		*/
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

		/** 
		 * inserta un hotel
		 * @param string $nombre
		 * @param string $descripcion
		 * @param string $ciudad
		 * @param string $calle
		 * @param string $numero
		 * @param string $cod_postal
		 * @param string $estrellas
		 * @param string $garaje
		 * @param string $piscina
		 * @param string $wifi
		 * @return string
		*/
		public static function insertarHotel($nombre, $descripcion, $ciudad, $calle, $numero, $cod_postal, $estrellas, $garaje, $piscina, $wifi) {

			$conexion = Conexion::conexionBD();

			$sql = "INSERT INTO hoteles (id, nombre, descripcion, ciudad, calle, numero, cod_postal, estrellas, garaje, piscina, wifi) VALUES (NULL, '$nombre', '$descripcion', '$ciudad', '$calle', '$numero', '$cod_postal', '$estrellas', '$garaje', '$piscina', '$wifi')";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

		/** 
		 * inserta una imagen en la tabla imagenes_hoteles
		 * @param string $hoteles_id
		 * @param string $img_path
		 * @return string
		*/
		public static function insertarImagen($hoteles_id, $img_path) {

			$conexion = Conexion::conexionBD();

			$sql = "INSERT INTO imagenes_hoteles (img_path, hoteles_id)
			VALUES ('$img_path', '$hoteles_id')";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

		/** 
		 * actualiza un hotel
		 * @param string $id
		 * @param string $nombre
		 * @param string $descripcion
		 * @param string $ciudad
		 * @param string $calle
		 * @param string $numero
		 * @param string $cod_postal
		 * @param string $estrellas
		 * @param string $garaje
		 * @param string $piscina
		 * @param string $wifi
		 * @return string
		*/
		public static function actualizarHotel($id, $nombre, $descripcion, $ciudad, $calle, $numero, $cod_postal, $estrellas, $garaje, $piscina, $wifi) {

			$conexion = Conexion::conexionBD();

			$sql = "UPDATE hoteles SET nombre='$nombre', descripcion='$descripcion', ciudad='$ciudad', calle='$calle', numero='$numero', cod_postal='$cod_postal', estrellas='$estrellas', garaje='$garaje', piscina='$piscina', wifi='$wifi' WHERE id = '$id'";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

		/** 
		 * elimina un hotel en concreto
		 * @param string $id
		 * @return string
		*/
		public static function eliminarHotel($id) {

			$conexion = Conexion::conexionBD();

			$sql = "DELETE FROM hoteles WHERE id = '$id'";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

		/** 
		 * elimina una imagen en concreto de la tabla imagenes_hoteles
		 * @param string $id
		 * @return string
		*/
		public static function eliminarImagen($id) {

			$conexion = Conexion::conexionBD();

			$sql = "DELETE FROM imagenes_hoteles WHERE id LIKE '$id'";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

		/** 
		 * inserta una pensión en la tabla pensiones
		 * @param string $descripcion
		 * @param string $precio
		 * @param string $hotelId
		 * @return string
		*/
		public static function insertarPension($descripcion, $precio, $hotelId) {

			$conexion = Conexion::conexionBD();

			$sql = "INSERT INTO `tipos_pensiones`(`id`, `descripcion`, `precio`, `hoteles_id`)
			VALUES (NULL, '$descripcion', '$precio', '$hotelId')";
			$resultado = $conexion->exec($sql);
			return $resultado;

		}

	}

?>
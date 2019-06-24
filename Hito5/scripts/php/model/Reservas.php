<?php

	require_once "Conexion.php";

	class Reservas {

		private $id;
		private $usuarios_correo;
		private $fecha_reserva;
		private $fecha_entrada;
		private $fecha_salida;
		private $num_personas;
		private $nombre_hotel;
		private $descripcion_hab;
		private $num_habitacion;
		private $num_planta;
		private $precio_noche;
		private $num_camas;
		private $descripcion_pension;
		private $precio_pension;
		private $hotel_id;

		/** 
		 * crea un objeto Reservas
		 * @param array $fila
		*/
		function __construct($fila) {

			$this->id = $fila[0];
			$this->usuarios_correo = $fila[1];
			$this->fecha_reserva = $fila[2];
			$this->fecha_entrada = $fila[3];
			$this->fecha_salida = $fila[4];
			$this->num_personas = $fila[5];
			$this->nombre_hotel = $fila[6];
			$this->descripcion_hab = $fila[7];
			$this->num_habitacion = $fila[8];
			$this->num_planta = $fila[9];
			$this->precio_noche = $fila[10];
			$this->num_camas = $fila[11];
			$this->descripcion_pension = $fila[12];
			$this->precio_pension = $fila[13];
			$this->hotel_id = $fila[14];

		}

		/** 
		 * devuelve el ID de una reserva
		 * @return string
		*/
		public function getId() {
			return $this->id;
		}

		/** 
		 * devuelve el correo del usuario de una reserva
		 * @return string
		*/
		public function getUsuariosCorreo() {
			return $this->usuarios_correo;
		}

		/** 
		 * devuelve la fecha de reserva de una reserva
		 * @return string
		*/
		public function getFechaReserva() {
			return $this->fecha_reserva;
		}

		/** 
		 * devuelve la fecha de entrada de una reserva
		 * @return string
		*/
		public function getFechaEntrada() {
			return $this->fecha_entrada;
		}

		/** 
		 * devuelve la fecha de salida de una reserva
		 * @return string
		*/
		public function getFechaSalida() {
			return $this->fecha_salida;
		}

		/** 
		 * devuelve el número de personas de una reserva
		 * @return string
		*/
		public function getNumPersonas() {
			return $this->num_personas;
		}

		/** 
		 * devuelve el nombre del hotel de una reserva
		 * @return string
		*/
		public function getNombreHotel() {
			return $this->nombre_hotel;
		}

		/** 
		 * devuelve la descripción de la habitación de una reserva
		 * @return string
		*/
		public function getDescripcionHab() {
			return $this->descripcion_hab;
		}

		/** 
		 * devuelve el número de habitación de la habitación de una reserva
		 * @return string
		*/
		public function getNumHabitacion() {
			return $this->num_habitacion;
		}

		/** 
		 * devuelve el número de planta de la habitación de una reserva
		 * @return string
		*/
		public function getNumPlanta() {
			return $this->num_planta;
		}

		/** 
		 * devuelve el precio por noche de una reserva
		 * @return string
		*/
		public function getPrecioNocheHab() {
			return $this->precio_noche;
		}

		/** 
		 * devuelve el número de camas de una reserva
		 * @return string
		*/
		public function getNumCamas() {
			return $this->num_camas;
		}

		/** 
		 * devuelve la descripción de la pensión de una reserva
		 * @return string
		*/
		public function getDescPension() {
			return $this->descripcion_pension;
		}

		/** 
		 * devuelve el precio de la pensión de una reserva
		 * @return string
		*/
		public function getPrecioPension() {
			return $this->precio_pension;
		}

		/** 
		 * devuelve el ID del hotel de una reserva
		 * @return string
		*/
		public function getHotelId() {
			return $this->hotel_id;
		}

		/** 
		 * devuelve el número de noches de una reserva
		 * @return integer
		*/
		public function getNoches() {
			$fecha1 = new DateTime($this->fecha_entrada);
			$fecha2 = new DateTime($this->fecha_salida);
			$diff = $fecha1->diff($fecha2);
			$numNoches = $diff->days;
			return $numNoches;
		}

		/** 
		 * realiza/inserta una reserva
		 * @param string $fechaReserva
		 * @param string $fechaEntrada
		 * @param string $fechaSalida
		 * @param string $numPersonas
		 * @param string $usuario
		 * @param string $tipoPension
		 * @return string
		*/
		public static function realizarReserva($fechaReserva, $fechaEntrada, $fechaSalida, $numPersonas, $usuario, $tipoPension) {

			$conexion = Conexion::conexionBD();

			$sql = "INSERT INTO `reservas`(`id`, `fecha_reserva`, `fecha_entrada`, `fecha_salida`, `num_personas`, `usuarios_correo`, `tipos_pensiones_id`) VALUES (NULL,'$fechaReserva','$fechaEntrada','$fechaSalida','$numPersonas','$usuario','$tipoPension')";
			$resultado = $conexion->exec($sql);

			return $resultado;

		}

		/** 
		 * inserta una reserva
		 * @param string $idReserva
		 * @param string $idHabitacion
		 * @return string
		*/
		public static function insertarReserva($idReserva, $idHabitacion) {

			$conexion = Conexion::conexionBD();

			$sql = "INSERT INTO `reservas_habitaciones`(`reservas_id`, `habitaciones_id`) VALUES ('$idReserva','$idHabitacion')";
			$resultado = $conexion->exec($sql);

			return $resultado;

		}

		/** 
		 * devuelve todas las reservas
		 * @return array
		*/
		public static function getReservas() {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT R.ID, U.CORREO, R.FECHA_RESERVA, R.FECHA_ENTRADA, R.FECHA_SALIDA, R.NUM_PERSONAS, HO.NOMBRE,
			HA.DESCRIPCION, HA.NUM_HABITACION, HA.NUM_PLANTA, HA.PRECIO_NOCHE, HA.NUM_CAMAS, TP.DESCRIPCION, TP.PRECIO, HO.ID
			FROM USUARIOS U, RESERVAS R, HOTELES HO, HABITACIONES HA, TIPOS_PENSIONES TP, RESERVAS_HABITACIONES RH
			WHERE U.CORREO LIKE R.USUARIOS_CORREO
			AND R.ID = RH.RESERVAS_ID
			AND HO.ID = TP.HOTELES_ID
			AND HA.ID = RH.HABITACIONES_ID
			AND TP.ID = R.TIPOS_PENSIONES_ID";
			
			$resultado = $conexion->query($sql);

			$reservas = [];
			while ($registros = $resultado->fetch()) {
				$reservas[] = new Reservas($registros);
			}

			return $reservas;

		}

		/** 
		 * devuelve el ID de la última reserva
		 * @return array
		*/
		public static function getIdUltimaReserva() {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT id FROM `reservas` ORDER BY ID DESC";
			$resultado = $conexion->query($sql);

			$reservas = [];
			while ($registros = $resultado->fetch()) {
				$reservas[] = $registros["id"];
			}

			return $reservas;

		}

		/** 
		 * obtiene las reservas de un usuario en concreto
		 * @param string $correo
		 * @return array
		*/
		public static function getReservasUsuario($correo) {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT R.ID, U.CORREO, R.FECHA_RESERVA, R.FECHA_ENTRADA, R.FECHA_SALIDA, R.NUM_PERSONAS, HO.NOMBRE,
			HA.DESCRIPCION, HA.NUM_HABITACION, HA.NUM_PLANTA, HA.PRECIO_NOCHE, HA.NUM_CAMAS, TP.DESCRIPCION, TP.PRECIO, HO.ID
			FROM USUARIOS U, RESERVAS R, HOTELES HO, HABITACIONES HA, TIPOS_PENSIONES TP, RESERVAS_HABITACIONES RH
			WHERE U.CORREO LIKE R.USUARIOS_CORREO
            AND U.CORREO LIKE '$correo'
			AND R.ID = RH.RESERVAS_ID
			AND HO.ID = TP.HOTELES_ID
			AND HA.ID = RH.HABITACIONES_ID
			AND TP.ID = R.TIPOS_PENSIONES_ID";
			
			$resultado = $conexion->query($sql);

			$reservas = [];
			while ($registros = $resultado->fetch()) {
				$reservas[] = new Reservas($registros);
			}

			return $reservas;

		}

		/** 
		 * obtiene las reservas de un hotel en concreto
		 * @param string $id
		 * @return array
		*/
		public static function getReservasHotel($id) {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT R.ID, U.CORREO, R.FECHA_RESERVA, R.FECHA_ENTRADA, R.FECHA_SALIDA, R.NUM_PERSONAS, HO.NOMBRE,
			HA.DESCRIPCION, HA.NUM_HABITACION, HA.NUM_PLANTA, HA.PRECIO_NOCHE, HA.NUM_CAMAS, TP.DESCRIPCION, TP.PRECIO, HO.ID
			FROM USUARIOS U, RESERVAS R, HOTELES HO, HABITACIONES HA, TIPOS_PENSIONES TP, RESERVAS_HABITACIONES RH
			WHERE U.CORREO LIKE R.USUARIOS_CORREO
			AND R.ID = RH.RESERVAS_ID
			AND HO.ID = TP.HOTELES_ID
			AND HO.ID = '$id'
			AND HA.ID = RH.HABITACIONES_ID
			AND TP.ID = R.TIPOS_PENSIONES_ID";
			
			$resultado = $conexion->query($sql);

			$reservas = [];
			while ($registros = $resultado->fetch()) {
				$reservas[] = new Reservas($registros);
			}

			return $reservas;

		}

		/** 
		 * obtiene un objeto reserva a partir del id de una reserva
		 * @param string $idReserva
		 * @return object
		*/
		public static function getReservaById($idReserva) {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT R.ID, U.CORREO, R.FECHA_RESERVA, R.FECHA_ENTRADA, R.FECHA_SALIDA, R.NUM_PERSONAS, HO.NOMBRE,
			HA.DESCRIPCION, HA.NUM_HABITACION, HA.NUM_PLANTA, HA.PRECIO_NOCHE, HA.NUM_CAMAS, TP.DESCRIPCION, TP.PRECIO, HO.ID
			FROM USUARIOS U, RESERVAS R, HOTELES HO, HABITACIONES HA, TIPOS_PENSIONES TP, RESERVAS_HABITACIONES RH
			WHERE U.CORREO LIKE R.USUARIOS_CORREO
			AND R.ID = RH.RESERVAS_ID
			AND R.ID = '$idReserva'
			AND HO.ID = TP.HOTELES_ID
			AND HA.ID = RH.HABITACIONES_ID
			AND TP.ID = R.TIPOS_PENSIONES_ID";

			$resultado = $conexion->query($sql);
			$fila = $resultado->fetch();
			$reserva = new Reservas($fila);

			return $reserva;

		}

		/** 
		 * obtiene el id de una habitación a partir del id de una reserva
		 * @param string $idReserva
		 * @return string
		*/
		public static function getIdHabitacion($idReserva) {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT HABITACIONES_ID
					FROM RESERVAS_HABITACIONES
					WHERE RESERVAS_ID = '$idReserva'";
			$resultado = $conexion->query($sql);
			$fila = $resultado->fetch();

			return $fila[0];

		}

		/** 
		 * devuelve la descripción de una pensión en concreto
		 * @return string
		*/
		public function getPension() {
			
			$conexion = Conexion::conexionBD();

			$sql = "SELECT descripcion FROM tipos_pensiones WHERE id = '$this->tipos_pensiones_id'";
			$resultado = $conexion->query($sql);
			$fila = $resultado->fetch();
			return $fila;

		}

		/** 
		 * devuelve el nombre de un hotel de una reserva en concreto
		 * @return string
		*/
		public function getHotel() {
			
			$conexion = Conexion::conexionBD();

			$sql = "SELECT nombre FROM hoteles WHERE id = '$this->tipos_pensiones_id'";
			$resultado = $conexion->query($sql);
			$fila = $resultado->fetch();
			return $fila;

		}

		/** 
		 * cancela/elimina una reserva
		 * @param string $idReserva
		 * @return string
		*/
		public static function cancelarReserva($idReserva) {

			$conexion = Conexion::conexionBD();
			$sql = "DELETE FROM reservas WHERE id = '$idReserva'";
			$resultado = $conexion->exec($sql);
			return $resultado;

		}

	}

?>
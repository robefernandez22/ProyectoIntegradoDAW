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

		}

		public function getId() {
			return $this->id;
		}

		public function getUsuariosCorreo() {
			return $this->usuarios_correo;
		}

		public function getFechaReserva() {
			return $this->fecha_reserva;
		}

		public function getFechaEntrada() {
			return $this->fecha_entrada;
		}

		public function getFechaSalida() {
			return $this->fecha_salida;
		}

		public function getNumPersonas() {
			return $this->num_personas;
		}

		public function getNombreHotel() {
			return $this->nombre_hotel;
		}

		public function getDescripcionHab() {
			return $this->descripcion_hab;
		}

		public function getNumHabitacion() {
			return $this->num_habitacion;
		}

		public function getNumPlanta() {
			return $this->num_planta;
		}

		public function getPrecioNocheHab() {
			return $this->precio_noche;
		}

		public function getNumCamas() {
			return $this->num_camas;
		}

		public function getDescPension() {
			return $this->descripcion_pension;
		}

		public function getPrecioPension() {
			return $this->precio_pension;
		}

		public static function getReservas() {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT R.ID, U.CORREO, R.FECHA_RESERVA, R.FECHA_ENTRADA, R.FECHA_SALIDA, R.NUM_PERSONAS, 
			HO.NOMBRE, HA.DESCRIPCION, HA.NUM_HABITACION, HA.NUM_PLANTA, HA.PRECIO_NOCHE, HA.NUM_CAMAS, TP.DESCRIPCION, TP.PRECIO
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

		public static function getReservasUsuario($correo) {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT R.ID, U.CORREO, R.FECHA_RESERVA, R.FECHA_ENTRADA, R.FECHA_SALIDA, R.NUM_PERSONAS, 
			HO.NOMBRE, HA.DESCRIPCION, HA.NUM_HABITACION, HA.NUM_PLANTA, HA.PRECIO_NOCHE, HA.NUM_CAMAS, TP.DESCRIPCION, TP.PRECIO
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

		public static function getReservasHotel($id) {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT R.ID, U.CORREO, R.FECHA_RESERVA, R.FECHA_ENTRADA, R.FECHA_SALIDA, R.NUM_PERSONAS, 
			HO.NOMBRE, HA.DESCRIPCION, HA.NUM_HABITACION, HA.NUM_PLANTA, HA.PRECIO_NOCHE, HA.NUM_CAMAS, TP.DESCRIPCION, TP.PRECIO
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

		public static function getReservasFechaReserva($orden) {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT R.ID, U.CORREO, R.FECHA_RESERVA, R.FECHA_ENTRADA, R.FECHA_SALIDA, R.NUM_PERSONAS, 
			HO.NOMBRE, HA.DESCRIPCION, HA.NUM_HABITACION, HA.NUM_PLANTA, HA.PRECIO_NOCHE, HA.NUM_CAMAS, TP.DESCRIPCION, TP.PRECIO
			FROM USUARIOS U, RESERVAS R, HOTELES HO, HABITACIONES HA, TIPOS_PENSIONES TP, RESERVAS_HABITACIONES RH
			WHERE U.CORREO LIKE R.USUARIOS_CORREO
			AND R.ID = RH.RESERVAS_ID
			AND HO.ID = TP.HOTELES_ID
			AND HO.ID = TP.HOTELES_ID
			AND HA.ID = RH.HABITACIONES_ID
			AND TP.ID = R.TIPOS_PENSIONES_ID
			ORDER BY R.FECHA_RESERVA $orden";
			
			$resultado = $conexion->query($sql);

			$reservas = [];
			while ($registros = $resultado->fetch()) {
				$reservas[] = new Reservas($registros);
			}

			return $reservas;

		}

		public static function getReservasFechaEntrada($orden) {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT R.ID, U.CORREO, R.FECHA_RESERVA, R.FECHA_ENTRADA, R.FECHA_SALIDA, R.NUM_PERSONAS, 
			HO.NOMBRE, HA.DESCRIPCION, HA.NUM_HABITACION, HA.NUM_PLANTA, HA.PRECIO_NOCHE, HA.NUM_CAMAS, TP.DESCRIPCION, TP.PRECIO
			FROM USUARIOS U, RESERVAS R, HOTELES HO, HABITACIONES HA, TIPOS_PENSIONES TP, RESERVAS_HABITACIONES RH
			WHERE U.CORREO LIKE R.USUARIOS_CORREO
			AND R.ID = RH.RESERVAS_ID
			AND HO.ID = TP.HOTELES_ID
			AND HO.ID = TP.HOTELES_ID
			AND HA.ID = RH.HABITACIONES_ID
			AND TP.ID = R.TIPOS_PENSIONES_ID
			ORDER BY R.FECHA_ENTRADA $orden";
			
			$resultado = $conexion->query($sql);

			$reservas = [];
			while ($registros = $resultado->fetch()) {
				$reservas[] = new Reservas($registros);
			}

			return $reservas;

		}

		public static function getReservasFechaSalida($orden) {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT R.ID, U.CORREO, R.FECHA_RESERVA, R.FECHA_ENTRADA, R.FECHA_SALIDA, R.NUM_PERSONAS, 
			HO.NOMBRE, HA.DESCRIPCION, HA.NUM_HABITACION, HA.NUM_PLANTA, HA.PRECIO_NOCHE, HA.NUM_CAMAS, TP.DESCRIPCION, TP.PRECIO
			FROM USUARIOS U, RESERVAS R, HOTELES HO, HABITACIONES HA, TIPOS_PENSIONES TP, RESERVAS_HABITACIONES RH
			WHERE U.CORREO LIKE R.USUARIOS_CORREO
			AND R.ID = RH.RESERVAS_ID
			AND HO.ID = TP.HOTELES_ID
			AND HO.ID = TP.HOTELES_ID
			AND HA.ID = RH.HABITACIONES_ID
			AND TP.ID = R.TIPOS_PENSIONES_ID
			ORDER BY R.FECHA_SALIDA $orden";
			
			$resultado = $conexion->query($sql);

			$reservas = [];
			while ($registros = $resultado->fetch()) {
				$reservas[] = new Reservas($registros);
			}

			return $reservas;

		}

		public function getPension() {
			
			$conexion = Conexion::conexionBD();

			$sql = "SELECT descripcion FROM tipos_pensiones WHERE id = '$this->tipos_pensiones_id'";
			$resultado = $conexion->query($sql);
			$fila = $resultado->fetch();
			return $fila;

		}

		public function getHotel() {
			
			$conexion = Conexion::conexionBD();

			$sql = "SELECT nombre FROM hoteles WHERE id = '$this->tipos_pensiones_id'";
			$resultado = $conexion->query($sql);
			$fila = $resultado->fetch();
			return $fila;

		}

		public static function cancelarReserva($idReserva) {

			$conexion = Conexion::conexionBD();

			$sql = "DELETE FROM reservas WHERE id = '$idReserva'";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

	}

?>
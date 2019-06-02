<?php

	require_once "Conexion.php";

	class Reservas {

		private $id;
		private $fecha_reserva;
		private $fecha_entrada;
		private $fecha_salida;
		private $num_personas;
		private $usuarios_correo;
		private $tipos_pensiones_id;

		function __construct($fila) {

			$this->id = $fila["id"];
			$this->fecha_reserva = $fila["fecha_reserva"];
			$this->fecha_entrada = $fila["fecha_entrada"];
			$this->fecha_salida = $fila["fecha_salida"];
			$this->num_personas = $fila["num_personas"];
			$this->usuarios_correo = $fila["usuarios_correo"];
			$this->tipos_pensiones_id = $fila["tipos_pensiones_id"];

		}

		public function getId() {
			return $this->id;
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

		public function getUsuariosCorreo() {
			return $this->usuarios_correo;
		}

		public function getTiposPensionesId() {
			return $this->tipos_pensiones_id;
		}

		public static function devolverReservas() {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT * FROM reservas";
			
			$resultado = $conexion->query($sql);

			$reservas = [];
			while ($registros = $resultado->fetch()) {
				$reservas[] = new Reservas($registros);
			}

			return $reservas;

		}

	}

?>
<?php

	require_once "Conexion.php";

	class Usuario {

		private $nombre;
		private $apellidos;
		private $correo;
		private $password;
		private $tipo;

		function __construct($fila) {

			$this->correo = $fila["correo"];
			$this->nombre = $fila["nombre"];
			$this->apellidos = $fila["apellidos"];
			$this->password = $fila["password"];
			$this->tipo = $fila["tipo"];

		}

		public function getCorreo() {

			return $this->correo;

		}

		public function getNombre() {

			return $this->nombre;

		}

		public function getApellidos() {

			return $this->apellidos;

		}

		public function getPassword() {

			return $this->password;

		}

		public function getTipo() {

			return $this->tipo;

		}

		public static function buscarUsuario($correo) {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT nombre, apellidos, correo, password, tipo
			FROM usuarios WHERE correo LIKE '".$correo."'";

			$resultado = $conexion->query($sql);
			$fila = $resultado->fetch();
			return $fila;

		}

		public static function devolverUsuarios() {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT correo, nombre, apellidos, password, tipo FROM usuarios";
			
			$resultado = $conexion->query($sql);

			$usuarios = [];
			while ($registros = $resultado->fetch()) {
				$usuarios[] = new Usuario($registros);
			}

			return $usuarios;

		}

		public static function insertarUsuario($correo, $nombre, $apellidos, $password, $tipo) {

			$conexion = Conexion::conexionBD();

			$sql = "INSERT INTO usuarios(correo, nombre, apellidos, password, tipo)
			VALUES('".$correo."', '".$nombre."', '".$apellidos."', '".$password."', '".$tipo."')";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

		public static function verificarUsuario($correo, $password) {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT nombre, apellidos, correo, password, tipo
			FROM usuarios WHERE correo LIKE '".$correo."' AND password LIKE '".$password."'";

			$resultado = $conexion->query($sql);

			$fila = $resultado->fetch();
			return $fila;

		}

		public static function actualizarUsuario($correo, $nombre, $apellidos, $password) {

			

		}

	}

?>
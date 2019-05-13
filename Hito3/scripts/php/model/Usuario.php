<?php

	require_once "Conexion.php";

	class Usuario {

		private $nombre;
		private $apellidos;
		private $correo;
		private $password;
		private $tipo;

		function __construct($nombre, $apellidos, $correo, $password, $tipo) {

			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->correo = $correo;
			$this->password = $password;
			$this->tipo = $tipo;

		}

		public function getNombre() {

			return $this->nombre;

		}

		public function getApellidos() {

			return $this->apellidos;

		}

		public function getCorreo() {

			return $this->correo;

		}

		public function getTipo() {

			return $this->tipo;

		}

		public static function buscarUsuario($correo) {

			$conexion = Conexion::conexionBD();
			$sql = "SELECT * FROM usuarios WHERE correo LIKE '$correo'";
			$resultado = $conexion->query($sql);
			$fila = $resultado->fetch();
			return $fila;

		}

		public function insertarUsuario() {

			if (self::verificarUsuario($this->correo, $this->password) == null) {

				// $conexion = Conexion::conexionBD();

				// $sql = "INSERT INTO usuarios(nombre, apellidos, correo, password, tipo)
				// VALUES('".$this->nombre."', '".$this->apellidos."', '".$this->correo."', '".$this->password."', '".$this->tipo."')";

				// $conexion->exec($sql);

				echo "el usuario no existe";
				echo "<br>".$this->password;

			} else {

				echo "el usuario existe";

			}			

		}

		public static function verificarUsuario($correo, $password) {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT * FROM usuarios
			WHERE correo LIKE '$correo' AND password LIKE '$password'";

			$resultado = $conexion->query($sql);

			$fila = $resultado->fetch();

			return $fila;

		}

	}

?>
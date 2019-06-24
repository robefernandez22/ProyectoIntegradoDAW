<?php

	require_once "Conexion.php";

	class Usuario {

		private $nombre;
		private $apellidos;
		private $correo;
		private $password;
		private $tipo;

		/** 
		 * crea un objeto Usuario
		 * @param array $fila
		*/
		function __construct($fila) {

			$this->correo = $fila["correo"];
			$this->nombre = $fila["nombre"];
			$this->apellidos = $fila["apellidos"];
			$this->password = $fila["password"];
			$this->tipo = $fila["tipo"];

		}

		/** 
		 * devuelve el correo del usuario
		 * @return string
		*/
		public function getCorreo() {

			return $this->correo;

		}

		/** 
		 * devuelve el nombre del usuario
		 * @return string
		*/
		public function getNombre() {

			return $this->nombre;

		}

		/** 
		 * devuelve los apellidos del usuario
		 * @return string
		*/
		public function getApellidos() {

			return $this->apellidos;

		}

		/** 
		 * devuelve la contraseña del usuario
		 * @return string
		*/
		public function getPassword() {

			return $this->password;

		}

		/** 
		 * devuelve el tipo del usuario
		 * @return string
		*/
		public function getTipo() {

			if ($this->tipo == "A") {
				return "Administrador";
			} else {
				return "Usuario";
			}

		}

		/** 
		 * obtiene las reservas de un usuario en concreto siempre y cuando la fecha de salida de cada reserva no sea mayor que la fecha actual
		 * @param string $correo
		 * @param string $fechaActual
		 * @return array
		*/
		public static function obtenerReservas($correo, $fechaActual) {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT r.id, ho.nombre
					FROM reservas r, reservas_habitaciones rh, hoteles ho, habitaciones ha
					where r.id = rh.reservas_id
					and ha.id = rh.habitaciones_id
					and ha.hoteles_id = ho.id
					and r.usuarios_correo like '$correo'
					and r.fecha_salida > '$fechaActual'";

			$resultado = $conexion->query($sql);
			$reservas = [];
			while ($registros = $resultado->fetch()) {
				$reservas[] = $registros;
			}

			return $reservas;

		}

		/** 
		 * busca un usuario y devuelve los datos
		 * @param string $correo
		 * @return string
		*/
		public static function buscarUsuario($correo) {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT * FROM usuarios WHERE correo LIKE '$correo'";

			$resultado = $conexion->query($sql);
			$fila = $resultado->fetch();
			return $fila;

		}

		/** 
		 * devuelve todos los usuarios
		 * @return array
		*/
		public static function devolverUsuarios() {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT * FROM usuarios";

			$resultado = $conexion->query($sql);

			$usuarios = [];
			while ($registros = $resultado->fetch()) {
				$usuarios[] = new Usuario($registros);
			}

			return $usuarios;

		}

		/** 
		 * inserta un usuario
		 * @param string $correo
		 * @param string $nombre
		 * @param string $apellidos
		 * @param string $password
		 * @param string $tipo
		 * @return string
		*/
		public static function insertarUsuario($correo, $nombre, $apellidos, $password, $tipo) {

			$conexion = Conexion::conexionBD();

			$sql = "INSERT INTO usuarios(correo, nombre, apellidos, password, tipo)
			VALUES('$correo', '$nombre', '$apellidos', '$password', '$tipo')";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

		/** 
		 * verifica las credenciales de un usuario
		 * @param string $correo
		 * @param string $password
		 * @return string
		*/
		public static function verificarUsuario($correo, $password) {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT * FROM usuarios WHERE correo LIKE '$correo' AND password LIKE '$password'";

			$resultado = $conexion->query($sql);

			$fila = $resultado->fetch();
			return $fila;

		}

		/** 
		 * actualiza los datos de un usuario
		 * @param string $correo
		 * @param string $nombre
		 * @param string $apellidos
		 * @param string $tipo
		 * @return string
		*/
		public static function actualizarUsuario($correo, $nombre, $apellidos, $tipo) {

			$conexion = Conexion::conexionBD();

			$sql = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos', tipo = '$tipo'
			WHERE correo LIKE '$correo'";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

		/** 
		 * actualiza un usuario
		 * @param string $correo
		 * @param string $nombre
		 * @param string $apellidos
		 * @return string
		*/
		public static function actualizacionUsuario($correo, $nombre, $apellidos) {

			$conexion = Conexion::conexionBD();

			$sql = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos'
			WHERE correo LIKE '$correo'";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

		/** 
		 * actualiza la contraseña de un usuario
		 * @param string $correo
		 * @param string $passwordActual
		 * @param string $passwordNueva
		 * @return string
		*/
		public static function setPassword($correo, $passwordActual, $passwordNueva) {

			$conexion = Conexion::conexionBD();

			$sql = "UPDATE usuarios SET password = '".base64_encode($passwordNueva)."' 
			WHERE correo LIKE '$correo' AND password LIKE '".base64_encode($passwordActual)."'";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

		/** 
		 * elimina un usuario
		 * @param string $correo
		 * @return string
		*/
		public static function eliminarUsuario($correo) {

			$conexion = Conexion::conexionBD();

			$sql = "DELETE FROM usuarios WHERE correo LIKE '".$correo."'";

			$resultado = $conexion->exec($sql);
			return $resultado;

		}

	}

?>
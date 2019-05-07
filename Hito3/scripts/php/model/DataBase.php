<?php

	/**
	 * 
	 */
	class DataBase {
		
		protected static function ejecutaConsulta($sql, $tipo) {

			try {
				$conexion = new PDO("mysql:host=localhost;dbname=hoteles_ese", "root", "");
				$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException $e) {
				die("Ha ocurrido el siguiente error " . $e->getCode());
			}

			if ($tipo == "consulta") {
				$resultado = $conexion->query($sql);
			} else {
				$resultado = $conexion->exec($sql);
			}

			return $resultado;

		}

		public static function verificarUsuario($correo, $password) {

			$sql = "SELECT * FROM usuarios WHERE correo LIKE '$correo'
			AND password LIKE md5('$password')";
			$resultado = self::ejecutaConsulta($sql, "consulta");
			$fila = $resultado->fetch();
			return $fila;

		}

		public static function insertarUsuario($correo, $nombre, $apellidos, $password, $tipo)

	}

?>
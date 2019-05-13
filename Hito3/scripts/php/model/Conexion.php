<?php

	abstract class Conexion {

		public static function conexionBD() {

			try {

				$conexion = new PDO("mysql:host=localhost;dbname=hoteles_ese;charset=utf8", "root", "");
				$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			} catch(PDOException $e) {

				die("Error en la línea <b>" . $e->getCode() . "</b><br>Que dice lo siguiente: <b>" . $e->getMessage()."</b>");

			}

			return $conexion;

		}

	}

?>
<?php

	abstract class Conexion {

		/** 
		 * concecta a base de datos
		 * @return object
		*/
		public static function conexionBD() {

			try {

				$conexion = new PDO("mysql:host=localhost;dbname=hoteles_ese;charset=utf8", "root", "");
				$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			} catch(PDOException $e) {
				
				die("Error. Código del error: " . $e->getCode()."<br>Mensaje de error: " . $e->getMessage());
			
			}

			return $conexion;

		}

	}

?>
<?php

	require_once "Conexion.php";

	class Peticiones {

		private $id;
		private $nombre;
		private $apellidos;
		private $correo;
		private $telefono;
		private $asunto;

		/** 
		 * crea un objeto Peticiones
		 * @param array $fila
		*/
		function __construct($fila) {

			$this->id = $fila["id"];
			$this->nombre = $fila["nombre"];
			$this->apellidos = $fila["apellidos"];
			$this->correo = $fila["correo"];
			$this->telefono = $fila["telefono"];
			$this->asunto = $fila["asunto"];

		}

		/** 
		 * devuelve el ID de una petición
		 * @return string
		*/
		public function getId() {

			return $this->id;

		}

		/** 
		 * devuelve el nombre del usuario correspondiente a una petición
		 * @return string
		*/
		public function getNombre() {

			return $this->nombre;

		}

		/** 
		 * devuelve los apellidos del usuario correspondiente a una petición
		 * @return string
		*/
		public function getApellidos() {

			return $this->apellidos;

		}

		/** 
		 * devuelve el correo del usuario correspondiente a una petición
		 * @return string
		*/
		public function getCorreo() {

			return $this->correo;

		}

		/** 
		 * devuelve el telefono del usuario correspondiente a una petición
		 * @return string
		*/
		public function getTelefono() {

			return $this->telefono;

		}

		/** 
		 * devuelve el asunto del usuario correspondiente a una petición
		 * @return string
		*/
		public function getAsunto() {

			return $this->asunto;

		}

		/** 
		 * muestra todas las peticiones
		 * @return array
		*/
		public static function mostrarPeticiones() {

			$conexion = Conexion::conexionBD();

			$sql = "SELECT * FROM peticiones";

			$resultado = $conexion->query($sql);

			$peticiones = [];
			while ($registros = $resultado->fetch()) {
				$peticiones[] = new Peticiones($registros);
			}

			return $peticiones;

		}

		/** 
		 * inserta una petición
		 * @param string $nombre
		 * @param string $apellidos
		 * @param string $correo
		 * @param string $telefono
		 * @param string $asunto
		 * @return string
		*/
		public static function insertarPeticion($nombre, $apellidos, $correo, $telefono, $asunto) {

			$conexion = Conexion::conexionBD();
			$sql = "INSERT INTO `peticiones`(`id`, `nombre`, `apellidos`, `correo`, `telefono`, `asunto`)
			VALUES (NULL,'$nombre','$apellidos','$correo','$telefono', '$asunto')";
			$resultado = $conexion->exec($sql);
			return $resultado;

		}

		/** 
		 * elimina una petición en concreto
		 * @param string $id
		 * @return string
		*/
		public static function eliminarPeticion($id) {

			$conexion = Conexion::conexionBD();
			$sql = "DELETE FROM PETICIONES WHERE id = '$id'";
			$resultado = $conexion->exec($sql);
			return $resultado;

		}

	}

?>
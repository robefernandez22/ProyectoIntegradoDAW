<?php

	/* Este controlador se encarga de eliminar o insertar una petición en concreto. */

	session_start();

	if (!isset($_SESSION["usuario"])) {
		header("Location:../../../index.php");
	} else {
		require_once "../model/Usuario.php";
		$data = Usuario::buscarUsuario($_SESSION["usuario"]);
		$usuario = new Usuario($data);

		if ($usuario->getTipo() != "Administrador") {
			header("Location:../../../index.php");
		}
	}

	require_once "../model/Peticiones.php";

	if (isset($_POST["eliminar"])) {

		$eliminarPeticion = Peticiones::eliminarPeticion($_POST["eliminar"]);
		header("Location:./peticionesController.php?eliminarPeticion=$eliminarPeticion");
		
	} elseif (isset($_POST["insertar"])) {
	
		$insertarPeticion = Peticiones::insertarPeticion($_POST["nombre"], $_POST["nombre"], $_POST["correo"], $_POST["telefono"], $_POST["asunto"]);
		header("Location:../view/vistaContacto.php?peticion=$insertarPeticion");

	} else {

		$data = Peticiones::mostrarPeticiones();
		include "../view/vistaPeticiones.php";
		
	}

?>
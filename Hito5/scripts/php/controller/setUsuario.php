<?php

	/* Este controlador sirve para cargar todos los datos de un usuario en concreto. */

	session_start();

	if (!isset($_SESSION["usuario"])) {
		header("Location:../../../index.php");
	}
	
	require_once "../model/Usuario.php";
	require_once "../model/Reservas.php";
	require_once "../model/Valoraciones.php";

	// Buscamos el usuario y creamos un objeto con la fila que nos devuelve
	$datos = Usuario::buscarUsuario($_SESSION["usuario"]);
	$usuario = new Usuario($datos);

	// Buscamos todas las reservas del usuario en cuestión
	$datos = Reservas::getReservasUsuario($_SESSION["usuario"]);

	if (isset($_GET["admin"])) {
		if ($usuario->getTipo() != "Administrador") {
			header("Location:../../../index.php");
		} else {
			include "../view/vistaDatosAdmin.php";
		}
	} else {
		if ($usuario->getTipo() == "Administrador") {
			header("Location:../view/vistaAdmin.php");
		} else {
			include "../view/vistaDatosUsuario.php";
		}
	}

?>
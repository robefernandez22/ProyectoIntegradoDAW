<?php

	/* Este controlador sirve para cargar las habitaciones de un hotel en concreto. */

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
	
	require_once "../model/Habitaciones.php";
	require_once "../model/Hoteles.php";

	$data = Hoteles::buscarHotel(base64_decode($_GET["idHotel"]));
	$hotel = new Hoteles($data);

	if (isset($_GET["idHotel"])) {
		$data = Habitaciones::devolverHabitaciones(base64_decode($_GET["idHotel"]));
	}

	include "../view/vistaHabitaciones.php";

?>
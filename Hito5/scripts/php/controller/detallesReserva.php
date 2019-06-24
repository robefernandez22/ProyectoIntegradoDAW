<?php

	/* Este controlador carga los detalles de una reserva en concreto. Primero hacemos comprobaciones de seguridad.
	Luego cargamos todo lo necesario para los detalles de esa reserva y por último incluimos la vista correspondiente. */

	session_start();

	if (!isset($_SESSION["usuario"])) {
		header("Location:../../../index.php");
	} else {

		require_once "../model/Usuario.php";
		$data = Usuario::buscarUsuario($_SESSION["usuario"]);
		$usuario = new Usuario($data);

		if ($usuario->getTipo() == "Administrador") {
			header("Location:../view/vistaAdmin.php");
		}

	}

	require_once "../model/Reservas.php";
	require_once "../model/Habitaciones.php";
	require_once "../model/Hoteles.php";

	$reserva = Reservas::getReservaById($_GET["id"]);

	$idHabitacion = Reservas::getIdHabitacion($reserva->getId());
	$data = Habitaciones::buscarHabitacion($idHabitacion);
	$habitacion = new Habitaciones($data);

	$data = Hoteles::buscarHotel($habitacion->getHotelId());
	$hotel = new Hoteles($data);

	include "../view/vistaDetallesReserva.php";

?>
<?php

	/* En este controlador se buscará una habitación en concreto para editarla.
	Después de buscarla por su ID, cargamos la vista correspondiente. */

	session_start();

	require_once "../model/Habitaciones.php";
	require_once "../model/Hoteles.php";

	$datos = Habitaciones::buscarHabitacion(base64_decode($_GET["idHabitacion"]));
	$habitacion = new Habitaciones($datos);
	
	$datos = Hoteles::buscarHotel($habitacion->getHotelId());
	$hotel = new Hoteles($datos);

	include "../view/vistaHabitacion.php";

?>
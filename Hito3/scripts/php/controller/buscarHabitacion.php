<?php

	session_start();
	require_once "../model/Habitaciones.php";
	$datos = Habitaciones::buscarHabitacion(base64_decode($_GET["id"]));
	$habitacion = new Habitaciones($datos);
	include "../view/vistaHabitacion.php";

?>
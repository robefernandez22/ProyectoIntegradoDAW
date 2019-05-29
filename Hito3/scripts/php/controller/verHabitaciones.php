<?php

	session_start();
	require_once "../model/Habitaciones.php";
	if (isset($_GET["idHotel"])) {
		$data = Habitaciones::devolverHabitaciones(base64_decode($_GET["idHotel"]));
	}
	include "../view/vistaHabitaciones.php";

?>
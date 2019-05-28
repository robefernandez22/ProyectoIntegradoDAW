<?php

	session_start();
	require_once "../model/Habitaciones.php";
	if (isset($_GET["id"])) {
		$data = Habitaciones::devolverHabitaciones(base64_decode($_GET["id"]));
	}
	include "../view/vistaHabitaciones.php";

?>
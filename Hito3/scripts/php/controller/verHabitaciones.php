<?php

	session_start();
	require_once "../model/Habitaciones.php";
	require_once "../model/Hoteles.php";

	$data = Hoteles::buscarHotel($_GET["idHotel"]);
	$hotel = new Hoteles($data);

	if (isset($_GET["idHotel"])) {
		$data = Habitaciones::devolverHabitaciones(base64_decode($_GET["idHotel"]));
	}

	include "../view/vistaHabitaciones.php";

?>
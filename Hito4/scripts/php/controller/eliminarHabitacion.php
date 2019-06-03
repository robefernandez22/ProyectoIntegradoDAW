<?php

	require_once "../model/Habitaciones.php";
	$deleteRoom = Habitaciones::eliminarHabitacion($_POST["id"]);
	$idHotel = base64_encode($_POST["hotelId"]);
	header("Location: ./verHabitaciones.php?idHotel=$idHotel&deleteRoom=$deleteRoom");

?>
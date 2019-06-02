<?php

	require_once "../model/Habitaciones.php";
	Habitaciones::eliminarHabitacion($_POST["id"]);
	header("Location: ./verHabitaciones.php?idHotel=<?=".base64_encode($_POST['hotelId'])."?>");

?>
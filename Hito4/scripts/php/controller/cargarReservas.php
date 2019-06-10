<?php

	session_start();
	require_once "../model/Reservas.php";
	require_once "../model/Hoteles.php";

	$data = Reservas::getReservas();
	include "../view/vistaReservas.php";

?>
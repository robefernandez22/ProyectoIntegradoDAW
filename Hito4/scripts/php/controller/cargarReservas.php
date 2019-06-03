<?php

	session_start();
	require_once "../model/Reservas.php";
	$data = Reservas::getReservas();	
	include "../view/vistaReservas.php";

?>
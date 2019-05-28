<?php

	session_start();
	require_once "../model/Hoteles.php";
	$datos = Hoteles::buscarHotel(base64_decode($_GET["id"]));
	$hotel = new Hoteles($datos);
	include "../view/vistaHotel.php";

?>
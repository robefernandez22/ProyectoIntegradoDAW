<?php

	session_start();
	require_once "../model/Hoteles.php";
	require_once "../model/Valoraciones.php";

	$data = Hoteles::buscarHotel(base64_decode($_GET["idHotel"]));
	$hotel = new Hoteles($data);
	$data = Valoraciones::getValoraciones(base64_decode($_GET["idHotel"]));

	include "../view/vistaValoraciones.php";

?>
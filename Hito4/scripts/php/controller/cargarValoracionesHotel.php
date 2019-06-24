<?php

	session_start();

	require_once "../model/Valoraciones.php";
	require_once "../model/Hoteles.php";

	$data = Hoteles::buscarHotel($_POST["hoteles"]);
	$hotel = new Hoteles($data);

	$data = Valoraciones::getValoraciones($_POST["hoteles"]);

	include "../view/vistaValoracionesHotel.php";
	
?>
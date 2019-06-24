<?php

	/* Este controlador sirve para cargar un hotel en concreto y editarlo.
	Primero lo buscamos por su ID y luego cargamos la vista correspondiente. */

	session_start();
	require_once "../model/Hoteles.php";
	$datos = Hoteles::buscarHotel(base64_decode($_GET["id"]));
	$hotel = new Hoteles($datos);
	include "../view/vistaHotel.php";
	
?>
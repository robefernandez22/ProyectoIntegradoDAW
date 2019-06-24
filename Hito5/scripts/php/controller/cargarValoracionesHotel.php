<?php

	/* Este controlador sirve para cargar las valoraciones de un hotel en concreto filtrando por el id del hotel.
	Primero se obtienen las valoraciones de un hotel en concreto y por último se carga la vista correspondiente. */

	session_start();

	require_once "../model/Valoraciones.php";
	require_once "../model/Hoteles.php";

	$data = Hoteles::buscarHotel($_POST["hoteles"]);
	$hotel = new Hoteles($data);

	$data = Valoraciones::getValoraciones($_POST["hoteles"]);

	include "../view/vistaValoracionesHotel.php";
	
?>
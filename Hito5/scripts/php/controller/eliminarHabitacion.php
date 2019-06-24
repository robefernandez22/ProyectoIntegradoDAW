<?php

	/* Este controlador sirve para eliminar una habitación en concreto filtrando por ID.
	Primero cargamos la clase Habitaciones.
	Luego vemos si esa habitación tiene reservas en curso (si es así no dejamos eliminarla)
	Por último redirigimos a la vista de habitaciones en concreto */

	require_once "../model/Habitaciones.php";
	
	$fechaActual = date("20"."y-m-d");
	$reservas = Habitaciones::obtenerReservas($_POST["id"], $fechaActual);

	if (sizeof($reservas) == 0) {
		
		$deleteRoom = Habitaciones::eliminarHabitacion($_POST["id"]);
		
	} else {

		$deleteRoom = 0;

	}

	$idHotel = base64_encode($_POST["hotelId"]);
	header("Location: ./verHabitaciones.php?idHotel=$idHotel&deleteRoom=$deleteRoom");

?>
<?php

	/* Este controlador sirve para eliminar un hotel en concreto filtrando por ID.
	Primero cargamos la clase Hoteles.
	Luego vemos si ese hotel tiene reservas en curso (si es así no dejamos eliminarlo)
	Por último redirigimos a la vista de hoteles */

	require_once "../model/Hoteles.php";
	
	$fechaActual = date("20"."y-m-d");
	$reservas = Hoteles::obtenerReservas($_POST["id"], $fechaActual);

	if (sizeof($reservas) == 0) {
		
		$actualizacion = Hoteles::eliminarHotel($_POST["id"]);
		
	} else {

		$actualizacion = 0;

	}

	header("Location: ./verHoteles.php?actualizacion=".$actualizacion);

?>
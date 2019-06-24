<?php

	/* Este controlador sirve para editar habitaciones. */

	// Cargamos la clase Habitaciones
	require_once "../model/Habitaciones.php";

	// Comprobamos si el número de la habitación ha cambiado.
	$habitacion = Habitaciones::buscarHabitacion($_POST["id"]);
	if ($habitacion["num_habitacion"] != $_POST["numHabitacion"]) {

		// Si el número de la habitación ha cambiado, buscamos que no coindica con otra habitación del mismo hotel
		$habitaciones = Habitaciones::devolverHabitaciones($_POST["hotelId"]);
		foreach ($habitaciones as $value) {
			if ($value->getNumHabitacion() == $_POST["numHabitacion"]) {
				$habitacion = -1;
			}
		}

	} else {
		$habitacion = 0;
	}

	if ($habitacion == 0) {

		$television = "N";
		$vistas = "N";
		$aire = "N";
		$num_camas = 0;

		if (isset($_POST["television"])) {
			$television = "S";
		}

		if (isset($_POST["vistas"])) {
			$vistas = "S";
		}

		if (isset($_POST["aire"])) {
			$aire = "S";
		}

		switch ($_POST["descripcion"]) {
			case 'Individual':
					$num_camas = 1;
				break;

			case 'Doble':
					$num_camas = 2;
				break;

			case 'Familiar':
					$num_camas = 4;
				break;
		}

		// Insertamos la habitación si no se encontró ninguna con el mismo número
		$habitacion = Habitaciones::actualizarHabitacion($_POST["id"], $_POST["descripcion"], $num_camas, $_POST["numHabitacion"], $_POST["numPlanta"], $_POST["precioNoche"], $television, $vistas, $aire);
		$actualizacion = 0;

		// Si se ha introducido alguna imágen, la subimos al servidor y la insertamos en base de datos
		if (isset($_FILES["imagen"]["name"])) {

			if ($_FILES["imagen"]["name"] != "") {
				$nombre_img = $_FILES["imagen"]["name"];
				$ruta = "../../../images/".$nombre_img;
				move_uploaded_file($_FILES["imagen"]["tmp_name"], "../../../images/" . $_FILES["imagen"]["name"]);
				$actualizacion = Habitaciones::insertarImagen($_POST["id"], $ruta);
				if ($actualizacion == 1) {
					$habitacion = 1;
				}
			}

		}

	} else {

		// Si ya existe una habitación con el mismo número
		$habitacion = -1;

	}

	// Codificamos el id de la habitacion y cargamos la vista de esa habitación en concreto
	$idHabitacion = base64_encode($_POST['id']);
	header("Location: ./buscarHabitacion.php?idHabitacion=$idHabitacion&actualizacion=$habitacion");

?>
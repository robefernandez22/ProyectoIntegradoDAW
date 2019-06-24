<?php

	/* Este controlador se usará para dar de alta una habitación */

	// Importamos la clase Habitaciones
	require_once "../model/Habitaciones.php";

	/* Buscamos si hay alguna habitación con el mismo número que la habitación creada */
	$habitacion = Habitaciones::buscarHabitacionRepetida($_POST["hotelId"], $_POST["numHabitacion"]);

	// Si no se encontró ninguna habitación con el mismo número, procedemos a insertar dicha habitación
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

		// Aquí es donde insertamos la habitación
		$habitacion = Habitaciones::insertarHabitacion(null, $_POST["hotelId"], $_POST["descripcion"], $num_camas, $_POST["numHabitacion"], $_POST["numPlanta"], $_POST["precioNoche"], $television, $vistas, $aire);

	} else {

		/* Si se encontró alguna habitación con el mismo número que la habitación creada, ponemos la variable 'habitacion' a 0 
		para en la vista avisar del error */
		$habitacion = 0;

	}

	// Codificamos el id del hotel para que no se vea en la URL
	$hotelId = base64_encode($_POST['hotelId']);
	/* Redireccionamos al controlador 'verHabitaciones.php', que cargará las habitaciones 
	de un hotel en concreto */
	header("Location: ./verHabitaciones.php?idHotel=$hotelId&newRoom=$habitacion");

?>
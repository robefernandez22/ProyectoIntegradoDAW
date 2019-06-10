<?php

	require_once "../model/Habitaciones.php";

	$habitacion = Habitaciones::buscarHabitacionRepetida($_POST["hotelId"], $_POST["numHabitacion"]);

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

		$habitacion = Habitaciones::actualizarHabitacion($_POST["id"], $_POST["descripcion"], $num_camas, $_POST["numHabitacion"], $_POST["numPlanta"], $_POST["precioNoche"], $television, $vistas);

	} else {

		$habitacion = -1;

	}

	$idHabitacion = base64_encode($_POST['id']);
	header("Location: ./buscarHabitacion.php?idHabitacion=$idHabitacion&actualizacion=$habitacion");

?>
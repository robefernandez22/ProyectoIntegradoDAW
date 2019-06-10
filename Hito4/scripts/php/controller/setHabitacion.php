<?php

	require_once "../model/Habitaciones.php";

	$habitacion = Habitaciones::buscarHabitacionRepetida($_POST["hotelId"], $_POST["numHabitacion"]);

	if ($habitacion == 0) {

		$television = "N";
		$vistas = "N";
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

		$habitacion = Habitaciones::actualizarHabitacion($_POST["id"], $_POST["descripcion"], $num_camas, $_POST["numHabitacion"], $_POST["num_planta"], $_POST["precio_noche"], $television, $vistas);

	} else {

		$habitacion = -1;

	}

	$idHotel = base64_encode($_POST['hotelId']);
	header("Location: ./verHabitaciones.php?idHotel=$idHotel&actualizacion=$habitacion");

?>
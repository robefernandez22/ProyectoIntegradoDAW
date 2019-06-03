<?php

	require_once "../model/Habitaciones.php";

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

	$habitacion = Habitaciones::insertarHabitacion(null, $_POST["hotelId"], $_POST["descripcion"], $num_camas, $_POST["numHabitacion"], $_POST["numPlanta"], $_POST["precioNoche"], $television, $vistas);

	if ($habitacion == 1) {
		$hotelId = base64_encode($_POST['hotelId']);
		header("Location: ./verHabitaciones.php?idHotel=$hotelId");
	} else {
		header("Location: ./verHabitaciones.php?idHotel=$hotelId");
	}

?>
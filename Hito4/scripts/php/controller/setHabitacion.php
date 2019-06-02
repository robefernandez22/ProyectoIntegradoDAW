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

	$habitacion = Habitaciones::actualizarHabitacion($_POST["id"], $_POST["descripcion"], $num_camas, $_POST["num_habitacion"], $_POST["num_planta"], $_POST["precio_noche"], $television, $vistas);
	header("Location: ./verHabitaciones.php?id=<?=".base64_encode($_POST['hotelId'])."?>");

?>
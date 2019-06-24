<?php

	/* Este controlador se usará para dar de alta un hotel */

	// Importamos la clase Hoteles
	require_once "../model/Hoteles.php";

	$garaje = "N";
	$piscina = "N";
	$wifi = "N";
	$aire = "N";

	if (isset($_POST["garaje"])) {
		$garaje = "S";
	}

	if (isset($_POST["piscina"])) {
		$piscina = "S";
	}

	if (isset($_POST["wifi"])) {
		$wifi = "S";
	}

	if (isset($_POST["aire"])) {
		$aire = "S";
	}

	// Aquí insertamos el hotel
	$hotel = Hoteles::insertarHotel($_POST["nombre"], $_POST["descripcion"], $_POST["ciudad"], $_POST["calle"], $_POST["numero"], $_POST["
		codPostal"], $_POST["estrellas"], $garaje, $piscina, $aire, $wifi);
	/* Redireccionamos al controlador 'verHoteles.php' que cargará todos los hoteles incluido el nuevo. 
	Se pasa una variable GET llamada insercion para comunicar en la vista si el hotel se insertó correctamente */
	header("Location: ./verHoteles.php?insercion=$hotel");

?>
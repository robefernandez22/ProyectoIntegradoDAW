<?php

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

	$hotel = Hoteles::actualizarHotel($_POST["id"], $_POST["nombre"], $_POST["descripcion"], $_POST["ciudad"], $_POST["calle"], $_POST["numero"], $_POST["codPostal"], $_POST["estrellas"], $garaje, $piscina, $aire, $wifi);
	header("Location: ./verHoteles.php");

?>
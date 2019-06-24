<?php

	/* Este controlador sirve para editar hoteles. */

	require_once "../model/Hoteles.php";

	$garaje = "N";
	$piscina = "N";
	$wifi = "N";

	if (isset($_POST["garaje"])) {
		$garaje = "S";
	}

	if (isset($_POST["piscina"])) {
		$piscina = "S";
	}

	if (isset($_POST["wifi"])) {
		$wifi = "S";
	}

	try {

		// Aquí se actualiza el hotel
		$actualizacion = Hoteles::actualizarHotel($_POST["id"], $_POST["nombre"], $_POST["descripcion"], $_POST["ciudad"], $_POST["calle"], $_POST["numero"], $_POST["codPostal"], $_POST["estrellas"], $garaje, $piscina, $wifi);

		// Si se ha insertado alguna imagen, la subimos al servidor y la insertamos en la base de datos
		if (isset($_FILES["imagen"]["name"])) {

			if ($_FILES["imagen"]["name"] != "") {
				$nombre_img = $_FILES["imagen"]["name"];
				$ruta = "../../../images/".$nombre_img;
				move_uploaded_file($_FILES["imagen"]["tmp_name"], "../../../images/" . $_FILES["imagen"]["name"]);
				$actualizacion = Hoteles::insertarImagen($_POST["id"], $ruta);
			}

		}

		// Redirigimos para la vista del hotel en concreto enviando la actualización
		header("Location: buscarHotel.php?id=".base64_encode($_POST["id"])."&actualizacion=".$actualizacion);

	} catch(Exception $e) {
		// Redirigimos para la vista del hotel en concreto enviando el error
		header("Location: buscarHotel.php?id=".base64_encode($_POST["id"])."&actualizacion=".$e->getCode());
	}

?>
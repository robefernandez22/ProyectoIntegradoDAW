<?php

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

		$actualizacion = Hoteles::actualizarHotel($_POST["id"], $_POST["nombre"], $_POST["descripcion"], $_POST["ciudad"], $_POST["calle"], $_POST["numero"], $_POST["codPostal"], $_POST["estrellas"], $garaje, $piscina, $wifi);

		if (isset($_FILES["imagen"]["name"])) {

			if ($_FILES["imagen"]["name"] != "") {
				$nombre_img = $_FILES["imagen"]["name"];
				$ruta = "..\..\..\images\\".$nombre_img;
				move_uploaded_file($_FILES["imagen"]["tmp_name"], "..\..\..\images\\" . $_FILES["imagen"]["name"]);
				$actualizacion = Hoteles::insertarImagen($_POST["id"], $ruta);
			}

		}

		header("Location: buscarHotel.php?id=".base64_encode($_POST["id"])."&actualizacion=".$actualizacion);

	} catch(Exception $e) {
		header("Location: buscarHotel.php?id=".base64_encode($_POST["id"])."&actualizacion=".$e->getCode());
	}

?>
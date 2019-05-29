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

	if ($_FILES["imagen"]["name"] != "") {
		$nombre_img = $_FILES["imagen"]["name"];
		$ruta = "../../../images/".$nombre_img;
		move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
		Hoteles::insertarImagen($_POST["id"], $ruta);
	}

	$actualizacion = Hoteles::actualizarHotel($_POST["id"], $_POST["nombre"], $_POST["descripcion"], $_POST["ciudad"], $_POST["calle"], $_POST["numero"], $_POST["codPostal"], $_POST["estrellas"], $garaje, $piscina, $aire, $wifi);

	if ($actualizacion == 1) {
		$estado = "correcta";
	} else {
		$estado = "igual";
	}

	// header("Location: ./buscarHotel.php?id=".base64_encode($_POST["id"])."&actualizacion=".$estado);

?>
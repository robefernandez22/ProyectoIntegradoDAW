<?php

	require_once "../model/Hoteles.php";

	if (isset($_GET["idHotel"])) {

		$delete = Hoteles::eliminarImagen(base64_decode($_GET["idImage"]));
		header("Location:buscarHotel.php?id=".$_GET["idHotel"]."&deleteImage=".$delete);
	
	} else {

		$delete = Hoteles::eliminarImagen(base64_decode($_GET["idImage"]));
		header("Location:buscarHabitacion.php?id=".$_GET["idHabitacion"]."&deleteImage=".$delete);

	}

?>
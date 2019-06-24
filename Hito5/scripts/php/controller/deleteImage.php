<?php

	/* Este controlador sirve para eliminar imágenes. Tanto de hoteles como de habitaciones. */

	require_once "../model/Hoteles.php";
	require_once "../model/Habitaciones.php";

	if (isset($_GET["idHotel"])) {

		$delete = Hoteles::eliminarImagen(base64_decode($_GET["idImage"]));
		header("Location:buscarHotel.php?id=".$_GET["idHotel"]."&deleteImage=".$delete);
	
	} else {

		$delete = Habitaciones::eliminarImagen(base64_decode($_GET["idImage"]));
		echo $_GET["idHabitacion"];
		header("Location:buscarHabitacion.php?idHabitacion=".$_GET["idHabitacion"]."&deleteImage=".$delete);

	}

?>
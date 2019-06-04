<?php

	require_once "../model/Hoteles.php";
	echo base64_decode($_GET["idImage"]);
	$delete = Hoteles::eliminarImagen(base64_decode($_GET["idImage"]));
	header("Location:buscarHotel.php?id=".$_GET["idHotel"]."&deleteImage=".$delete);

?>
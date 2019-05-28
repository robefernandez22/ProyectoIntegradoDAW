<?php

	require_once "../model/Hoteles.php";
	Hoteles::eliminarImagen($_GET["id"]);
	header("Location:./buscarHotel.php?id=".base64_encode($_GET["hotelId"]));

?>
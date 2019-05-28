<?php

	require_once "../model/Hoteles.php";
	Hoteles::eliminarHotel($_POST["id"]);
	header("Location: ./verHoteles.php");

?>
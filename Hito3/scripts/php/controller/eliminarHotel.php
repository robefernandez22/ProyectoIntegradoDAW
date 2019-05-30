<?php

	require_once "../model/Hoteles.php";
	$actualizacion = Hoteles::eliminarHotel($_POST["id"]);
	header("Location: ./verHoteles.php?actualizacion=".$actualizacion);

?>
<?php

	require_once "../model/Valoraciones.php";
	$delValoracion = Valoraciones::eliminarValoracion($_POST["idValoracion"]);
	header("Location:cargarValoraciones.php?idHotel=".$_POST["idHotel"]."&actualizacion=".$delValoracion);

?>
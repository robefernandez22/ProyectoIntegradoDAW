<?php

	session_start();
	require_once "../model/Hoteles.php";
	$data = Hoteles::devolverHoteles();
	include "../view/vistaHoteles.php";

?>
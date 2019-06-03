<?php

	session_start();
	require_once "./scripts/php/model/Hoteles.php";
	$data = Hoteles::getAllImagenes();
	include "./scripts/php/view/vistaPrincipal.php";

?>
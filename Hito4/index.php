<?php

	session_start();
	require_once "./scripts/php/model/Hoteles.php";
	$data = Hoteles::getAllImagenes();

	$imagenes = [];
	$hoteles = [];
	foreach ($data as $key => $value) {
		$corte = explode("../", $value['img_path']);
		$imagenes[] = $corte[3];
		$hoteles[] = $value["hoteles_id"];
	}

	if (isset($_GET["reserva"])) {
		include "./scripts/php/view/vistaReserva.php";
	} else {
		include "./scripts/php/view/vistaPrincipal.php";
	}

?>
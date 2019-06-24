<?php

	session_start();

	if (isset($_GET["login"])) {

		if (isset($_SESSION["usuario"])) {

			require_once "./scripts/php/model/Usuario.php";
			$data = Usuario::buscarUsuario($_SESSION["usuario"]);
			$usuario = new Usuario($data);

			if ($usuario->getTipo() == "Administrador") {
				header("Location:./scripts/php/view/vistaAdmin.php");
			}

		} else {

			header("Location:./index.php");

		}

	}

	require_once "./scripts/php/model/Hoteles.php";
	$data = Hoteles::getAllImagenes();

	$imagenes = [];
	$hoteles = [];
	foreach ($data as $key => $value) {
		$corte = explode("../", $value['img_path']);
		$imagenes[] = $corte[3];
		$hoteles[] = $value["hoteles_id"];
	}

	$ciudades = Hoteles::getCiudades();

	include "./scripts/php/view/vistaPrincipal.php";

?>
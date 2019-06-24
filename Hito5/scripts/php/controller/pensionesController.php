<?php

	/* Este controlador se encarga de cargar las pensiones de un hotel en concreto.
	O bien modificar el precio de una pensión en concreto. */

	session_start();

	if (!isset($_SESSION["usuario"])) {
		header("Location:../../../index.php");
	} else {
		require_once "../model/Usuario.php";
		$data = Usuario::buscarUsuario($_SESSION["usuario"]);
		$usuario = new Usuario($data);

		if ($usuario->getTipo() != "Administrador") {
			header("Location:../../../index.php");
		}
	}
	
	include "../model/Hoteles.php";
	
	if (isset($_POST["idPension"])) {

		$setPension = Hoteles::setPension($_POST["idPension"], $_POST["precio"]);
		header("Location:./pensionesController.php?setPension=$setPension&idHotel=".base64_encode($_POST['idHotel']));
		
	} elseif (isset($_POST["crearPension"])) {

		$pension = Hoteles::insertarPension($_POST["descripcion"], $_POST["precio"], $_POST["idHotel"]);
		header("Location:./pensionesController.php?crearPension=$pension&idHotel=".base64_encode($_POST["idHotel"]));

	} else {

		$pensionesHotel = Hoteles::getPensiones(base64_decode($_GET["idHotel"]));
		$data = Hoteles::buscarHotel(base64_decode($_GET["idHotel"]));
		$hotel = new Hoteles($data);

	}

	include "../view/vistaPensiones.php";

?>
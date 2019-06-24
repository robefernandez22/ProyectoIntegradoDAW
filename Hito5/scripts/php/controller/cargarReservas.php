<?php

	/* En este controlador cargamos todas las reservas. Para que así el administrador pueda administrarlas.
	Después de hacer comprobaciones de seguridad y obtener todas las reservas, cargamos la vista correspondiente. */

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

	require_once "../model/Reservas.php";
	require_once "../model/Hoteles.php";

	$data = Reservas::getReservas();
	include "../view/vistaReservas.php";

?>
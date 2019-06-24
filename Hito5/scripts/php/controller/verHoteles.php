<?php

	/* Este controlador obtiene todos los hoteles y los carga en una vista. */

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

	require_once "../model/Hoteles.php";
	$data = Hoteles::devolverHoteles();
	include "../view/vistaHoteles.php";

?>
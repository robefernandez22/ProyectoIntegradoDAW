<?php

	/* Este controlador se encarga de cargar todos los usuarios */

	session_start();
	require_once "../model/Usuario.php";

	if (!isset($_SESSION["usuario"])) {
		header("Location:../../../index.php");
	} else {
		$data = Usuario::buscarUsuario($_SESSION["usuario"]);
		$usuario = new Usuario($data);

		if ($usuario->getTipo() != "Administrador") {
			header("Location:../../../index.php");
		}
	}

	$data = Usuario::devolverUsuarios();
	include "../view/vistaUsuarios.php";

?>
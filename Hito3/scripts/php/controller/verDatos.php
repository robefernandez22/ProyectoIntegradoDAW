<?php

	session_start();
	require_once "../model/Usuario.php";

	$datos = Usuario::buscarUsuario($_SESSION["correoUsuario"]);
	$usuario = new Usuario($datos);

	include "../view/vistaDatos.php";

?>
<?php

	session_start();
	require_once "../model/Usuario.php";
	$datos = Usuario::buscarUsuario(base64_decode($_GET["id"]));
	$usuario = new Usuario($datos);
	include "../view/vistaDatos.php";

?>
<?php

	session_start();
	require_once "../model/Usuario.php";
	
	if (isset($_POST["redireccion"])) {
		$password = Usuario::setPassword($_POST["correo"], $_POST["passwordActual"], $_POST["passwordNueva"]);
		header("Location:".$_POST["redireccion"]."?password=".$password."&id=".base64_encode($_POST["correo"]));
	} else {
		$datos = Usuario::buscarUsuario(base64_decode($_GET["id"]));
		$usuario = new Usuario($datos);
		include "../view/vistaPassword.php";
	}

?>
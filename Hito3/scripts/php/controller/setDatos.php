<?php

	session_start();
	require_once "../model/Usuario.php";
	$actualizacion = Usuario::actualizarUsuario($_POST["correo"], $_POST["nombre"], $_POST["apellidos"]);
	header("Location: ./setUsuario.php?id=".base64_encode($_POST["correo"])."&accion=actualizacion");
	include "./verUsuarios.php";

?>
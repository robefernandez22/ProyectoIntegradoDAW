<?php

	session_start();
	require_once "../model/Usuario.php";
	$actualizacion = Usuario::actualizarUsuario($_SESSION["correoUsuario"], $_POST["correo"], $_POST["nombre"], $_POST["apellidos"]);
	echo $actualizacion;

?>
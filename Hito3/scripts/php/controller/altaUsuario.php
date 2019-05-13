<?php

	require_once "../model/Usuario.php";

	$usuario = new Usuario($_POST["nombre"], $_POST["apellidos"],
	$_POST["correo"], md5($_POST["password"]), $_POST["tipo"]);
	
	$usuario->insertarUsuario();

	// header("Location: ../../../index.php");

?>
<?php

	session_start();
	
	require_once "../model/Usuario.php";
	require_once "../model/Reservas.php";

	// Buscamos el usuario y creamos un objeto con la fila que nos devuelve
	$datos = Usuario::buscarUsuario($_SESSION["usuario"]);
	$usuario = new Usuario($datos);

	// Buscamos todas las reservas del usuario en cuestión
	$datos = Reservas::getReservasUsuario($_SESSION["usuario"]);

	include "../view/vistaDatos.php";

?>
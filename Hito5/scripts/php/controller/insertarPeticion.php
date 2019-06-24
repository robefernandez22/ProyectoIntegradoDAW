<?php

	/* Este controlador permite enviar una petición desde el formulario de contacto en la parte de usuario. */

	session_start();
	require_once "../model/Peticiones.php";

	$peticionInsertada = Peticiones::insertarPeticion($_POST["nombre"], $_POST["apellidos"], $_POST["inputEmail"], $_POST["telefono"], $_POST["asunto"]);
	header("Location:../../../index.php?peticion=$peticionInsertada");

?>
<?php

	require_once "../model/Usuario.php";
	Usuario::eliminarUsuario($_POST["correo"]);

	if ($_POST["correo"] == $_SESSION["correoUsuario"]) {
		header("Location: ./cerrarSesion.php");
	} else {
		header("Location: ./verUsuarios.php");
	}

?>
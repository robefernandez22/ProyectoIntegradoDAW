<?php

	session_start();
	require_once "../model/Usuario.php";

	if (isset($_POST["redireccion"])) {
		// Actualización para usuarios normales
		$actualizacion = Usuario::actualizacionUsuario($_POST["correo"], $_POST["nombre"], $_POST["apellidos"]);
		header("Location: ./setUsuario.php?id=".base64_encode($_POST["correo"])."&actualizacion=".$actualizacion);
	} else {
		// Actualizaciones echas por los administradores
		$actualizacion = Usuario::actualizarUsuario($_POST["correo"], $_POST["nombre"], $_POST["apellidos"], $_POST["tipo"]);
		header("Location: ./verUsuarios.php?actualizacion=".$actualizacion);
	}

?>
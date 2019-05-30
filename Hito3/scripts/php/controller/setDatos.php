<?php

	session_start();
	require_once "../model/Usuario.php";
	$actualizacion = Usuario::actualizarUsuario($_POST["correo"], $_POST["nombre"], $_POST["apellidos"], $_POST["tipo"]);

	if (isset($_POST["redireccion"])) {
		header("Location: ./setUsuario.php?id=".base64_encode($_POST["correo"])."&actualizacion=".$actualizacion);
	} else {
		header("Location: ./verUsuarios.php?actualizacion=".$actualizacion);
	}

?>
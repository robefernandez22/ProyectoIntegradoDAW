<?php

	session_start();
	require_once "../model/Usuario.php";

	$fila = Usuario::buscarUsuario($_POST["correo"]);
	if ($fila == 0) {

		echo "Usuario no registrado.";

	} else {

		$fila = Usuario::verificarUsuario($_POST["correo"], md5($_POST["password"]));
		if ($fila == 0) {

			echo "Contraseña incorrecta.";

		} else {

			$usuario = new Usuario($fila);
			$_SESSION["nombreUsuario"] = $usuario->getNombre();
			$_SESSION["correoUsuario"] = $_POST["correo"];

			if ($usuario->getTipo() == "U") {

				header("Location: ../../../index.php");

			} else {

				header("Location: ../view/vistaAdmin.php");

			}

		}

	}

?>
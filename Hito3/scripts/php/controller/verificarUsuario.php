<?php

	session_start();
	require_once "../model/Usuario.php";

	$fila = 0;
	$correo = "";

	if (isset($_SESSION["correo"])) {
		$fila = Usuario::buscarUsuario($_SESSION["correo"]);
		$correo = $_SESSION["correo"];
	} else {
		$fila = Usuario::buscarUsuario($_POST["correo"]);
		$correo = $_POST["correo"];
	}

	if ($fila == 0) {

		echo "Usuario no registrado.";

	} else {

		if (isset($_SESSION["password"])) {
			$fila = Usuario::verificarUsuario($correo, base64_encode($_SESSION["password"]));			
		} else {
			$fila = Usuario::verificarUsuario($correo, base64_encode($_POST["password"]));
		}

		unset($_SESSION["password"]);
		unset($_SESSION["correo"]);

		if ($fila == 0) {

			echo "Contraseña incorrecta.";

		} else {

			$usuario = new Usuario($fila);
			$_SESSION["nombreUsuario"] = $usuario->getNombre();
			$_SESSION["correoUsuario"] = $correo;

			if ($usuario->getTipo() == "Usuario") {

				if (isset($_POST["pagina"])) {
					header("Location: " . $_POST["pagina"]);
				} else {
					header("Location: ../../../index.php");
				}

			} else {

				header("Location: ../view/vistaAdmin.php");

			}

		}

	}

?>
<?php

	/* Este controlador se encarga de verificar un usuario cuando este inicia sesión. */

	session_start();
	require_once "../model/Usuario.php";

	if (isset($_POST["correo"])) {
		$correo = $_POST["correo"];
		$password = $_POST["password"];
	} else {
		$correo = $_SESSION["correo"];
		$password = $_SESSION["password"];
	}

	$fila = Usuario::buscarUsuario($correo);

	if ($fila == 0) {

		if (isset($_GET["pagina"])) {
			header("Location:../view/formularioInicio.php?not_found&procesoReserva");
		} elseif (isset($_POST["pagina"])) {
			header("Location:../view/formularioInicio.php?not_found&procesoReserva");
		} else {
			header("Location:../view/formularioInicio.php?not_found");
		}


	} else {

		$fila = Usuario::verificarUsuario($correo, base64_encode($password));
		unset($_SESSION["correo"]);
		unset($_SESSION["password"]);

		if ($fila == 0) {

		if (isset($_GET["pagina"])) {
			header("Location:../view/formularioInicio.php?password&procesoReserva");
		} elseif (isset($_POST["pagina"])) {
			header("Location:../view/formularioInicio.php?password&procesoReserva");
		} else {
			header("Location:../view/formularioInicio.php?password");
		}

		} else {

			$usuario = new Usuario($fila);
			$_SESSION["usuario"] = $usuario->getCorreo();
			$_SESSION["tipo"] = $usuario->getTipo();

			if ($usuario->getTipo() == "Usuario") {

				if (isset($_POST["pagina"])) {
					header("Location:".$_POST["pagina"]."?login");
				} elseif (isset($_GET["pagina"])) {
					header("Location:".$_GET["pagina"]."?login");
				} else {
					header("Location: ../../../index.php?login");
				}

			} else {
				header("Location: ../view/vistaAdmin.php?login");
			}
		}
	}

?>
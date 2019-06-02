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

		header("Location:../../../index.php?not_found");

	} else {

		if (isset($_SESSION["password"])) {
			$fila = Usuario::verificarUsuario($correo, base64_encode($_SESSION["password"]));			
		} else {
			$fila = Usuario::verificarUsuario($correo, base64_encode($_POST["password"]));
		}

		unset($_SESSION["password"]);
		unset($_SESSION["correo"]);

		if ($fila == 0) {

			header("Location:../../../index.php?password");

		} else {

			$usuario = new Usuario($fila);
			$_SESSION["nombreUsuario"] = $usuario->getNombre();
			$_SESSION["correoUsuario"] = $correo;
			$_SESSION["tipoUsuario"] = $usuario->getTipo();

			if ($usuario->getTipo() == "Usuario") {

				if (isset($_POST["pagina"])) {
					header("Location: " . $_POST["pagina"]."?login");
				} else {
					header("Location: ../../../index.php?login");
				}

			} else {
				header("Location: ../view/vistaAdmin.php?login");
			}
		}
	}

?>
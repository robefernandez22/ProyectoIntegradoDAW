<?php

	session_start();
	require_once "../model/Usuario.php";

	$fila = Usuario::buscarUsuario($_POST["correo"]);

	if ($fila == 0) {

		header("Location:../../../index.php?not_found");

	} else {

		$fila = Usuario::verificarUsuario($_POST["correo"], base64_encode($_POST["password"]));

		if ($fila == 0) {

			header("Location:../../../index.php?password");

		} else {

			$usuario = new Usuario($fila);
			$_SESSION["usuario"] = $usuario->getCorreo();
			$_SESSION["tipo"] = $usuario->getTipo();

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
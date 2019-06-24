<?php

	/* Este controlador sirve para modificar la contraseña de los usuarios */

	session_start();

	if (!isset($_SESSION["usuario"])) {
		header("Location:../../../index.php");
	}

	require_once "../model/Usuario.php";
	
	if (isset($_POST["redireccion"])) {

		$password = Usuario::setPassword($_POST["correo"], $_POST["passwordActual"], $_POST["passwordNueva"]);

		if ($password == 1) {

			if (isset($_POST["verUsuarios"])) {
				$correo = base64_encode($_POST["correo"]);
				header("Location:./verUsuarios.php?password=$password&id=$correo");
			} else {
				header("Location:./cerrarSesion.php?password=$password");
			}

		} else {
			header("Location:./".$_POST["redireccion"]."&password=$password");
		}

	} else {

		// Usuario del que se va a modificar la contraseña
		$datos = Usuario::buscarUsuario(base64_decode($_GET["id"]));
		$usuario = new Usuario($datos);
		/*********************************************************/

		// Usuario que se va a comprobar para evitar conflictos de URL's
		$datos = Usuario::buscarUsuario($_SESSION["usuario"]);
		$user = new Usuario($datos);

		if (isset($_GET["admin"])) {
			if ($user->getTipo() != "Administrador") {
				header("Location:../../../index.php");
			} else {
				include "../view/vistaPasswordAdmin.php";
			}
		} else {
			if ($user->getTipo() == "Administrador") {
				header("Location:../view/vistaAdmin.php");
			} else {
				include "../view/vistaPasswordUsuario.php";
			}
		}

	}

?>
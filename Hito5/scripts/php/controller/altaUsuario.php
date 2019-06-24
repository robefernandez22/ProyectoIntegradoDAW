<?php

	/* En este controlador se darán de alta a usuarios */

	// Iniciamos sesión e importamos la clase 'Usuario'
	session_start();
	require_once "../model/Usuario.php";

	if (isset($_POST["inputEmail"])) {

		$correo = $_POST["inputEmail"];
		$password = $_POST["inputPassword"];

	} else {

		$correo = $_POST["correo"];
		$password = $_POST["password"];
		
	}

	// Buscamos si el usuario ya existe
	$fila = Usuario::buscarUsuario($correo);
	$usuario = 0;

	// Si el usuario no existe, lo insertamos, de lo contrario, redireccionamos donde sea necesario
	if ($fila[0] == null) {

		// Aquí insertamos el usuario
		$usuario = Usuario::insertarUsuario($correo, $_POST["nombre"], $_POST["apellidos"], base64_encode($password), $_POST["tipo"]);

		if (isset($_POST["pagina"])) {

			header("Location: ".$_POST["pagina"]."?aniadir=".$usuario);

		} else {

			$_SESSION["correo"] = $correo;
			$_SESSION["password"] = $password;

			if (isset($_POST["reserva"])) {

				header("Location: ./verificarUsuario.php?pagina=".$_POST["reserva"]);

			} else {

				header("Location: ./verificarUsuario.php");

			}

		}
		

	} else {

		if (isset($_POST["pagina"])) {

			header("Location:".$_POST["pagina"]."?exist");

		} elseif (isset($_POST["inputEmail"])) {

			if (isset($_POST["reserva"])) {

				header("Location:../view/formularioRegistro.php?userExist&procesoReserva");

			} else {

				header("Location:../view/formularioRegistro.php?userExist");

			}

		}

	}

?>
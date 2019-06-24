<?php

	/* Este controlador sirve para actualizar los datos de usuarios. */

	session_start();
	require_once "../model/Usuario.php";

	if (isset($_POST["redireccion"])) {
		// Actualización para usuarios normales
		$actualizacion = Usuario::actualizacionUsuario($_POST["correo"], $_POST["nombre"], $_POST["apellidos"]);
		header("Location: ./setUsuario.php?id=".base64_encode($_POST["correo"])."&actualizacion=".$actualizacion);
	} else {
		// Actualizaciones echas por los administradores
		$actualizacion = Usuario::actualizarUsuario($_POST["correo"], $_POST["nombre"], $_POST["apellidos"], $_POST["tipo"]);

		/* Si la variable de sesion usuario es igual al correo del usuario que modifica sus datos,
		evaluamos si el tipo de usuario ha cambiado, para así hacerle iniciar sesión de nuevo */
		if ($_SESSION["usuario"] == $_POST["correo"]) {

			if ($_POST["tipo"] == "A") {
				$tipo = "Administrador";
			} else {
				$tipo = "Usuario";
			}

			if ($_SESSION["tipo"] != $tipo) {
				header("Location:./cerrarSesion.php?tipo");
			} else {
				header("Location: ./verUsuarios.php?actualizacion=".$actualizacion);
			}

		} else {
			header("Location: ./verUsuarios.php?actualizacion=".$actualizacion);
		}

	}

?>
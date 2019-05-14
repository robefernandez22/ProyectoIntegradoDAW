<?php

	require_once "../model/Usuario.php";

	$fila = Usuario::buscarUsuario($_POST["correo"]);

	if ($fila == 0) {

		$usuario = Usuario::insertarUsuario($_POST["correo"], $_POST["nombre"], $_POST["apellidos"], md5($_POST["password"]), $_POST["tipo"]);
		if ($usuario == 1) {

			echo "Usuario insertado correctamente.";

		} else {

			echo "Ha ocurrido algún error.";

		}

	} else {

		echo "El usuario ya existe, no se puede registrar.";

	}

?>
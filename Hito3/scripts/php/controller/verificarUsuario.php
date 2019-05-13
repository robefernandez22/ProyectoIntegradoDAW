<?php

	require_once "../model/Usuario.php";

	$verificacion = Usuario::verificarUsuario($_POST["correo"], md5($_POST["password"]));

	if ($verificacion != null) {

		$tipo = Usuario::obtenerTipo($_POST["correo"]);

		if ($tipo == "U") {
			include "../view/vistaUsuario.html";
		} else {
			include "../view/vistaAdmin.html";
		}

	} else {

		echo "EL USUARIO NO EXISTE";

	}

?>
<?php

	/* Con este controlador comprobamos si el usuario está logeado. Si es así, obtenemos sus datos
	y por último cargamos la vista de Contacto con sus datos para que así no los tenga que rellenar él. */

	session_start();
	include "../model/Usuario.php";

	if (isset($_SESSION["usuario"])) {
		$data = Usuario::buscarUsuario($_SESSION["usuario"]);
		$usuario = new Usuario($data);
		$nombre = $usuario->getNombre();
		$apellidos = $usuario->getApellidos();
		$correo = $usuario->getCorreo();
	}

	include "../view/vistaContacto.php";

?>
<?php

	/* Este controlador sirve para cargar todas las valoraciones. Primero hacemos comprobaciones de seguridad.
	Luego cargamos las valoraciones y redirigimos para la vista correspondiente. */

	session_start();

	require_once "../model/Hoteles.php";
	require_once "../model/Valoraciones.php";
	require_once "../model/Usuario.php";

	if (isset($_GET["idHotel"])) {

		if (!isset($_SESSION["usuario"])) {
			header("Location:../../../index.php");
		} else {
			$data = Usuario::buscarUsuario($_SESSION["usuario"]);
			$usuario = new Usuario($data);

			if ($usuario->getTipo() != "Administrador") {
				header("Location:../../../index.php");
			}
		}

		$data = Hoteles::buscarHotel(base64_decode($_GET["idHotel"]));
		$hotel = new Hoteles($data);
		$data = Valoraciones::getValoraciones(base64_decode($_GET["idHotel"]));

		include "../view/vistaValoraciones.php";

	} else {

		$data = Valoraciones::getValoraciones(0);
		$hoteles = Hoteles::devolverHoteles();
		include "../view/vistaOpiniones.php";

	}

?>
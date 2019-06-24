<?php

	/* Este controlador permite eliminar un usuario en concreto filtrando por el id (correo) de este.
	Si este usuario tiene reservas asociadas, no le dejaremos eliminarlo. */

	session_start();
	require_once "../model/Usuario.php";

	$fechaActual = date("20"."y-m-d");

	$reservas = Usuario::obtenerReservas($_POST["correo"], $fechaActual);

	if (sizeof($reservas) == 0) {
		
		$eliminacion = Usuario::eliminarUsuario($_POST["correo"]);

		if ($_POST["correo"] == $_SESSION["usuario"]) {
			header("Location: ./cerrarSesion.php?eliminacion=".$eliminacion);
		} else {
			header("Location: ./verUsuarios.php?eliminacion=".$eliminacion);
		}

	} else {

		$eliminacion = 0;
		header("Location: ./verUsuarios.php?eliminacion=".$eliminacion);

	}

?>
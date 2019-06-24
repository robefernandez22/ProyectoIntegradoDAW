<?php

	/* Este controlador nos permite eliminar una reserva filtrando por el ID de esta.
	Si existe la variable $_POST["usuario"] significa que fue un usuario el que canceló una reserva.
	De lo contrario, fue un administrador desde el panel de administración el que eliminó una reserva. */

	session_start();
	require_once "../model/Reservas.php";
	$eliminacion = Reservas::cancelarReserva($_POST["idReserva"]);
	
	if (isset($_POST["usuario"])) {
		header("Location: ./setUsuario.php?id=".base64_encode($_SESSION["usuario"])."&eliminacion=".$eliminacion);
	} else {
		header("Location: ./cargarReservas.php?eliminacion=".$eliminacion);
	}

?>
<?php

	/* Este controlador permite insertar una valoración desde la parte de usuario a la hora de valorar una reserva en concreto. */

	session_start();
	include "../model/Valoraciones.php";

	$fechaActual = date("20"."y-m-d");
	$valoracionInsertada = Valoraciones::insertarValoracion($_POST["descripcion"], $_POST["puntuacion"], $fechaActual, $_POST["idHotel"], $_SESSION["usuario"], $_POST["idReserva"]);

	header("Location:./setUsuario.php?id=".base64_encode($_SESSION["usuario"])."&valoracion=$valoracionInsertada");

?>
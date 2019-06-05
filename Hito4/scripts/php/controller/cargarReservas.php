<?php

	session_start();
	require_once "../model/Reservas.php";
	require_once "../model/Hoteles.php";

	$hoteles = Hoteles::devolverHoteles();

	if (isset($_POST["filtro"])) {

		if ($_POST["filtro"] == "usuario") {

			$data = Reservas::getReservasUsuario($_POST["correo"]);

		} elseif ($_POST["filtro"] == "hotel") {

			$data = Reservas::getReservasHotel($_POST["hoteles"]);
			
		} elseif ($_POST["filtro"] == "fecha_reserva") {

			$data = Reservas::getReservasFechaReserva($_POST["orden"]);
			
		} elseif ($_POST["filtro"] == "fecha_entrada") {

			$data = Reservas::getReservasFechaEntrada($_POST["orden"]);
			
		} elseif ($_POST["filtro"] == "fecha_salida") {

			$data = Reservas::getReservasFechaSalida($_POST["orden"]);
			
		}

	} else {

		$data = Reservas::getReservas();
	
	}

	include "../view/vistaReservas.php";

?>
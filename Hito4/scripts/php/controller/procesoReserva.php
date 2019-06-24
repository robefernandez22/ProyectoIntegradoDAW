<?php

	session_start();
	require_once "../model/Hoteles.php";
	require_once "../model/Habitaciones.php";
	require_once "../model/Reservas.php";

	if (isset($_POST["buscar"])) {
	
		if ($_POST["numPersonas"] == 1) {
			$descripcion = "Individual";
		} elseif ($_POST["numPersonas"] == 2) {
			$descripcion = "Doble";
		} else {
			$descripcion = "Familiar";
		}

		$habitaciones = Hoteles::getHotelesParametros($_POST["fechaEntrada"], $_POST["fechaSalida"], $descripcion, $_POST["ciudad"]);

	} elseif (isset($_POST["hotelId"])) {

		$pensiones = Hoteles::getPensiones($_POST["hotelId"]);

	} elseif (isset($_POST["precioPension"])) {

		$dia1 = new DateTime($_POST["fechaEntrada"]);
		$dia2 = new DateTime($_POST["fechaSalida"]);

		$diff = $dia1->diff($dia2);
		$numNoches = $diff->days;

		$precioPension = $_POST["precioPension"];
		$tipoPension = $_POST["tipoPension"];

		$precioNoche = $_POST["precioNoche"];
		$numPersonas = $_POST["numPersonas"];
		$total = ($precioNoche * $numNoches) + ($precioPension * $numPersonas);

		$data = Hoteles::buscarHotel($_POST["idHotel"]);
		$hotel = new Hoteles($data);

	} elseif (isset($_POST["confirmacion"])) {

		// Sacamos la fecha actual; que será la fecha en la que el cliente ha hecho la reserva
		$fechaReserva = date("y/m/d");

		if (!isset($_SESSION["usuario"])) {

			header("Location:../../../index.php");

		} else {

			// Insertamos todo lo necesario en la tabla 'Reserva'
			$realizarReserva = Reservas::realizarReserva($fechaReserva, $_POST["fechaEntrada"], $_POST["fechaSalida"], $_POST["numPersonas"], $_SESSION["usuario"], $_POST["idPension"]);
			// Capturamos el ID de la reserva que acabamos de insertar en la tabla 'Reservas' y por último insertamos en la tabla 'Reservas_Habitaciones'
			$idReserva = Reservas::getReservaUsuarioFechaEntrada($_SESSION["usuario"], $_POST["fechaEntrada"]);
			// Y por último insertamos en la tabla 'Reservas_Habitaciones' con el ID de la reserva capturado anteriormente y el ID de la habitación
			$insertarReserva = Reservas::insertarReserva($idReserva, $_POST["idHabitacion"]);

			// Sacamos el ID del usuario de la sesión y lo codificamos en base 64
			$usuario = base64_encode($_SESSION["usuario"]);
			/* Redireccionamos al perfil del usuario, donde este podrá ver sus datos y reserva(s) 
			y con la variable de la inserción de la reserva para avisar al usuario de que la reserva se hizo correctamente */
			header("Location:./setUsuario.php?id=$usuario&reserva=$insertarReserva");

		}

	}

	include "../view/vistaRealizarReserva.php";

?>
<?php

	/* Este controlador se encarga de todo el proceso de reserva */

	// Iniciamos sesión y cargamos todas las clases necesarias
	session_start();
	require_once "../model/Hoteles.php";
	require_once "../model/Habitaciones.php";
	require_once "../model/Reservas.php";

	// Aquí el usuario buscó un hotel entre dos fechas, para un número de personas y en un destino
	if (isset($_POST["buscar"])) {

		$fechaActual = date("20"."y-m-d");

		if ($_POST["fechaEntrada"] < $fechaActual) {
			header("Location:../../../index.php?entradaMenorActual");
		} elseif ($_POST["fechaSalida"] < $fechaActual) {
			header("Location:../../../index.php?salidaMenorActual");
		} elseif ($_POST["fechaEntrada"] > $_POST["fechaSalida"]) {
			header("Location:../../../index.php?entradaMayorSalida");
		}
	
		if ($_POST["numPersonas"] == 1) {
			$descripcion = "Individual";
		} elseif ($_POST["numPersonas"] == 2) {
			$descripcion = "Doble";
		} else {
			$descripcion = "Familiar";
		}

		$hoteles = Hoteles::getHotelesParametros($_POST["fechaEntrada"], $_POST["fechaSalida"], $descripcion, $_POST["ciudad"]);

		$url = "testimonials";

		if ($hoteles == null) {
			$cabeceraPrincipal = "Lo sentimos";
			$mensajeCabecera = "En este momento no quedan hoteles libres con las características indicadas.";

			$cabeceraSecundaria = "";
			$mensaje = "Lamentamos decirle que en este momento no quedan hoteles libres con las características y fechas que usted ha elegido.";
		} else {
			$cabeceraPrincipal = "¡Elige tu hotel!";
			$cabeceraSecundaria = "";
			$mensajeCabecera = "";
			$mensaje = "Estos son los hoteles que tenemos para ti. Elige el hotel que quieras de todos las que tenemos disponibles en este momento con las características que tú has elegido.";
		}

	// Aquí el usuario ya eligió el hotel de todos los disponibles con las características insertadas
	} elseif (isset($_POST["hotelIdentificador"])) {
		
		$habitaciones = Habitaciones::getHabitacionesParametros($_POST["fechaEntrada"], $_POST["fechaSalida"], $_POST["descripcion"], $_POST["hotelIdentificador"]);
		$url = "hero_3";
		$datos = Hoteles::buscarHotel($_POST["hotelIdentificador"]);
		$hotel = new Hoteles($datos);

		$cabeceraPrincipal = "¡Elige tu habitación!";
		$cabeceraSecundaria = $hotel->getNombre();
		$mensajeCabecera = "";
		$mensaje = "Estas son las habitaciones que tenemos para ti. Elige la habitación que quieras de todas las que tenemos disponibles en este momento con las características que tú has elegido.";

	// Aquí el usuario ya eligió la habitación y le ofrecemos el tipo de pensión en concreto
	} elseif (isset($_POST["hotelId"])) {

		$pensiones = Hoteles::getPensiones($_POST["hotelId"]);
		$url = "food";
		$cabeceraPrincipal = "¡Elige tu pensión!";
		$cabeceraSecundaria = "Estas son las pensiones que podemos ofrecerte";
		$mensaje = "Elige la pensión que quieras de todas las que tenemos disponibles.";
		$mensajeCabecera = "";

	// Aquí el usuario ya eligió el tipo de pensión y procedemos a que confirme la reserva
	} elseif (isset($_POST["precioPension"]) || isset($_GET["login"])) {

		// Comprobación de seguridad
		if (isset($_GET["login"])) {
			if (!isset($_SESSION["usuario"])) {
				header("Location:../../../index.php");
			} else {
				require_once "../model/Usuario.php";
				$data = Usuario::buscarUsuario($_SESSION["usuario"]);
				$usuario = new Usuario($data);
				if ($usuario->getTipo() == "Administrador") {
					header("Location:../view/vistaAdmin.php");
				}
			}
		}

		// Si el usuario se ha logeado antes de confirmar la reserva, recuperamos los datos de su reserva
		if (isset($_GET["login"])) {
			
			$fechaEntrada = $_SESSION["datos"]["fechaEntrada"];
			$fechaSalida = $_SESSION["datos"]["fechaSalida"];
			$precioPension = $_SESSION["datos"]["precioPension"];
			$tipoPension = $_SESSION["datos"]["tipoPension"];
			$precioNoche = $_SESSION["datos"]["precioNoche"];
			$numPersonas = $_SESSION["datos"]["numPersonas"];
			$descripcionHab = $_SESSION["datos"]["descripcionHab"];
			$idPension = $_SESSION["datos"]["idPension"];
			$idHabitacion = $_SESSION["datos"]["idHabitacion"];
			$hotel = new Hoteles($_SESSION["datos"]["data"]);
			unset($_SESSION["datos"]);

		// Definimos todos los datos de la reserva y los guardamos en variables de sesión, por si el ususario se tiene que logear
		// o bien registrar, no pierde los datos de su reserva y luego la puede confirmar directamente
		} else {

			$fechaEntrada = $_POST["fechaEntrada"];
			$fechaSalida = $_POST["fechaSalida"];
			$precioPension = $_POST["precioPension"];
			$tipoPension = $_POST["tipoPension"];
			$precioNoche = $_POST["precioNoche"];
			$numPersonas = $_POST["numPersonas"];
			$descripcionHab = $_POST["descripcionHab"];
			$idPension = $_POST["idPension"];
			$idHabitacion = $_POST["idHabitacion"];

			$data = Hoteles::buscarHotel($_POST["idHotel"]);
			$hotel = new Hoteles($data);

			$_SESSION["datos"] = array();
			$_SESSION["datos"]["fechaEntrada"] = $fechaEntrada;
			$_SESSION["datos"]["fechaSalida"] = $fechaSalida;
			$_SESSION["datos"]["precioPension"] = $precioPension;
			$_SESSION["datos"]["precioNoche"] = $precioNoche;
			$_SESSION["datos"]["tipoPension"] = $tipoPension;
			$_SESSION["datos"]["numPersonas"] = $numPersonas;
			$_SESSION["datos"]["descripcionHab"] = $descripcionHab;
			$_SESSION["datos"]["idPension"] = $idPension;
			$_SESSION["datos"]["idHabitacion"] = $idHabitacion;
			$_SESSION["datos"]["data"] = $data;

		}

		$dia1 = new DateTime($fechaEntrada);
		$dia2 = new DateTime($fechaSalida);
		$diff = $dia1->diff($dia2);
		$numNoches = $diff->days;

		$total = ($precioNoche * $numNoches) + ($precioPension * $numPersonas);

		$url = "slider-6";
		$cabeceraPrincipal = "¡Confirma tu reserva!";
		$cabeceraSecundaria = "Confirma tu reserva en " . $hotel->getNombre();
		$mensaje = "Si estás de acuerdo con todo, no lo dudes; confirma tu reserva.";
		$mensajeCabecera = "";

	// El usuario confirmó la reserva
	} elseif (isset($_POST["confirmacion"])) {

		// Sacamos la fecha actual; que será la fecha en la que el cliente ha hecho la reserva
		$fechaReserva = date("y/m/d");

		// Si no ha iniciado sesión, lo mandamos a logearse
		if (!isset($_SESSION["usuario"])) {

			header("Location:../view/formularioInicio.php?procesoReserva");

		} else {

			// Insertamos todo lo necesario en la tabla 'Reserva'
			$realizarReserva = Reservas::realizarReserva($fechaReserva, $_POST["fechaEntrada"], $_POST["fechaSalida"], $_POST["numPersonas"], $_SESSION["usuario"], $_POST["idPension"]);
			// Capturamos el ID de la reserva que acabamos de insertar en la tabla 'Reservas' y por último insertamos en la tabla 'Reservas_Habitaciones'
			$idReserva = Reservas::getIdUltimaReserva();
			// Y por último insertamos en la tabla 'Reservas_Habitaciones' con el ID de la reserva capturado anteriormente y el ID de la habitación
			$insertarReserva = Reservas::insertarReserva($idReserva[0], $_POST["idHabitacion"]);

			// Sacamos el ID del usuario de la sesión y lo codificamos en base 64
			$usuario = base64_encode($_SESSION["usuario"]);

			if (isset($_SESSION["datos"])) {
				unset($_SESSION["datos"]);
			}

			/* Redireccionamos al perfil del usuario, donde este podrá ver sus datos y reserva(s) 
			y con la variable de la inserción de la reserva para avisar al usuario de que la reserva se hizo correctamente */
			header("Location:./setUsuario.php?id=$usuario&reserva=$insertarReserva");

		}

	} else {
		
		// Comprobaciones de seguridad
		if (isset($_SESSION["usuario"])) {
			require_once "../model/Usuario.php";
			$data = Usuario::buscarUsuario($_SESSION["usuario"]);
			$usuario = new Usuario($data);

			if ($usuario->getTipo() == "Administrador") {
				header("Location:../view/vistaAdmin.php");
			} else {
				header("Location:../../../index.php");
			}
		} else {
			header("Location:../../../index.php");
		}

	}

	// Incluimos la vista de realizacion de reservas
	include "../view/vistaRealizarReserva.php";

?>
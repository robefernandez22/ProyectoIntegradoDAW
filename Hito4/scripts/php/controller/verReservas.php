<?php

	require_once "../model/Reservas.php";
	$data = Reservas::devolverReservas();
	include "../view/vistaReservas.php";

?>
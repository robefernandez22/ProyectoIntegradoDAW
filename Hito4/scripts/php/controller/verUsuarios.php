<?php

	session_start();
	require_once "../model/Usuario.php";
	$data = Usuario::devolverUsuarios();
	include "../view/vistaUsuarios.php";

?>
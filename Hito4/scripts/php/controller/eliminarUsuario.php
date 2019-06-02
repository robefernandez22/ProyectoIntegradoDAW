<?php

	require_once "../model/Usuario.php";
	$eliminacion = Usuario::eliminarUsuario($_POST["correo"]);
	header("Location: ./verUsuarios.php?eliminacion=".$eliminacion);

?>
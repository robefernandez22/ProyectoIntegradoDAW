<?php

	require_once "../model/Usuario.php";
	Usuario::eliminarUsuario($_POST["correo"]);
	header("Location: ./verUsuarios.php");

?>
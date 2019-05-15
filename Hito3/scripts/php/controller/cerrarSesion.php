<?php

	session_start();
	unset($_SESSION["nombreUsuario"]);
	unset($_SESSION["correoUsuario"]);
	session_destroy();
	header("Location: ../../../index.php");

?>
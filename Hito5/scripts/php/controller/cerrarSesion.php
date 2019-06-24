<?php

	/* Con este controlador podremos cerrar la sesión del usuario. */

	session_start();
	unset($_SESSION["usuario"]);
	session_destroy();

	if (isset($_GET["password"])) {
		header("Location: ../../../index.php?password=".$_GET["password"]);
	} elseif (isset($_GET["tipo"])) {
		header("Location: ../../../index.php?tipo");
	} elseif (isset($_GET["eliminacion"])) {
		header("Location:../../../index.php?eliminacion=".$_GET["eliminacion"]);
	} else {
		header("Location: ../../../index.php");
	}

?>
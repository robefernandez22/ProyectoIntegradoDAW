<?php

	session_start();
	unset($_SESSION["usuario"]);
	session_destroy();

	if (isset($_GET["password"])) {
		header("Location: ../../../index.php?password=".$_GET["password"]);
	} else {
		header("Location: ../../../index.php");
	}

?>
<?php

	session_start();
	unset($_SESSION["usuario"]);
	session_destroy();

	if (isset($_GET["password"])) {
		header("Location: ../../../index.php?password=".$_GET["password"]);
	} elseif (isset($_GET["tipo"])) {
		header("Location: ../../../index.php?tipo");
	} else {
		header("Location: ../../../index.php");
	}

?>
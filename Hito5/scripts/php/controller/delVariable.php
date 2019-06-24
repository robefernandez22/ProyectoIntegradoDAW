<?php

	/* Este controlador sirve para eliminar una variable en concreto y luego redirigir a un controlador en concreto. */

	unset($_GET["variable"]);
	header("Location:".$_GET["controlador"]);

?>
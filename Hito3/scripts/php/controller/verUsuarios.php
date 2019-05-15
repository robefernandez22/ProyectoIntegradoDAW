<?php

	require_once "Usuario.php";
	$data = Usuario::devolverUsuarios();

	foreach ($data as $value) {
		echo "<br>".$value->getNombre();
	}

?>
<?php

	require_once "../model/Usuario.php";
	$data = Usuario::devolverUsuarios();

	foreach ($data as $value) {
		echo "<br>".$value->getNombre();
	}

?>
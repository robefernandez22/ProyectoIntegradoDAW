<?php

	session_start();
	require_once "../model/Usuario.php";
	$fila = Usuario::buscarUsuario($_POST["correo"]);
	echo $_POST["tipo"];

	if ($fila == null) {

		$usuario = Usuario::insertarUsuario($_POST["correo"], $_POST["nombre"], $_POST["apellidos"], base64_encode($_POST["password"]), $_POST["tipo"]);
		if ($usuario == 1) {
			if (isset($_POST["pagina"])) {
				header("Location: ".$_POST["pagina"]."?aniadir=".$usuario);
			} else {
				$_SESSION["correo"] = $_POST["correo"];
				$_SESSION["password"] = $_POST["password"];
				header("Location: ./verificarUsuario.php");
			}
		} else {
			echo "Ha ocurrido algún error.";
		}

	} else {
		echo "El usuario ya existe, no se puede registrar.";
	}

?>
<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset="utf-8">
		<title>Tus datos</title>
	</head>

	<body>

		<?php

			echo $usuario->getNombre();
			echo "<br>".$usuario->getApellidos();
			echo "<br>".$usuario->getCorreo();
			if ($usuario->getTipo() == "A") {
				echo "<br>".$usuario->getTipo();
			}

		?>

		<form>
			<input type="text" value="<?php echo $usuario->getPassword();?>">
		</form>

	</body>

</html>
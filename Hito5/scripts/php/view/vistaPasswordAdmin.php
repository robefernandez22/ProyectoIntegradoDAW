<!DOCTYPE html>
<html lang="es">

	<head>
		<!-- Etiquetas meta requeridas -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Título de la página -->
		<title>Hoteles ESE - Cambiar Contraseña</title>
		<!-- Favicon -->
		<link rel="shortcut icon" type="favicon/ico" href="../../../images/favicon.ico">

		<!-- CSS principal -->
		<link rel="stylesheet" type="text/css" href="../../../style/main.css">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="../../../lib/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../../../lib/floating-labels.css">

		<!-- Librería jQuery -->
		<script src="../../../lib/jquery-3.4.0.min.js"></script>
		<!-- Popper Script. Librería necesaria para que funcionen los elementos tooltip de Bootstrap -->
		<script src="../../../lib/popper.min.js"></script>
		<!-- Bootstrap Script -->
		<script src="../../../lib/bootstrap.min.js"></script>
		<!-- Script Base64 -->
		<script src="../../../lib/base64.js"></script>
		<!-- Script principal -->
		<script src="../../js/main.js"></script>

		<style>
			body {
				display: -ms-flexbox;
				display: -webkit-box;
				display: flex;
				-ms-flex-align: center;
				-ms-flex-pack: center;
				-webkit-box-align: center;
				align-items: center;
				-webkit-box-pack: center;
				justify-content: center;
				padding-top: 40px;
				padding-bottom: 40px;
			}
		</style>
	</head>

	<body>

		<!-- Contenedor principal -->
		<main class="container-fluid">
			<!-- Cabecera de la página -->
			<header class="row mb-3">
				<!-- Menú -->
				<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top col-md-12">
					<!-- Logotipo -->
					<img src="../../../images/logo.jpg" width="120" height="55">

					<!-- Botón que desplegará el menú cuando este no se vea debido al tamaño del dispositivo
					en el que se esté viendo -->
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
						<span class="navbar-toggler-icon"></span>
					</button>

					<!-- Diferentes opciones del menú -->
					<div class="collapse navbar-collapse" id="menu">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a href="../view/vistaAdmin.php" class="nav-link">Inicio</a>
							</li>

							<li class="nav-item">
								<a href="./cargarReservas.php" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver y eliminar reservas">Reservas</a>
							</li>

							<li class="nav-item">
								<a href="./verUsuarios.php" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver, añadir, modificar y eliminar usuarios">Usuarios</a>
							</li>

							<li class="nav-item">
								<a href="./verHoteles.php" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver, añadir, modificar y eliminar hoteles">Hoteles</a>
							</li>

							<li class="nav-item">
								<a href="./peticionesController.php" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver y eliminar peticiones">Peticiones</a>
							</li>
						</ul>
					</div>

					<a href="./setUsuario.php?admin" data-toggle="tooltip" data-html="true" title="¡Hola <?php echo $_SESSION['usuario'];?>!">
						<img src="../../../images/usuario.png" width="50" height="50" id="usuario">
					</a>

					<a href="../controller/cerrarSesion.php" data-toggle="tooltip" data-html="true" title="Cerrar sesión">
						<img src="../../../images/salir.svg" width="50" height="55">
					</a>
				</nav>
			</header>

			<?php
				if (isset($_GET["password"])) {
					if ($_GET["password"] == 0) {
			?>

			<div class="alert alert-warning text-center mt-5" role="alert">
				<strong>Vaya...</strong> La contraseña actual introducida no coincide con la del usuario.
			</div>

			<?php
					}
				}
			?>

			<header class="row justify-content-center mt-5">
				<h3 class="text-center mt-5">Cambiar contraseña del usuario <b><?=$usuario->getCorreo()?></b></h3>
			</header>

			<section class="row justify-content-center mt-5">
				<form class="form-signin" method="post" action="./setPassword.php">
					<div class="form-label-group">
						<input type="email" id="correo" name="correo" class="form-control-plaintext" placeholder="Correo electrónico" value="<?=$usuario->getCorreo()?>" readonly>
						<label for="correo">Correo electrónico</label>
					</div>

					<div class="form-label-group">
						<input type="password" id="passwordActual" name="passwordActual" class="form-control" placeholder="Contraseña actual" autofocus required>
						<label for="passwordActual"><span class="obligatorio">*</span> Contraseña actual</label>
					</div>

					<div class="form-label-group">
						<input type="password" id="passwordNueva" name="passwordNueva" class="form-control" placeholder="Contraseña nueva" required>
						<label for="passwordNueva"><span class="obligatorio">*</span> Contraseña nueva</label>
					</div>

					<?php
						if ($usuario->getCorreo() != $_SESSION["usuario"]) {
							$controlador = "verUsuarios.php";
					?>
					
						<!-- Entrará en este if, si el administrador está editando la contraseña de un usuario y no de
						él mismo. Por lo que, en caso de efectuarse correctamente el cambio de contraseña sobre un usuario, desde
						el controlador de setPassword, deberemos redireccionar al name de este campo -->
						<input type="hidden" name="verUsuarios">
					
					<?php
						} else {
							$controlador = "setUsuario.php?admin";
					?>

						<!-- Si el cambio de la contraseña se efectua correctamente, cerramos la sesión del usuario para que
						inicie sesión de nuevo con su nueva contraseña -->
						<input type="hidden" name="index" value="./cerrarSesion.php">

					<?php
						}
					?>

					<!-- Mandamos en un campo oculto -->
					<input type="hidden" name="redireccion" value="setPassword.php?id=<?=base64_encode($usuario->getCorreo())?>&admin">

					<div class="form-group">
						<input type="submit" name="setPassword" class="btn btn-success" value="Cambiar">
						<a href="<?=$controlador?>">
							<input type="button" class="btn btn-warning" value="Cancelar">
						</a>
					</div>
				</form>
			</section>
		</main>
	</body>
</html>
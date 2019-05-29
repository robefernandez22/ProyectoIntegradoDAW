<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="es">

	<head>
		<!-- Etiquetas meta requeridas -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Título de la página -->
		<title>Reservas</title>
		<!-- Favicon -->
		<link rel="shortcut icon" type="favicon/ico" href="../../../images/favicon.ico">

		<!-- CSS principal -->
		<link rel="stylesheet" type="text/css" href="../../../style/main.css">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="../../../lib/bootstrap.min.css">

		<!-- Librería jQuery -->
		<script src="../../../lib/jquery-3.4.0.min.js"></script>
		<!-- Popper Script. Librería necesaria para que funcionen los elementos tooltip de Bootstrap -->
		<script src="../../../lib/popper.min.js"></script>
		<!-- Bootstrap Script -->
		<script src="../../../lib/bootstrap.min.js"></script>
		<!-- Script principal -->
		<script src="../../js/main.js"></script>
	</head>

	<body>

		<!-- Contenedor principal -->
		<main class="container-fluid">
			<!-- Cabecera de la página -->
			<header class="row">
				<!-- Menú -->
				<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
					<!-- Botón que desplegará el menú cuando este no se vea debido al tamaño del dispositivo
					en el que se esté viendo -->
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
						<span class="navbar-toggler-icon"></span>
					</button>
					
					<!-- Logotipo -->
					<a class="navbar-brand" href="../../../index.php">
						<img src="../../../images/logo.jpg" width="120" height="55">
					</a>

					<!-- Diferentes opciones del menú -->
					<div class="collapse navbar-collapse" id="menu">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a href="../../../index.php" class="nav-link">Inicio</a>
							</li>

							<li class="nav-item active">
								<a href="./vistaReserva.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Haz tu reserva a medida!">Reservar</a>
							</li>

							<li class="nav-item">
								<a href="" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Conoce las opiniones de nuestros clientes!">Opiniones</a>
							</li>

							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown">Nosotros</a>

								<div class="dropdown-menu">
									<a class="dropdown-item" href="./vistaConocenos.html" data-toggle="tooltip" data-html="true" data-placement="right" title="¡Conoce la historia de Hoteles ESE!">Conócenos</a>
									<a class="dropdown-item" href="./vistaTrabaja.html" data-toggle="tooltip" data-html="true" data-placement="right" title="¡Contáctanos y trabaja con nosotros!">Trabaja con nosotros</a>
								</div>
							</li>
						</ul>
					</div>

					<!-- Botones para abrir la ventana de login y de registro -->
					<form class="form-inline">
						<?php
							if (!isset($_SESSION["nombreUsuario"])) {
						?>
						<a href="#" data-toggle="tooltip" data-html="true" title="¡Inicia sesión y haz tu reserva!">
							<input class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#entrar" type="button" value="Login">
						</a>

						<a href="#" data-toggle="tooltip" data-html="true" title="¡Regístrate para poder reservar!">
							<input class="btn btn-warning btn-sm" data-toggle="modal" data-target="#registro" type="button" value="Regístrate">
						</a>
						<?php
							} else {
						?>
						<a href="../controller/setUsuario.php?id=<?=base64_encode($_SESSION['correoUsuario'])?>" data-toggle="tooltip" data-html="true" title="¡Hola <?php echo $_SESSION['nombreUsuario'];?>!">
							<img src="../../../images/usuario.png" width="50" height="50" id="usuario">
						</a>

						<a href="../controller/cerrarSesion.php" data-toggle="tooltip" data-html="true" title="Cerrar sesión">
							<img src="../../../images/salir.svg" width="50" height="50">
						</a>
						<?php
							}
						?>
					</form>
				</nav>
			</header>

			<?php
				if (!isset($_SESSION["nombreUsuario"])) {
			?>

			<header class="row justify-content-center mt-5">
				<h3 class="text-center mt-5">No has iniciado sesión.<br>Por favor, <a href="#" id="inicia">inicia sesión</a> o <a href="#" id="registrar">regístrate</a> para poder reservar.</h3>
			</header>

			<?php
				} else {
			?>

			<header class="row justify-content-center mt-5">
				<h3 class="text-center mt-5">Has iniciado sesión.</h3>
			</header>

			<?php
				}
			?>

			<!-- Ventana modal para hacer login -->
			<section class="modal" id="entrar">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header bg-primary text-white">
							<div class="modal-title">
								Inicia sesión
							</div>

							<span data-dismiss="modal">X</span>
						</div>

						<form method="post" action="../controller/verificarUsuario.php">
							<div class="modal-body">
								<div class="form-group">
									<span class="obligatorio">*</span><label>Email:</label>
									<input type="email" name="correo" class="form-control" autofocus required>
								</div>

								<div class="form-group">
									<span class="obligatorio">*</span><label>Contraseña:</label>
									<input type="password" name="password" class="form-control" required>
								</div>

								<div class="form-group">
									<label>Recordar</label>
									<input type="checkbox" name="recordar">
								</div>
							</div>

							<div class="modal-footer text-right">
								<a href="">¿Has olvidado tu contraseña?</a>
								<input type="submit" name="entrar" class="btn btn-primary" value="Entrar">
							</div>

							<input type="hidden" name="pagina" value="../view/vistaReserva.php">
						</form>
					</div>
				</div>
			</section>

			<!-- Ventana modal para registrarse -->
			<section class="modal" id="registro">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header bg-warning text-white">
							<div class="modal-title">
								Registro
							</div>

							<span data-dismiss="modal">X</span>
						</div>

						<form method="post" action="../controller/altaUsuario.php">
							<div class="modal-body">
								<div class="form-group">
									<span class="obligatorio">*</span><label>Nombre:</label>
									<input type="text" name="nombre" class="form-control" autofocus>
								</div>

								<div class="form-group">
									<span class="obligatorio">*</span><label>Apellidos:</label>
									<input type="text" name="apellidos" class="form-control">
								</div>

								<div class="form-group">
									<span class="obligatorio">*</span><label>Correo Electrónico:</label>
									<input type="email" name="correo" class="form-control">
								</div>

								<div class="form-group">
									<span class="obligatorio">*</span><label>Contraseña:</label>
									<input type="password" name="password" class="form-control">
								</div>

								<!-- El usuario que se registre aquí siempre será de tipo usuario,
								nunca de tipo administrador o por el estilo, por lo que mandamos el tipo
								en un campo oculto -->
								<input type="hidden" name="tipo" value="U">
							</div>

							<div class="modal-footer text-right">
								<input type="submit" name="registro" class="btn btn-warning" value="Registrarse">
							</div>
						</form>
					</div>
				</div>
			</section>
		</main>
	</body>
</html>
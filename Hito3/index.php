<!DOCTYPE html>
<html lang="es">

	<head>
		<!-- Etiquetas meta requeridas -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Título de la página -->
		<title>Hoteles ESE - Inicio</title>
		<!-- Favicon -->
		<link rel="shortcut icon" type="favicon/ico" href="./images/favicon.ico">

		<!-- CSS principal -->
		<link rel="stylesheet" type="text/css" href="./style/main.css">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="./lib/bootstrap.min.css">

		<!-- Librería jQuery -->
		<script src="./lib/jquery-3.4.0.min.js"></script>
		<!-- Popper Script. Librería necesaria para que funcionen los elementos tooltip de Bootstrap -->
		<script src="./lib/popper.min.js"></script>
		<!-- Bootstrap Script -->
		<script src="./lib/bootstrap.min.js"></script>
		<!-- Script principal -->
		<script src="./scripts/js/main.js"></script>
	</head>

	<body>

		<!-- Contenedor principal -->
		<main class="container-fluid">
			<!-- Contenedor para el aviso de Cookies -->
			<div class="alert alert-dismissible fade show alert-primary fixed-bottom text-center">
				<p>¡Aviso! Usamos <strong>Cookies</strong> para mejorar la experiencia del usuario. Pero tranquil@, <strong>tus datos están seguros</strong>.</p>
				<p>Consulta <strong><a href="http://www.interior.gob.es/politica-de-cookies" target="_blank">aquí</a></strong> la política de <strong>Cookies</strong>.</p>
				<button type="button" class="close" data-dismiss="alert">
					<span>X</span>
				</button>
			</div>

			<!-- Cabecera de la página -->
			<header class="row">
				<!-- Menú -->
				<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
					<!-- Logotipo -->
					<a class="navbar-brand" href="./index.html">
						<img src="./images/logo.jpg" width="120" height="55">
					</a>

					<!-- Botón que desplegará el menú cuando este no se vea debido al tamaño del dispositivo
					en el que se esté viendo -->
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
						<span class="navbar-toggler-icon"></span>
					</button>

					<!-- Diferentes opciones del menú -->
					<div class="collapse navbar-collapse" id="menu">
						<ul class="navbar-nav">
							<li class="nav-item active">
								<a href="./index.html" class="nav-link">Inicio</a>
							</li>

							<li class="nav-item">
								<a href="./content/reservar.html" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Haz tu reserva a medida!">Reservar</a>
							</li>

							<li class="nav-item">
								<a href="./content/opiniones.html" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Conoce las opiniones de nuestros clientes!">Opiniones</a>
							</li>

							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown">Nosotros</a>

								<div class="dropdown-menu">
									<a class="dropdown-item" href="./content/conocenos.html" data-toggle="tooltip" data-html="true" data-placement="right" title="¡Conoce la historia de Hoteles ESE!">Conócenos</a>
									<a class="dropdown-item" href="./content/trabaja.html" data-toggle="tooltip" data-html="true" data-placement="right" title="¡Contáctanos y trabaja con nosotros!">Trabaja con nosotros</a>
								</div>
							</li>
						</ul>
					</div>

					<!-- Botones para abrir la ventana de login y de registro -->
					<form class="form-inline">
						<?php
							session_start();
							if (isset($_SESSION["usuario"])) {
						?>

						<a href="#" data-toggle="tooltip" data-html="true" title="¡Hola <?php echo $_SESSION['usuario']?>!">
							<img src="./images/usuario.png" width="35" height="35">
						</a>

						<?php
							} else {
						?>

						<a href="#" data-toggle="tooltip" data-html="true" title="¡Inicia sesión y haz tu reserva!">
							<input class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#entrar" type="button" value="Login">
						</a>

						<a href="#" data-toggle="tooltip" data-html="true" title="¡Regístrate para poder reservar!">
							<input class="btn btn-warning btn-sm" data-toggle="modal" data-target="#registro" type="button" value="Regístrate">
						</a>

						<?php
							}
						?>
					</form>
				</nav>
			</header>

			<!-- Carrusel de imágenes -->
			<section class="row justify-content-center mt-5">
				<div class="col-md-9 mt-5">
					<div class="carousel slide" id="carrusel" data-ride="carousel">
						<div class="carousel-inner text-center">
							<!-- <div class="carousel-item active">
								<img class="w-100 d-block" src="./images/logo.jpg" alt="Primer elemento">
							</div> -->
						</div>

						<a class="carousel-control-prev" href="#carrusel" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Anterior</span>
						</a>

						<a class="carousel-control-next" href="#carrusel" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Siguiente</span>
						</a>

						<ol class="carousel-indicators">
							<li data-target="#carrusel" data-slide-to="0" class="active"></li>
						</ol>
					</div>
				</div>
			</section>

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

						<form method="post">
							<div class="modal-body">
								<div class="form-group">
									<label>Email:</label>
									<input type="email" name="email" class="form-control" autofocus required>
								</div>

								<div class="form-group">
									<label>Contraseña:</label>
									<input type="password" name="password" class="form-control" required>
								</div>

								<div class="form-group">
									<label>Recordar</label>
									<input type="checkbox" name="recordar">
								</div>
							</div>

							<div class="modal-footer text-right">
								<input type="submit" name="entrar" class="btn btn-primary" value="Entrar">
							</div>
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

						<form>
							<div class="modal-body">
								<div class="form-group">
									<label>Nombre:</label>
									<input type="text" name="nombre" class="form-control" autofocus>
								</div>

								<div class="form-group">
									<label>Apellidos:</label>
									<input type="text" name="apellidos" class="form-control">
								</div>

								<div class="form-group">
									<label>Correo Electrónico:</label>
									<input type="email" name="correo" class="form-control">
								</div>

								<div class="form-group">
									<label>Contraseña:</label>
									<input type="password" name="password" class="form-control">
								</div>

								<div class="form-group">
									<label>Tipo:</label>
									<input type="radio" name="">
								</div>
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
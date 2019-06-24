<?php

	session_start();
	if (isset($_GET["procesoReserva"])) {
		if (isset($_SESSION["usuario"])) {

			require_once "../model/Usuario.php";
			$data = Usuario::buscarUsuario($_SESSION["usuario"]);
			$usuario = new Usuario($data);
			
			if ($usuario->getTipo() == "Administrador") {
				header("Location:./vistaAdmin.php");
			}

		}
	}

?>

<!DOCTYPE html>
<html lang="es">

	<head>
		<!-- Etiquetas meta requeridas -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Título de la página -->
		<title>Hoteles ESE - Iniciar Sesión</title>
		<!-- Favicon -->
		<link rel="shortcut icon" type="favicon/ico" href="../../../images/favicon.ico">

		<!-- CSS principal -->
		<link rel="stylesheet" type="text/css" href="../../../style/main.css">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="../../../lib/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../../../lib/floating-labels.css">

		<script src="../../../lib/jquery-3.4.0.min.js"></script>
		<script src="../../../lib/jquery-migrate-3.0.1.min.js"></script>

		<!-- Librerías necesarias para FancyBox -->
		<script src="../../../lib/fancybox/jquery.fancybox.min.js"></script>
		<link rel="stylesheet" href="../../../lib/fancybox/jquery.fancybox.min.css" type="text/css" media="screen">
		<!-- Script para galeria de imágenes -->
		<script src="../../js/galeria.js"></script>

		<link rel="stylesheet" type="text/css" href="../../../css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../../../css/main_styles.css">

		<!-- CSS para el tema -->
		<link rel="stylesheet" href="../../../css/animate.css">
		<link rel="stylesheet" href="../../../css/owl.carousel.min.css">
		<link rel="stylesheet" href="../../../css/aos.css">
		<link rel="stylesheet" href="../../../css/bootstrap-datepicker.css">
		<link rel="stylesheet" href="../../../css/jquery.timepicker.css">
		<link rel="stylesheet" href="../../../css/style.css">
	</head>

	<body>

		<header class="site-header js-site-header">
			<div class="container-fluid">
				<div class="row align-items-center">
					<nav class="navbar navbar-expand-sm navbar-dark fixed-top">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
							<span class="navbar-toggler-icon"></span>
						</button>

						<!-- Diferentes opciones del menú -->
						<div class="collapse navbar-collapse" id="menu">
							<ul class="navbar-nav">
								<li class="nav-item">
									<a href="../../../index.php" class="nav-link">Inicio</a>
								</li>

								<li class="nav-item">
									<a href="../controller/cargarValoraciones.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Conoce las opiniones de nuestros clientes!">Valoraciones</a>
								</li>

								<li class="nav-item">
									<a href="./vistaConocenos.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Conoce a todo nuestro equipo de Hoteles ESE!">Conócenos</a>
								</li>

								<li class="nav-item">
									<a href="../controller/contactoController.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Contáctanos con cualquier duda que tengas!">Contáctanos</a>
								</li>
							</ul>
						</div>

						<!-- Botones para abrir la ventana de login y de registro -->
						<form class="form-inline">
							<a href="./formularioInicio.php" data-toggle="tooltip" data-html="true" title="¡Inicia sesión y haz tu reserva!">
								<input class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#entrar" type="button" value="Entrar">
							</a>

							<?php
								if (isset($_GET["procesoReserva"])) {
							?>

							<a href="./formularioRegistro.php?procesoReserva" data-toggle="tooltip" data-html="true" title="¡Inicia sesión y haz tu reserva!">
								<input class="btn btn-warning btn-sm mr-2" data-toggle="modal" data-target="#entrar" type="button" value="Registrarse">
							</a>

							<?php
								} else {
							?>
							
							<a href="./formularioRegistro.php" data-toggle="tooltip" data-html="true" title="¡Inicia sesión y haz tu reserva!">
								<input class="btn btn-warning btn-sm mr-2" data-toggle="modal" data-target="#entrar" type="button" value="Registrarse">
							</a>

							<?php
								}
							?>
						</form>
					</nav>
				</div>
			</div>
		</header>
		<!-- END head -->

		<section class="site-hero overlay" style="background-image: url(../../../images/iniciar.jpg);">
			<div class="container">
				<div class="row site-hero-inner justify-content-center align-items-center">
					<div class="col-md-10 text-center" data-aos="fade-up">
						<h1 class="heading">Inicia sesión o regístrate</h1>
					</div>
				</div>
			</div>

			<a class="mouse smoothscroll" href="#next">
				<div class="mouse-icon">
					<span class="mouse-wheel"></span>
				</div>
			</a>
		</section>
		<!-- End section -->

		<section class="section">
			<div class="container">
				<div class="row justify-content-center text-center" id="next">
					<div class="col-md-7">
						<p data-aos="fade-up" data-aos-delay="100">
							<?php
								if (isset($_GET["not_found"])) {
							?>

							<div class="alert alert-warning text-center" role="alert">
								<b>No has podido iniciar sesión.</b> Los datos introducidos no existen.
							</div>

							<?php
								} elseif (isset($_GET["password"])) {
							?>

							<div class="alert alert-warning text-center" role="alert">
								<b>No has podido iniciar sesión</b> La contraseña es incorrecta.
							</div>

							<?php
								} elseif (isset($_GET["procesoReserva"])) {
							?>

							<div class="alert alert-warning text-center" role="alert">
								<b>Antes de confirmar una reserva debes iniciar sesión.</b> Si no tienes una cuenta, puedes registrarte sin ningún problema. No te preocupes, es un proceso sencillo. Y los datos de tu reserva se han guardado. Sólo inicia sesión o regístrate y podrás confirmar tu reserva sin tener que volver a repetir el proceso.
							</div>

							<?php
								} else {
									echo "Inicia sesión si ya dispones de una cuenta. O bien regístrate si no la tienes para poder reservar, es un proceso sencillo.";
								}
							?>
						</p>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<form class="form-signin" method="post" action="../controller/verificarUsuario.php">
							<div class="form-label-group">
								<input type="email" id="correo" name="correo" class="form-control" placeholder="Correo electrónico" required autofocus>
								<label for="correo"><span class="obligatorio">*</span> Correo electrónico</label>
							</div>

							<div class="form-label-group">
								<input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
								<label for="password"><span class="obligatorio">*</span> Contraseña</label>
							</div>

							<div class="form-group">
								<label>Recordar</label>
								<input type="checkbox" id="recordar" name="recordar">
							</div>

							<div class="modal-footer text-right">
								<?php
									if (isset($_GET["procesoReserva"])) {
								?>
								<p>¿No tienes una cuenta? <a href="./formularioRegistro.php?procesoReserva"> Regístrate</a></p>
								<?php
									} else {
								?>
								<p>¿No tienes una cuenta? <a href="./formularioRegistro.php"> Regístrate</a></p>
								<?php
									}
								?>
							</div>

							<div class="modal-footer text-right">
								<input type="submit" name="entrar" class="btn btn-primary" value="Entrar">
							</div>

							<?php
								if (isset($_GET["procesoReserva"])) {
							?>
							<input type="hidden" name="pagina" value="./procesoReserva.php">
							<?php
								}
							?>
						</form>
					</div>
				</div>
			</div>
		</section>

		<section class="section bg-image overlay" style="background-image: url('../../../images/hero_4.jpg');">
			<div class="container">
				<div class="row pt-5">
					<p class="col-md-12 text-center">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Hoteles ESE &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made <i class="icon-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
				</div>
			</div>
		</section>

		<!-- Scripts para el tema -->
		<script src="../../../lib/popper.min.js"></script>
		<script src="../../../lib/bootstrap.min.js"></script>
		<script src="../../../lib/owl.carousel.min.js"></script>
		<script src="../../../lib/jquery.stellar.min.js"></script>
		<script src="../../../lib/bootstrap-datepicker.js"></script>
		<script src="../../../lib/jquery.timepicker.min.js"></script>
		<!-- Script Base64 -->
		<script src="../../../lib/base64.js"></script>
		<!-- Script principal -->
		<script src="../../js/main.js"></script>
		<!-- Scripts para el tema -->
		<script src="../../../lib/aos.js"></script> 
		<script src="../../js/theme.js"></script>

	</body>
</html>
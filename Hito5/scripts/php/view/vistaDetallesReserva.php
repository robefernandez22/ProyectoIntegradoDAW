<!DOCTYPE html>
<html lang="es">

	<head>
		<!-- Etiquetas meta requeridas -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Título de la página -->
		<title>Hoteles ESE - Detalles Reserva</title>
		<!-- Favicon -->
		<link rel="shortcut icon" type="favicon/ico" href="../../../images/favicon.ico">

		<link rel="stylesheet" type="text/css" href="../../../style/main.css">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="../../../lib/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../../../lib/floating-labels.css">

		<script src="../../../lib/jquery-3.4.0.min.js"></script>
		<script src="../../../lib/jquery-migrate-3.0.1.min.js"></script>

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
									<a href="./cargarValoraciones.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Conoce las opiniones de nuestros clientes!">Valoraciones</a>
								</li>

								<li class="nav-item">
									<a href="../view/vistaConocenos.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Conoce la historia de Hoteles ESE!">Conócenos</a>
								</li>

								<li class="nav-item">
									<a href="./contactoController.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Contáctanos y trabaja con nosotros!">Contáctanos</a>
								</li>
							</ul>
						</div>

						<!-- Botones para abrir la ventana de login y de registro -->
						<form class="form-inline">
							<?php
								if (!isset($_SESSION["usuario"])) {
							?>
							<a href="../view/formularioInicio.php" data-toggle="tooltip" data-html="true" title="¡Inicia sesión y haz tu reserva!">
								<input class="btn btn-primary btn-sm mr-2" type="button" value="Entrar">
							</a>

							<a href="../view/formularioRegistro.php" data-toggle="tooltip" data-html="true" title="¡Regístrate para poder reservar!">
								<input class="btn btn-warning btn-sm" type="button" value="Registrarse">
							</a>
							<?php
								} else {
							?>
							<a href="./setUsuario.php?id=<?=base64_encode($_SESSION['usuario'])?>" data-toggle="tooltip" data-html="true" title="¡Hola <?php echo $_SESSION['usuario'];?>!">
								<img src="../../../images/usuario.png" width="50" height="50" id="usuario">
							</a>

							<a href="./cerrarSesion.php" data-toggle="tooltip" data-html="true" title="Cerrar sesión">
								<img src="../../../images/salir.svg" width="50" height="50">
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

		<section class="site-hero overlay" style="background-image: url(../../../images/testimonials.jpg)" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row site-hero-inner justify-content-center align-items-center">
					<div class="col-md-10 text-center" data-aos="fade-up">
						<span class="custom-caption text-uppercase text-white d-block mb-3">Conoce los detalles de tu reserva</span>
						<h1 class="heading">Eat, sleep and enjoy</h1>
					</div>
				</div>
			</div>

			<a class="mouse smoothscroll" href="#next">
				<div class="mouse-icon">
					<span class="mouse-wheel"></span>
				</div>
			</a>
		</section>
		<!-- END section -->

		<section class="py-5 bg-light" id="next">
			<div class="container">
				<div class="row justify-content-center text-center mb-5">
					<div class="col-md-7">
						<h2 class="heading" data-aos="fade-up">Detalles de tu reserva en <?=$hotel->getNombre()?></h2>
						<p data-aos="fade-up" data-aos-delay="100">Mira todos los detalles de tu reserva. Recuerda que si tienes alguna duda o necesidad, no lo dudes: ¡<b><a href="./contactoController.php">Contáctanos</a></b>!</p>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-md-4 mb-5" data-aos="fade-up">
						<img src="../../../images/hero_1.jpg" alt="Image" class="img-fluid rounded">
					</div>
					<div class="col-md-8" data-aos="fade-up">
						<div class="row">
							<div class="form-label-group">
								<input type="text" id="hotel" name="hotel" class="form-control-plaintext" placeholder="Hotel" value="<?=$hotel->getNombre()?>" readonly>
								<label for="hotel">Hotel</label>
							</div>

							<div class="form-label-group">
								<input type="text" id="direccion" name="direccion" class="form-control-plaintext" placeholder="Dirección" value="<?=$hotel->getDireccion()?>" readonly>
								<label for="direccion">Dirección</label>
							</div>

							<div class="form-label-group">
								<input type="text" id="fechaReserva" name="fechaReserva" class="form-control-plaintext" placeholder="Fecha de reserva" value="<?=$reserva->getFechaReserva()?>" readonly>
								<label for="fechaReserva">Fecha de reserva</label>
							</div>

							<div class="form-label-group">
								<input type="text" id="fechaEntrada" name="fechaEntrada" class="form-control-plaintext" placeholder="Fecha de entrada" value="<?=$reserva->getFechaEntrada()?>" readonly>
								<label for="fechaEntrada">Fecha de entrada</label>
							</div>

							<div class="form-label-group">
								<input type="text" id="fechaSalida" name="fechaSalida" class="form-control-plaintext" placeholder="Fecha de salida" value="<?=$reserva->getFechaSalida()?>" readonly>
								<label for="fechaSalida">Fecha de salida</label>
							</div>

							<div class="form-label-group">
								<input type="text" id="habitacion" name="habitacion" class="form-control-plaintext" placeholder="Nº Habitación" value="<?=$habitacion->getNumHabitacion()?>" readonly>
								<label for="habitacion">Número de habitación</label>
							</div>

							<div class="form-label-group">
								<input type="text" id="plantaHabitacion" name="plantaHabitacion" class="form-control-plaintext" placeholder="Planta de la habitación" value="<?=$habitacion->getNumPlanta()?>" readonly>
								<label for="plantaHabitacion">Planta de la habitación</label>
							</div>

							<div class="form-label-group">
								<input type="text" id="tipoHabitacion" name="tipoHabitacion" class="form-control-plaintext" placeholder="Tipo de habitación" value="<?=$habitacion->getDescripcion()?>" readonly>
								<label for="tipoHabitacion">Tipo de habitación</label>
							</div>

							<div class="form-label-group">
								<input type="text" id="numeroCamas" name="numeroCamas" class="form-control-plaintext" placeholder="Número de camas" value="<?=$habitacion->getCamas()?>" readonly>
								<label for="numeroCamas">Número de camas</label>
							</div>

							<div class="form-label-group">
								<input type="text" id="precioNoche" name="precioNoche" class="form-control-plaintext" placeholder="Precio por noche" value="<?=$habitacion->getPrecioNoche()?>€" readonly>
								<label for="precioNoche">Precio por noche</label>
							</div>

							<div class="form-label-group">
								<input type="text" id="numeroNoches" name="numeroNoches" class="form-control-plaintext" placeholder="Número de noches" value="<?=$reserva->getNoches()?>" readonly>
								<label for="numeroNoches">Número de noches</label>
							</div>

							<div class="form-label-group">
								<input type="text" id="tipoPension" name="tipoPension" class="form-control-plaintext" placeholder="Tipo de pensión" value="<?=$reserva->getDescPension()?>" readonly>
								<label for="tipoPension">Tipo de pensión</label>
							</div>

							<div class="form-label-group">
								<input type="text" id="precioPension" name="precioPension" class="form-control-plaintext" placeholder="Precio de la pensión" value="<?=$reserva->getPrecioPension()?>€" readonly>
								<label for="precioPension">Precio de la pensión</label>
							</div>

							<div class="form-label-group">
								<input type="text" id="numPersonas" name="numPersonas" class="form-control-plaintext" placeholder="Número de personas" value="<?=$reserva->getNumPersonas()?>" readonly>
								<label for="numPersonas">Número de personas</label>
							</div>

							<?php
								$total = ($reserva->getPrecioPension() * $reserva->getNumPersonas()) + ($reserva->getNoches() * $habitacion->getPrecioNoche());
							?>

							<div class="form-label-group">
								<input type="text" id="total" name="total" class="form-control-plaintext" placeholder="Precio total de la reserva" value="<?=$total?>€" readonly>
								<label for="total">Precio total de la reserva</label>
							</div>
						</div>
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

		<!-- Scripts necesarios -->
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
		<script src="../../../lib/aos.js"></script> 
		<script src="../../js/theme.js"></script>
	</body>
</html>
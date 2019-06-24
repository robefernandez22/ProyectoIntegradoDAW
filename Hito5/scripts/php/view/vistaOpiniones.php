<!DOCTYPE html>
<html lang="es">

	<head>
		<!-- Etiquetas meta requeridas -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Título de la página -->
		<title>Hoteles ESE - Valoraciones</title>
		<!-- Favicon -->
		<link rel="shortcut icon" type="favicon/ico" href="../../../images/favicon.ico">

		<link rel="stylesheet" type="text/css" href="../../../style/main.css">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="../../../lib/bootstrap.min.css">

		<script src="../../../lib/jquery-3.4.0.min.js"></script>
		<script src="../../../lib/jquery-migrate-3.0.1.min.js"></script>

		<!-- Estilos para las valoraciones. -->
		<link rel="stylesheet" type="text/css" href="../../../lib/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../../../css/owl.carousel.min.css">
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

								<li class="nav-item active">
									<a href="./cargarValoraciones.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Conoce las opiniones de nuestros clientes!">Valoraciones</a>
								</li>

								<li class="nav-item">
									<a href="../view/vistaConocenos.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Conoce a todo el equipo de Hoteles ESE!">Conócenos</a>
								</li>

								<li class="nav-item">
									<a href="./contactoController.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Contáctanos con cualquier duda que tengas!">Contáctanos</a>
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

		<section class="site-hero overlay" style="background-image: url(../../../images/hero_5.jpg)" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row site-hero-inner justify-content-center align-items-center">
					<div class="col-md-10 text-center" data-aos="fade-up">
						<span class="custom-caption text-uppercase text-white d-block mb-3">Conoce las opiniones de nuestros clientes</span>
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

		<!-- Testimonials -->
		<div class="testimonials" id="next">
			<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="../../../images/testimonials.jpg" data-speed="0.8"></div>
			<div class="testimonials_overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="testimonials_slider_container">

							<!-- Testimonials Slider -->
							<div class="owl-carousel owl-theme test_slider">

								<?php
									foreach ($data as $valoraciones) {
										$data = Hoteles::buscarHotel($valoraciones->getHotelesId());
										$hotel = new Hoteles($data);

										$data = Usuario::buscarUsuario($valoraciones->getUsuariosCorreo());
										$usuario = new Usuario($data);
								?>

								<!-- Slide -->
								<div  class="test_slider_item text-center">
									<div class="rating rating_5 d-flex flex-row align-items-start justify-content-center">
										<?php
											for ($i = 0; $i < $valoraciones->getPuntuacion(); $i++) { 
										?>
										<i></i>
										<?php
											}
										?>
									</div>
									<div class="testimonial_title"><a href="#"><?=$hotel->getNombre()?></a></div>
									<div class="testimonial_text">
										<p><?=$valoraciones->getDescripcion()?></p>
									</div>
									<div class="testimonial_author">
										<p><?=$usuario->getNombre()?></p>
										<p><?=$valoraciones->getFecha()?></p>
									</div>
								</div>

								<?php
									}
								?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

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

		<!-- Scripts para las valoraciones. -->
		<script src="../../../lib/parallax.min.js"></script>
		<script src="../../../lib/custom.js"></script>

	</body>
</html>
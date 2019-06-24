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
		<title>Hoteles ESE - Conócenos</title>
		<!-- Favicon -->
		<link rel="shortcut icon" type="favicon/ico" href="../../../images/favicon.ico">

		<!-- CSS principal -->
		<link rel="stylesheet" type="text/css" href="../../../style/main.css">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="../../../lib/bootstrap.min.css">

		<script src="../../../lib/jquery-3.4.0.min.js"></script>
		<script src="../../../lib/jquery-migrate-3.0.1.min.js"></script>

		<!-- Estilos para tema de equipo. -->
		<link rel="stylesheet" type="text/css" href="../../../css/style_team.css">

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

								<li class="nav-item active">
									<a href="./vistaConocenos.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Conoce a todo el equipo de Hoteles ESE!">Conócenos</a>
								</li>

								<li class="nav-item">
									<a href="../controller/contactoController.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Contáctanos con cualquier duda que tengas!">Contáctanos</a>
								</li>
							</ul>
						</div>

						<!-- Botones para abrir la ventana de login y de registro -->
						<form class="form-inline">
							<?php
								if (!isset($_SESSION["usuario"])) {
							?>
							<a href="./formularioInicio.php" data-toggle="tooltip" data-html="true" title="¡Inicia sesión y haz tu reserva!">
								<input class="btn btn-primary btn-sm mr-2" type="button" value="Entrar">
							</a>

							<a href="./formularioRegistro.php" data-toggle="tooltip" data-html="true" title="¡Regístrate para poder reservar!">
								<input class="btn btn-warning btn-sm" type="button" value="Registrarse">
							</a>
							<?php
								} else {
							?>
							<a href="../controller/setUsuario.php?id=<?=base64_encode($_SESSION['usuario'])?>" data-toggle="tooltip" data-html="true" title="¡Hola <?php echo $_SESSION['usuario'];?>!">
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
				</div>
			</div>
		</header>
		<!-- END head -->

		<section class="site-hero overlay" style="background-image: url(../../../images/image_6.jpg)" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row site-hero-inner justify-content-center align-items-center">
					<div class="col-md-10 text-center" data-aos="fade-up">
						<span class="custom-caption text-uppercase text-white d-block mb-3">Conoce a todo el equipo de Hoteles ESE</span>
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

		<div class="container section" id="section-team">
			<div class="row justify-content-center text-center mb-5" id="next">
				<div class="col-md-7 mb-5">
					<h2 class="heading" data-aos="fade-up">Nuestra misión es ofrecerte la mejor experiencia</h2>
					<p data-aos="fade-up" data-aos-delay="100">Este equipo es el que ha hecho y hace posible que Hoteles ESE sea una de las mayores cadenas de Hoteles en España. Y lo mejor aún está por llegar.</p>
				</div>
			</div>

			<div class="row">

				<!-- Inicio persona -->
				<div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
					<div class="block-2">
						<div class="flipper">
							<div class="front" style="background-image: url(../../../images/person_1.jpg);">
								<div class="box">
									<h2>Claudia Pérez</h2>
									<p>Coordinadora de Salas</p>
								</div>
							</div>

							<div class="back">
								<blockquote>
									<p>&ldquo;Mi trabajo consiste en coordinar y organizar las salas de Hoteles ESE en las que se organiza tanto eventos como cualquier tipo de comida. Intentamos siempre garantizar la calidad de la estancia y que el cliente se sienta tan cómodo como en su casa.&rdquo;</p>
								</blockquote>
								<div class="author d-flex">
									<div class="image mr-3 align-self-center">
										<img src="../../../images/person_1.jpg">
									</div>
									<div class="name align-self-center">Claudia Pérez <span class="position">Coordinadora de Salas</span></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Fin persona -->

				<!-- Inicio persona -->
				<div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
					<div class="block-2">
						<div class="flipper">
							<div class="front" style="background-image: url(../../../images/person_2.jpg);">
								<div class="box">
									<h2>Adela Castaño</h2>
									<p>Jefa de Recepción</p>
								</div>
							</div>

							<div class="back">
								<blockquote>
									<p>&ldquo;Mi trabajo consiste en dirigir las recepciones de todos nuestros Hoteles ESE y garantizar que todo este a la perfección para que cuando nuestros clientes lleguen, tengan la mejor impresión posible.&rdquo;</p>
								</blockquote>
								<div class="author d-flex">
									<div class="image mr-3 align-self-center">
										<img src="../../../images/person_2.jpg">
									</div>
									<div class="name align-self-center">Adela Castaño <span class="position">Jefa de Recepción</span></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Fin persona -->

				<!-- Inicio persona -->
				<div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
					<div class="block-2">
						<div class="flipper">
							<div class="front" style="background-image: url(../../../images/person_3.jpg);">
								<div class="box">
									<h2>Juan Luis</h2>
									<p>Coordinador de Eventos</p>
								</div>
							</div>

							<div class="back">
								<blockquote>
									<p>&ldquo;Mi trabajo consiste en coordinar y organizar todos los eventos de Hoteles ESE. Garantizando así la mayor calidad de cualquier evento acompañado de los mejores profesionales.&rdquo;</p>
								</blockquote>
								<div class="author d-flex">
									<div class="image mr-3 align-self-center">
										<img src="../../../images/person_3.jpg">
									</div>
									<div class="name align-self-center">Juan Luis <span class="position">Coordinador de Eventos</span></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Fin persona -->

				<!-- Inicio persona -->
				<div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
					<div class="block-2">
						<div class="flipper">
							<div class="front" style="background-image: url(../../../images/person_4.jpg);">
								<div class="box">
									<h2>Marta Gutierrez</h2>
									<p>Jefa de Administración</p>
								</div>
							</div>

							<div class="back">
								<blockquote>
									<p>&ldquo;Mi trabajo consiste en dirigir la administración de Hoteles ESE. Estando así al tanto de las reservas y los usuarios. Garantizando soluciones ante cualquier problema administrativo.&rdquo;</p>
								</blockquote>
								<div class="author d-flex">
									<div class="image mr-3 align-self-center">
										<img src="../../../images/person_4.jpg">
									</div>
									<div class="name align-self-center">Marta Gutierrez <span class="position">Jefa de Administración</span></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Fin persona -->

				<!-- Inicio persona -->
				<div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
					<div class="block-2">
						<div class="flipper">
							<div class="front" style="background-image: url(../../../images/person_5.jpg);">
								<div class="box">
									<h2>Manuel Pérez</h2>
									<p>Jefe de Cocinas</p>
								</div>
							</div>

							<div class="back">
								<blockquote>
									<p>&ldquo;Mi trabajo consiste en dirigir las cocinas de nuestros Hoteles ESE. La comida es algo muy importante en nuestros hoteles y siempre queremos garantizar la mayor calidad de los alimentos y de los menús.&rdquo;</p>
								</blockquote>
								<div class="author d-flex">
									<div class="image mr-3 align-self-center">
										<img src="../../../images/person_5.jpg">
									</div>
									<div class="name align-self-center">Manuel Pérez <span class="position">Jefe de Cocinas</span></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Fin persona -->

				<!-- Inicio persona -->
				<div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
					<div class="block-2">
						<div class="flipper">
							<div class="front" style="background-image: url(../../../images/equipo.jpg);">
								<div class="box">
									<h2>Equipo de Hoteles ESE</h2>
									<p>Limpieza, recepción, etc</p>
								</div>
							</div>

							<div class="back">
								<blockquote>
									<p>&ldquo;Trabajar en lo que te gusta es una suerte, pero trabajar en lo que te gusta y hacerlo en Hoteles ESE, no tiene precio. Siempre se respira un buen ambiente de trabajo, y de esa manera es más fácil darle un buen servicio al cliente.&rdquo;</p>
								</blockquote>
								<div class="author d-flex">
									<div class="image mr-3 align-self-center">
										<img src="../../../images/equipo.jpg">
									</div>
									<div class="name align-self-center">Equipo de Hoteles ESE <span class="position">Limpieza, recepción, etc</span></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Fin persona -->
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

		<!-- Script para el tema de equipo -->
		<script src="../../../lib/main_team.js"></script>

	</body>
</html>
<!DOCTYPE html>
<html lang="es">

	<head>
		<!-- Etiquetas meta requeridas -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Título de la página -->
		<title>Hoteles ESE - Contáctanos</title>
		<!-- Favicon -->
		<link rel="shortcut icon" type="favicon/ico" href="../../../images/favicon.ico">

		<!-- CSS principal -->
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
									<a href="../controller/cargarValoraciones.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Conoce las opiniones de nuestros clientes!">Valoraciones</a>
								</li>

								<li class="nav-item">
									<a href="../view/vistaConocenos.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Conoce a todo el equipo de Hoteles ESE!">Conócenos</a>
								</li>

								<li class="nav-item active">
									<a href="../controller/contactoController.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Contáctanos con cualquier duda que tengas!">Contáctanos</a>
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

		<section class="site-hero overlay" style="background-image: url(../../../images/contact.jpg)" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row site-hero-inner justify-content-center align-items-center">
					<div class="col-md-10 text-center" data-aos="fade-up">
						<span class="custom-caption text-uppercase text-white d-block mb-3">Contáctanos con cualquier duda que tengas</span>
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
						<h2 class="heading" data-aos="fade-up">¡No lo dudes!</h2>
						<p data-aos="fade-up" data-aos-delay="100">Contáctanos con cualquier duda, sugerencia e incluso para trabajar con nosotros. Estaremos encantados/as de hablar contigo.</p>
					</div>
				</div>
				<div class="row align-items-center">
					<div class="col-md-12 col-lg-7 ml-auto order-lg-2 position-relative mb-5" data-aos="fade-up">
						<figure class="img-absolute">
							<img src="../../../images/pies.jpg" alt="Image" class="img-fluid">
						</figure>
						<img src="../../../images/hero_1.jpg" alt="Image" class="img-fluid rounded">
					</div>
					<div class="col-md-12 col-lg-4 order-lg-1" data-aos="fade-up">
						<form class="form-signin" method="post" action="./insertarPeticion.php">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="nombre"><span class="obligatorio">*</span> Nombre:</label>
										<input type="text" id="nombre" name="nombre" class="form-control" required value="<?php if(isset($nombre)){echo $nombre;}?>">
									</div>

									<div class="form-group">
										<label for="apellidos"><span class="obligatorio">*</span> Apellidos:</label>
										<input type="text" id="apellidos" name="apellidos" class="form-control" required value="<?php if(isset($apellidos)){echo $apellidos;}?>">
									</div>

									<div class="form-group">
										<label for="inputEmail"><span class="obligatorio">*</span> Correo electrónico:</label>
										<input type="email" id="inputEmail" name="inputEmail" class="form-control" required value="<?php if(isset($correo)){echo $correo;}?>">
									</div>

									<div class="form-group">
										<label for="telefono">Teléfono de contacto:</label>
										<input type="number" id="telefono" name="telefono" class="form-control">
									</div>

									<div class="form-group">
										<label for="asunto"><span class="obligatorio">*</span> Asunto:</label>
										<textarea cols="47" rows="5" id="asunto" name="asunto" required></textarea>
									</div>

									<div class="form-group">
										<input type="submit" name="enviar" class="btn btn-success">
									</div>
								</div>
							</div>
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
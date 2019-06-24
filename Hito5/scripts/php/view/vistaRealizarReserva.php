<!DOCTYPE html>
<html lang="es">

	<head>
		<!-- Etiquetas meta requeridas -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Título de la página -->
		<title>Hoteles ESE - Reserva</title>
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
					<!-- Menú superior -->
					<nav class="navbar navbar-expand-sm navbar-dark fixed-top">
						<!-- Botón para desplegar el menú -->
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
									<a href="../view/vistaConocenos.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Conoce a todo nuestro equipo!">Conócenos</a>
								</li>

								<li class="nav-item">
									<a href="./contactoController.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Contáctanos con cualquier duda!">Contáctanos</a>
								</li>
							</ul>
						</div>
						<!-- Fin de las opciones del menú -->

						<!-- Botones para abrir formulario de inicio o registro o cerrar sesión y ver datos del usuario -->
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
						<!-- Fin de opciones de entrar y registro -->
					</nav>
					<!-- Fin del menú -->
				</div>
			</div>
		</header>
		<!-- Fin del header -->

		<!-- Inicio de la sección principal -->
		<section class="site-hero overlay" style="background-image: url(../../../images/<?=$url?>.jpg);" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row site-hero-inner justify-content-center align-items-center">
					<?php
						if (isset($_GET["registro"])) {
					?>

					<div class="alert alert-success text-center" role="alert">
						<strong>¡Bien!</strong> Te has registrado correctamente. Ahora confirma tu reserva con sólo un click.
						<a href="./scripts/php/controller/delVariable.php?controlador=../../../index.php&variable=registro" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
					</div>

					<?php
						}
					?>

					<div class="col-md-10 text-center" data-aos="fade-up">
						<h1 class="heading"><?=$cabeceraPrincipal?></h1>
						<span class="custom-camption text-uppercase text-white d-block mb-3"><?=$mensajeCabecera?></span>
					</div>
				</div>
			</div>

			<a class="mouse smoothscroll" href="#next">
				<div class="mouse-icon">
					<span class="mouse-wheel"></span>
				</div>
			</a>
		</section>
		<!-- Fin de la sección principal -->

		<section class="section">
			<div class="container">
				<div class="row justify-content-center text-center mb-5" id="next">
					<div class="col-md-7">
						<?php
							if (isset($hoteles)) {							
								if ($hoteles == null) {
						?>

						<div class="alert alert-danger text-center mt-5" role="alert">
							<?=$mensaje?> Pincha <a href="../../../index.php">aquí</a> e inténtalo de nuevo en otra ciudad y/u otras fechas.
						</div>

						<?php
								}
							}
						?>
					</div>
				</div>

				<div class="row" id="galeria">
					<?php
						if (isset($_POST["buscar"])) {
							foreach ($hoteles as $value) {
								$data = Hoteles::buscarHotel($value[0]);
								$hotel = new Hoteles($data);
								$imagenes = $hotel->getImagenes();
					?>

					<div class="col-md-6">
						<form method="post" action="./procesoReserva.php">
							<div class="card mb-4 box-shadow">
								<div id="myCarousel" class="carousel slide" data-ride="carousel">
									<ol class="carousel-indicators">
										<?php
											foreach ($imagenes as $key => $value) {
										?>

										<li data-target="#myCarousel" data-slide-to="<?=$key?>" class="<?php if($key == 0){echo 'active';}?>"></li>

										<?php
											}
										?>
									</ol>

									<div class="carousel-inner">
										<?php
											foreach ($imagenes as $key => $value) {
										?>

										<div class="carousel-item<?php if($key == 0){echo 'active';}?>">
											<a class="image" href="<?=$value['img_path']?>">
												<img src="<?=$value['img_path']?>" width="461" height="350">
											</a>
										</div>

										<?php
											}
										?>
									</div>
								</div>

								<div class="card-body">
									<h3 class="card-text"><b><?=$hotel->getNombre()?></b></h3>
									<hr>
									<p class="card-text"><?=$hotel->getDescripcion()?></p>
									<hr>
									<p class="card-text">Estrellas: <b><?=$hotel->getEstrellas()?></b></p>
									<p class="card-text">Valoración media: <b><?=$hotel->getValoracionMedia()?></b></p>
									<hr>
									<div class="d-flex justify-content-between align-items-center">
										<div class="btn-group">
											<input type="submit" class="btn btn-sm btn-outline-secondary" value="Ver habitaciones">
										</div>
									</div>
								</div>
							</div>
							<!-- Campo oculto para mandar la fecha de entrada -->
							<input type="hidden" name="fechaEntrada" value="<?=$_POST['fechaEntrada']?>">
							<!-- Campo oculto para mandar la fecha de salida -->
							<input type="hidden" name="fechaSalida" value="<?=$_POST['fechaSalida']?>">
							<!-- Campo oculto para mandar la descripción -->
							<input type="hidden" name="descripcion" value="<?=$descripcion?>">
							<!-- Campo oculto para mandar el identificador del hotel -->
							<input type="hidden" name="hotelIdentificador" value="<?=$hotel->getId()?>">
							<!-- Campo oculto para enviar el número de personas -->
							<input type="hidden" name="numPersonas" value="<?=$_POST['numPersonas']?>">
						</form>
					</div>

					<?php
							}
						} elseif (isset($_POST["hotelIdentificador"])) {
							foreach ($habitaciones as $value) {
								$data = Habitaciones::buscarHabitacion($value[0]);
								$habitacion = new Habitaciones($data);
								$imagenes = $habitacion->getImagenes();
					?>

					<div class="col-md-6">
						<form method="post" action="./procesoReserva.php">
							<div class="card mb-4 box-shadow">
								<div id="myCarousel" class="carousel slide" data-ride="carousel">
									<ol class="carousel-indicators">
										<?php
											foreach ($imagenes as $key => $value) {
										?>

										<li data-target="#myCarousel" data-slide-to="<?=$key?>" class="<?php if($key == 0){echo 'active';}?>"></li>

										<?php
											}
										?>
									</ol>

									<div class="carousel-inner">
										<?php
											foreach ($imagenes as $key => $value) {
										?>

										<div class="carousel-item<?php if($key == 0){echo 'active';}?>">
											<a class="image" href="<?=$value['img_path']?>">
												<img src="<?=$value['img_path']?>" width="461" height="350">
											</a>
										</div>

										<?php
											}
										?>
									</div>
								</div>

								<div class="card-body">
	    							<h3 class="card-text"><b>Habitación <?=$habitacion->getDescripcion()?></b></h3>
	    							<hr>
	    							<p class="card-text">Precio por noche: <b><?=$habitacion->getPrecioNoche()?>€</b></p>
	    							<p class="card-text">Planta: <b><?=$habitacion->getNumPlanta()?></b></p>
	    							<p class="card-text">Camas: <b><?=$habitacion->getCamas()?></b></p>
	    							<hr>
	    							<div class="d-flex justify-content-between align-items-center">
	    								<small class="text-muted">Extras: <b><?=$habitacion->getExtras()?></b></small>
	    								<div class="btn-group">
	    									<input type="submit" class="btn btn-sm btn-outline-secondary" value="Seleccionar">
	    								</div>
	    							</div>
    							</div>
							</div>
							<!-- Campo oculto para rescatar los tipos de pensiones del hotel en concreto -->
							<input type="hidden" name="hotelId" value="<?=$habitacion->getHotelId()?>">
							<!-- Campo oculto para guardar el ID de la habitación seleccionada -->
							<input type="hidden" name="precioNoche" value="<?=$habitacion->getPrecioNoche()?>">
							<!-- Fecha de entrada y salida para calcular las noches -->
							<input type="hidden" name="fechaEntrada" value="<?=$_POST["fechaEntrada"]?>">
							<input type="hidden" name="fechaSalida" value="<?=$_POST["fechaSalida"]?>">
							<!-- Número de personas -->
							<input type="hidden" name="numPersonas" value="<?=$_POST["numPersonas"]?>">
							<!-- ID de la habitación -->
							<input type="hidden" name="idHabitacion" value="<?=$habitacion->getId()?>">
							<!-- Tipo de la habitación -->
							<input type="hidden" name="descripcionHab" value="<?=$_POST['descripcion']?>">
						</form>
					</div>

					<?php
							}
						} elseif (isset($_POST["hotelId"])) {
							foreach ($pensiones as $key => $value) {
					?>

					<div class="col-md-4">
						<form method="post" action="./procesoReserva.php">
							<div class="card mb-4 box-shadow">
								<img src="../../../images/pension_<?=$key?>.jpg" height="300">
								<div class="card-body">
									<h3 class="card-text"><b><?=$value["descripcion"]?></b></h3>
									<hr>
									<p class="card-text">Personas: <b><?=$_POST["numPersonas"]?></b></p>
									<p class="card-text">Precio: <b><?=$value["precio"]?>€</b></p>
									<p class="card-text">Precio total: <b><?=($value["precio"] * $_POST["numPersonas"])?>€</b></p>
									<hr>
									<div class="d-flex justify-content-between align-items-center">
										<div class="btn-group">
											<input type="submit" class="btn btn-sm btn-outline-secondary" value="Seleccionar">
										</div>
									</div>
								</div>
							</div>
						<!-- Campo oculto para guardar el precio de la pensión seleccionada -->
						<input type="hidden" name="precioPension" value="<?=$value["precio"]?>">
						<!-- Campo oculto para guardar el id del hotel y luego crear un objeto hotel con ese ID -->
						<input type="hidden" name="idHotel" value="<?=$_POST["hotelId"]?>">
						<!-- Campo oculto para el precio por noche -->
						<input type="hidden" name="precioNoche" value="<?=$_POST["precioNoche"]?>">
						<!-- Fecha de entrada y salida para calcular las noches -->
						<input type="hidden" name="fechaEntrada" value="<?=$_POST["fechaEntrada"]?>">
						<input type="hidden" name="fechaSalida" value="<?=$_POST["fechaSalida"]?>">
						<!-- Tipo de pensión -->
						<input type="hidden" name="tipoPension" value="<?=$value["descripcion"]?>">
						<!-- ID de la pensión -->
						<input type="hidden" name="idPension" value="<?=$value["id"]?>">
						<!-- Número de personas -->
						<input type="hidden" name="numPersonas" value="<?=$_POST["numPersonas"]?>">
						<!-- ID de la habitación -->
						<input type="hidden" name="idHabitacion" value="<?=$_POST["idHabitacion"]?>">
						<!-- Tipo de la habitación -->
						<input type="hidden" name="descripcionHab" value="<?=$_POST["descripcionHab"]?>">
						</form>
					</div>

					<?php
							}
						} elseif (isset($_POST["idHotel"]) || isset($_GET["login"])) {
					?>

					<div class="col-md-12">
						<form method="post" action="./procesoReserva.php">
							<div class="card mb-4 box-shadow">
								<div class="card-body">
									<h3 class="card-text">Hotel: <b><?=$hotel->getNombre()?></b></h3>
									<h5 class="card-text"><b><?=$hotel->getDireccion()?></b></h5>
									<hr>
									<table>
										<tr>
											<td>Fecha de entrada: <b><?=$fechaEntrada?></b></td>
											<td>Fecha de salida: <b><?=$fechaSalida?></b></td>
										</tr>
										<tr>
											<td>Tipo de pensión: <b><?=$tipoPension?></b></td>
											<td>Tipo de habitación: <b><?=$descripcionHab?></b></td>
										</tr>
										<tr>
											<td>Precio de la pensión: <b><?=$precioPension?>€</b></td>
											<td>Precio de la habitación: <b><?=$precioNoche?>€ (Por noche)</b></td>
										</tr>
										<tr>
											<td>Número de personas: <b><?=$numPersonas?></b></td>
											<td>Número de noches: <b><?=$numNoches?></b></td>
										</tr>
										<tr align="center">
											<td colspan="2">Precio total: <b><?=$total?>€</b></td>
										</tr>
									</table>
									<hr>
									<div class="d-flex justify-content-between align-items-center">
										<div class="btn-group">
											<input type="submit" class="btn btn-sm btn-outline-secondary" name="confirmacion" value="Confirmar">
										</div>
									</div>
								</div>
							</div>
							<!-- Fecha de entrada y salida -->
							<input type="hidden" name="fechaEntrada" value="<?=$fechaEntrada?>">
							<input type="hidden" name="fechaSalida" value="<?=$fechaSalida?>">
							<!-- Número de personas -->
							<input type="hidden" name="numPersonas" value="<?=$numPersonas?>">
							<!-- ID de la pensión -->
							<input type="hidden" name="idPension" value="<?=$idPension?>">
							<!-- ID de la habitación -->
							<input type="hidden" name="idHabitacion" value="<?=$idHabitacion?>">
							<!-- ID de la pensión -->
						</form>
					</div>

					<?php
						}
					?>
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
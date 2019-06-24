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

		<!-- Librerías necesarias para FancyBox -->
		<script src="../../../lib/fancybox/jquery.fancybox.min.js"></script>
		<link rel="stylesheet" href="../../../lib/fancybox/jquery.fancybox.min.css" type="text/css" media="screen">
		<!-- Script para galeria de imágenes -->
		<script src="../../js/galeria.js"></script>
	</head>

	<body>

		<!-- Contenedor principal -->
		<main class="container-fluid">
			<!-- Cabecera de la página -->
			<header class="row">
				<!-- Menú -->
				<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">					
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
								<a href="../../../index.php" class="nav-link">Inicio</a>
							</li>

							<li class="nav-item">
								<a href="./scripts/php/controller/cargarValoraciones.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Conoce las opiniones de nuestros clientes!">Valoraciones</a>
							</li>

							<li class="nav-item">
								<a href="" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Conoce la historia de Hoteles ESE!">Conócenos</a>
							</li>

							<li class="nav-item">
								<a href="" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Contáctanos y trabaja con nosotros!">Trabaja con nosotros</a>
							</li>
						</ul>
					</div>

					<!-- Botones para abrir la ventana de login y de registro -->
					<form class="form-inline">
						<?php
							if (!isset($_SESSION["usuario"])) {
						?>
						<a href="#" data-toggle="tooltip" data-html="true" title="¡Inicia sesión y haz tu reserva!">
							<input class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#entrar" type="button" value="Entrar">
						</a>

						<a href="#" data-toggle="tooltip" data-html="true" title="¡Regístrate para poder reservar!">
							<input class="btn btn-warning btn-sm" data-toggle="modal" data-target="#registro" type="button" value="Registrarse">
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
			</header>

			<?php
				if (isset($_POST["buscar"])) {
			?>

			<header class="row justify-content-center mt-5 mb-4">
				<div class="col-md-12">
					<h3 class="text-center mt-5">¡Esto es lo que hemos encontrado para ti!</h3>
				</div>
			</header>

				<div class="album py-5 bg-light">
					<div class="container">
						<div class="row" id="galeria">
							<?php
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

													<li data-target="#myCarousel" data-slide-to="<?=$key?>" class="<?php if($key == 0) { echo 'active'; }?>"></li>

													<?php
														}
													?>
												</ol>

												<div class="carousel-inner">
													<?php
														foreach ($imagenes as $key => $value) {
													?>

													<div class="carousel-item <?php if($key == 0) { echo "active"; }?>">
														<a class="image" href="<?=$value['img_path']?>">
															<img src="<?=$value['img_path']?>">
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
									</form>
								</div>
							<?php
								}
							?>
						</div>
					</div>
				</div>
			<?php
				} elseif(isset($_POST["hotelId"])) {
			?>

			<header class="row justify-content-center mt-5 mb-4">
				<div class="col-md-12">
					<h3 class="text-center mt-5">¡Ahora elige tu tipo de pensión!</h3>
				</div>
			</header>

			<div class="album py-5 bg-light">
				<div class="container">
					<div class="row" id="galeria">
						<?php
							foreach ($pensiones as $value) {
						?>
							<div class="col-md-4">
								<form method="post" action="./procesoReserva.php">
									<div class="card mb-4 box-shadow">
										<div class="card-body">
											<h3 class="card-text"><b><?=$value["descripcion"]?></b></h3>
											<hr>
											<p class="card-text">Precio total: <b><?=$value["precio"]?>€</b></p>
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
									<!-- Campo oculto para guardar el ID de la habitación seleccionada -->
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
								</form>
							</div>
						<?php
							}
						?>
					</div>
				</div>
			</div>
			<?php
				} elseif (isset($_POST["idHotel"])) {
			?>

			<header class="row justify-content-center mt-5 mb-4">
				<div class="col-md-12">
					<h3 class="text-center mt-5">¡Ahora, confirma tu reserva!</h3>
				</div>
			</header>

			<div class="album py-5 bg-light">
				<div class="container">
					<div class="row justify-content-center" id="galeria">
						<div class="col-md-12">
							<form method="post" action="./procesoReserva.php">
								<div class="card mb-4 box-shadow">
									<div class="card-body">
										<h3 class="card-text">Hotel: <b><?=$hotel->getNombre()?></b></h3>
										<hr>
										<p class="card-text">Fecha de entrada: <b><?=$_POST["fechaEntrada"]?></b></p>
										<p class="card-text">Fecha de salida: <b><?=$_POST["fechaSalida"]?></b></p>
										<p class="card-text">Tipo de pensión: <b><?=$tipoPension?></b></p>
										<p class="card-text">Precio total: <b><?=$total?>€</b></p>
										<hr>
										<div class="d-flex justify-content-between align-items-center">
											<div class="btn-group">
												<input type="submit" class="btn btn-sm btn-outline-secondary" name="confirmacion" value="Confirmar">
											</div>
										</div>
									</div>
								</div>
								<!-- Fecha de entrada y salida -->
								<input type="hidden" name="fechaEntrada" value="<?=$_POST["fechaEntrada"]?>">
								<input type="hidden" name="fechaSalida" value="<?=$_POST["fechaSalida"]?>">
								<!-- Número de personas -->
								<input type="hidden" name="numPersonas" value="<?=$_POST["numPersonas"]?>">
								<!-- ID de la pensión -->
								<input type="hidden" name="idPension" value="<?=$_POST["idPension"]?>">
								<!-- ID de la habitación -->
								<input type="hidden" name="idHabitacion" value="<?=$_POST["idHabitacion"]?>">
							</form>
						</div>
					</div>
				</div>
			</div>

			<footer class="text-muted mt-5">
				<div class="container text-center">
					<p>Hoteles ESE &copy; 2019</p>
				</div>
			</footer>

			<!-- Ventana modal para hacer login -->
			<section class="modal" id="entrar">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header bg-primary text-white">
							<div class="modal-title">Inicia sesión</div>
							<span data-dismiss="modal" class="cerrarVentana">X</span>
						</div>

						<form method="post" action="./scripts/php/controller/verificarUsuario.php" class="form-signin" id="inicio">
							<div class="modal-body">
								<div class="form-label-group">
									<input type="email" id="correo" name="correo" class="form-control" placeholder="Dirección de correo electrónico" autofocus required>
									<label for="correo"><span class="obligatorio">*</span> Dirección de correo electrónico</label>
								</div>

								<div class="form-label-group">
									<input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
									<label for="password"><span class="obligatorio">*</span> Contraseña</label>
								</div>

								<div class="form-group">
									<label>Recordar</label>
									<input type="checkbox" name="recordar" id="recordar">
								</div>
							</div>

							<div class="modal-footer text-right">
								<a href="./scripts/php/controller/passwordOlvidada.php">¿Has olvidado tu contraseña?</a>
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
							<div class="modal-title">Registro</div>
							<span data-dismiss="modal" class="cerrarVentana">X</span>
						</div>

						<form method="post" action="./scripts/php/controller/altaUsuario.php" class="form-signin">
							<div class="modal-body">
								<div class="form-label-group">
									<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" autofocus>
									<label for="nombre"><span class="obligatorio">*</span> Nombre</label>
								</div>

								<div class="form-label-group">
									<input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos">
									<label for="apellidos"><span class="obligatorio">*</span> Apellidos</label>
								</div>

								<div class="form-label-group">
									<input type="email" id="correo1" name="correo" class="form-control" placeholder="Dirección de correo electrónico" autofocus required>
									<label for="correo1"><span class="obligatorio">*</span> Dirección de correo electrónico</label>
								</div>

								<div class="form-label-group">
									<input type="password" id="password1" name="password" class="form-control" placeholder="Contraseña">
									<label for="password1"><span class="obligatorio">*</span> Contraseña</label>
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
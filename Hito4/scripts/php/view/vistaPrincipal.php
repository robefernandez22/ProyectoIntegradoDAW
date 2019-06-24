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
		<link rel="stylesheet" type="text/css" href="./lib/floating-labels.css">

		<!-- Librería jQuery -->
		<script src="./lib/jquery-3.4.0.min.js"></script>
		<!-- Popper Script. Librería necesaria para que funcionen los elementos tooltip de Bootstrap -->
		<script src="./lib/popper.min.js"></script>
		<!-- Bootstrap Script -->
		<script src="./lib/bootstrap.min.js"></script>
		<!-- Script Base64 -->
		<script src="./lib/base64.js"></script>
		<!-- Script principal -->
		<script src="./scripts/js/main.js"></script>

		<!-- Librerías necesarias para FancyBox -->
		<script src="./lib/fancybox/jquery.fancybox.min.js"></script>
		<link rel="stylesheet" href="./lib/fancybox/jquery.fancybox.min.css" type="text/css" media="screen">
		<!-- Script para galeria de imágenes -->
		<script src="./scripts/js/galeria.js"></script>
	</head>

	<body>

		<!-- Contenedor principal -->
		<main class="container-fluid">
			<!-- Contenedor para el aviso de Cookies -->
			<div class="alert alert-dismissible fade alert-primary fixed-bottom text-center">
				<p>¡Aviso! Usamos <strong>Cookies</strong> para mejorar la experiencia del usuario. Pero tranquil@, <strong>tus datos están seguros</strong>.<br>Consulta <strong><a href="http://www.interior.gob.es/politica-de-cookies" target="_blank">aquí</a></strong> la política de <strong>Cookies</strong>.</p>
				<button type="button" class="close" data-dismiss="alert">
					<span id="cookies">X</span>
				</button>
			</div>

			<!-- Cabecera de la página -->
			<header class="row">
				<!-- Menú -->
				<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
					<!-- Logotipo -->
					<img src="./images/logo.jpg" width="120" height="55">

					<!-- Botón que desplegará el menú cuando este no se vea debido al tamaño del dispositivo
					en el que se esté viendo -->
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
						<span class="navbar-toggler-icon"></span>
					</button>

					<!-- Diferentes opciones del menú -->
					<div class="collapse navbar-collapse" id="menu">
						<ul class="navbar-nav">
							<li class="nav-item active">
								<a href="./index.php" class="nav-link">Inicio</a>
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
						<a href="./scripts/php/controller/setUsuario.php?id=<?=base64_encode($_SESSION['usuario'])?>" data-toggle="tooltip" data-html="true" title="¡Hola <?php echo $_SESSION['usuario'];?>!">
							<img src="./images/usuario.png" width="50" height="50" id="usuario">
						</a>

						<a href="./scripts/php/controller/cerrarSesion.php" data-toggle="tooltip" data-html="true" title="Cerrar sesión">
							<img src="./images/salir.svg" width="50" height="50">
						</a>
						<?php
							}
						?>
					</form>
				</nav>
			</header>

			<?php
				if (isset($_GET["not_found"])) {
			?>

			<div class="alert alert-warning text-center mt-5" role="alert">
				<strong>Vaya...</strong> No has podido iniciar sesión, los datos que has introducido no existen.
				<a href="./scripts/php/controller/delVariable.php?controlador=../../../index.php&variable=not_found" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
				} elseif(isset($_GET["password"])) {
					if ($_GET["password"] == 1) {
			?>

			<div class="alert alert-success text-center mt-5" role="alert">
				<strong>¡Bien!</strong> Has actualizado correctamente tu contraseña, pero, por seguridad debes iniciar sesión de nuevo ingresando con tu nueva contraseña.
				<a href="./scripts/php/controller/delVariable.php?controlador=../../../index.php&variable=password" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					} else {
			?>

			<div class="alert alert-warning text-center mt-5" role="alert">
				<strong>Vaya...</strong> No has podido iniciar sesión, la contraseña que has introducido es incorrecta.
				<a href="./scripts/php/controller/delVariable.php?controlador=../../../index.php&variable=password" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					}
				} elseif(isset($_GET["login"])) {
			
			?>

			<div class="alert alert-success text-center mt-5" role="alert">
				<strong>¡Bien!</strong> Has iniciado sesión correctamente. Bienvenido/a <b><?=$_SESSION["usuario"]?></b>
				<a href="./scripts/php/controller/delVariable.php?controlador=../../../index.php&variable=login" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
				} elseif (isset($_GET["tipo"])) {
			?>

			<div class="alert alert-success text-center mt-5" role="alert">
				<strong>¡Bien!</strong> Has actualizado correctamente tus datos, pero, cambiaste tu rol de usuario, así que por seguridad debes iniciar sesión de nuevo.
				<a href="./scripts/php/controller/delVariable.php?controlador=../../../index.php&variable=tipo" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
				}
			?>

			<!-- <div class="jumbotron">
				<div class="container">
					<h3 class="display-4"><b>Hoteles ESE.</b> La cadena de hoteles líder en España.</h3>
					<p>EAT, SLEEP AND ENJOY <b>/</b> COME, DUERME Y DISFRUTA</p>
					<p>Porque sabemos que quieres comer, pero comer bien, dormir, y hacerlo tranquilo, y sobre todo pasarlo bien. Por todo eso y mucho más, para nosotros el cliente es lo primero, TÚ eres lo primero. Por eso, nuestros hoteles no son sólo lugares en los que estar de paso, nuestros hoteles son TU casa, son TU hogar.</p>
					<p>Mira abajo nuestros alojamientos y reserva donde quieras. ¡Vamos que nos lo quitan de las manos!</p>
				</div>
			</div> -->

			<section class="row justify-content-center">
				<div class="col-md-12">
					<h3 class="text-center mt-5">¡Haz ya tu reserva en <b>Hoteles ESE</b>!</h3>

					<div class="table-responsive mt-5">
						<table class="table">
							<thead>
								<tr>
									<th scope="col">Fecha de entrada</th>
									<th scope="col">Fecha de salida</th>
									<th scope="col">Número de personas</th>
									<th scope="col">Destino</th>
									<th scope="col"></th>
								</tr>
							</thead>

							<form method="post" action="./scripts/php/controller/procesoReserva.php">
								<input type="hidden" name="buscar" value="">
								<tbody>
									<tr>
										<td>
											<div class="form-group">
												<input type="date" id="fechaEntrada" name="fechaEntrada" class="form-control" required>
											</div>
										</td>

										<td>
											<div class="form-group">
												<input type="date" id="fechaSalida" name="fechaSalida" class="form-control" required>
											</div>
										</td>

										<td>
											<div class="form-group">
												<select class="form-control" name="numPersonas" required>
													<option value="">Selecciona un número de personas</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
												</select>
											</div>
										</td>

										<td>
											<div class="form-group">
												<select class="form-control" name="ciudad" required>
													<option value="">Selecciona una ciudad de destino</option>
												<?php
													foreach ($ciudades as $value) {
												?>

													<option value="<?=$value['ciudad']?>"><?=$value['ciudad']?></option>

												<?php
													}
												?>
												</select>
											</div>
										</td>

										<td>
											<div class="form-group">
												<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
											</div>
										</td>
									</tr>
								</tbody>
							</form>
						</table>
					</div>
				</div>
			</section>

			<div class="album py-5 bg-light">
				<div class="container">
					<div class="row" id="galeria">
						<?php
							foreach ($imagenes as $key => $images) {
								$datos = Hoteles::buscarHotel($hoteles[$key]);
								$hotel = new Hoteles($datos);
						?>
							<div class="col-md-6">
								<div class="card mb-4 box-shadow">
									<a class="image" href="<?=$images?>">
										<img class="card-img-top" style="height: 340px;" src="<?=$images?>">
									</a>
									<div class="card-body">
										<h3 class="card-text"><?=$hotel->getNombre()?></h3>
										<hr>
										<p class="card-text"><?=$hotel->getDescripcion()?></p>
										<hr>
										<div class="d-flex justify-content-between align-items-center">
											<?php
												$hab_disponibles = $hotel->getNumHabitacionesDisponibles();
												if ($hab_disponibles == 0) {
													$hab_disponibles = $hotel->getHabitaciones();
												}

												if ($hab_disponibles < 2) {
											?>

											<small class="text-muted"><?=$hab_disponibles?> habitación disponible en este momento.</small>

											<?php
												} else {
											?>

											<small class="text-muted"><?=$hab_disponibles?> habitaciones disponibles en este momento.</small>

											<?php
												}
											?>
											<div class="btn-group">
												<button type="submit" class="btn btn-sm btn-outline-secondary">Reservar</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php
							}
						?>
					</div>
				</div>
			</div>

			<footer class="text-muted">
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
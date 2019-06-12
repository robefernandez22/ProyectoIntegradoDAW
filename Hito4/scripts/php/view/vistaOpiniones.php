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

							<li class="nav-item active">
								<a href="./cargarReservas.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Conoce las opiniones de nuestros clientes!">Valoraciones</a>
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
						<a href="./setUsuario.php" data-toggle="tooltip" data-html="true" title="¡Hola <?php echo $_SESSION['usuario'];?>!">
							<img src="../../../images/usuario.png" width="50" height="50" id="usuario">
						</a>

						<a href="./cerrarSesion.php" data-toggle="tooltip" data-html="true" title="Cerrar sesión">
							<img src="../../../images/salir.svg" width="50" height="55">
						</a>
						<?php
							}
						?>
					</form>
				</nav>
			</header>

			<?php
				if ($data != null) {
			?>

			<header class="row justify-content-center mt-5 mb-4">
				<form class="form-signin" method="post" action="./cargarValoracionesHotel.php">
					<div class="col-md-12 form-group">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<td class="text-center" colspan="2">
											Conoce todas las valoraciones de usuarios que se han alojado en nuestros hoteles
										</td>
									</tr>

									<tr>
										<td class="text-center" colspan="2">
											Filtra por <b>hotel:</b>
										</td>
									</tr>

									<tr>
										<td>
											<select class="form-control" required>
												<option value="">Selecciona un hotel</option>
												<?php
													foreach ($hoteles as $value) {
												?>

												<option value="<?=$value->getID()?>"><?=$value->getNombre()?></option>

												<?php
													}
												?>
											</select>
										</td>

										<td>
											<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
										</td>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</form>				
			</header>

			<section class="row justify-content-center mt-5">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th scope="col">Hotel</th>
									<th scope="col">Descripción</th>
									<th scope="col">Puntuación (1-5)</th>
									<th scope="col">Fecha</th>
									<th scope="col">Usuario</th>
								</tr>
							</thead>

							<tbody>
								<?php
									foreach ($data as $valoraciones) {
										$data = Hoteles::buscarHotel($valoraciones->getHotelesId());
										$hotel = new Hoteles($data);
								?>

								<tr>
									<td><?=$hotel->getNombre()?></td>
									<td><?=$valoraciones->getDescripcion()?></td>
									<td><?=$valoraciones->getPuntuacion()?></td>
									<td><?=$valoraciones->getFecha()?></td>
									<td><?=$valoraciones->getUsuariosCorreo()?></td>
								</tr>

								<?php
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</section>

			<?php
				} else {
			?>

			<header class="row justify-content-center mt-5 mb-4">
				<h3 class="text-center mt-5">Lo sentimos. Por el momento no hay valoraciones de ninguno de nuestros hoteles.</h3>
			</header>

			<?php
				}
			?>

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

						<form method="post" action="./verificarUsuario.php" class="form-signin" id="inicio">
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

						<form method="post" action="./altaUsuario.php" class="form-signin">
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
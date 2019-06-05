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
		<title>Reservar</title>
		<!-- Favicon -->
		<link rel="shortcut icon" type="favicon/ico" href="../../../images/favicon.ico">

		<!-- CSS principal -->
		<link rel="stylesheet" type="text/css" href="../../../style/main.css">
		<!-- CSS Bootstrap -->
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
								<a href="./vistaReserva.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Haz tu reserva a medida!">Reservar</a>
							</li>

							<li class="nav-item">
								<a href="" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Conoce las opiniones de nuestros clientes!">Valoraciones</a>
							</li>

							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown">Nosotros</a>

								<div class="dropdown-menu">
									<a class="dropdown-item" href="./vistaConocenos.html" data-toggle="tooltip" data-html="true" data-placement="right" title="¡Conoce la historia de Hoteles ESE!">Conócenos</a>
									<a class="dropdown-item" href="./vistaTrabaja.html" data-toggle="tooltip" data-html="true" data-placement="right" title="¡Contáctanos y trabaja con nosotros!">Trabaja con nosotros</a>
								</div>
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
						<a href="../controller/setUsuario.php" data-toggle="tooltip" data-html="true" title="¡Hola <?=$_SESSION['usuario']?>!">
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
			</header>

			<section class="row justify-content-center mt-5">
				<div class="col-md-12">
					<div class="table-responsive">
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

							<tbody>
								<tr>
									<td>
										<div class="form-group">
											<input type="date" id="fecha_entrada" name="fecha_entrada" class="form-control">
										</div>
									</td>

									<td>
										<div class="form-group">
											<input type="date" id="fecha_salida" name="fecha_salida" class="form-control">
										</div>
									</td>

									<td>
										<div class="form-group">
											<input type="number" min="1" id="num_personas" name="num_personas" class="form-control">
										</div>
									</td>

									<td>
										<div class="form-group">
											<input type="text" id="destino" name="destino" class="form-control">
										</div>
									</td>

									<td>
										<div class="form-group">
											<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</section>

			<!-- Ventana modal para hacer login -->
			<section class="modal" id="entrar">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header bg-primary text-white">
							<div class="modal-title">Inicia sesión</div>
							<span data-dismiss="modal" class="cerrarVentana">X</span>
						</div>

						<form method="post" action="../controller/verificarUsuario.php" class="form-signin" id="inicio">
							<div class="modal-body">
								<div class="form-label-group">
									<input type="email" id="inputEmail" name="correo" class="form-control" placeholder="Dirección de correo electrónico" autofocus required>
									<label for="inputEmail"><span class="obligatorio">*</span>Dirección de correo electrónico</label>
								</div>

								<div class="form-label-group">
									<input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
									<label for="password"><span class="obligatorio">*</span>Contraseña</label>
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

						<form method="post" action="../controller/altaUsuario.php" class="form-signin">
							<div class="modal-body">
								<div class="form-label-group">
									<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" autofocus>
									<label for="nombre"><span class="obligatorio">*</span>Nombre</label>
								</div>

								<div class="form-label-group">
									<input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos">
									<label for="apellidos"><span class="obligatorio">*</span>Apellidos</label>
								</div>

								<div class="form-label-group">
									<input type="email" id="inputEmail1" name="correo" class="form-control" placeholder="Dirección de correo electrónico" autofocus required>
									<label for="inputEmail1"><span class="obligatorio">*</span>Dirección de correo electrónico</label>
								</div>

								<div class="form-label-group">
									<input type="password" id="password1" name="password" class="form-control" placeholder="Contraseña">
									<label for="password1"><span class="obligatorio">*</span>Contraseña</label>
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
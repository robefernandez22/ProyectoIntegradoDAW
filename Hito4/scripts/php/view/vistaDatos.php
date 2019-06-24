<!DOCTYPE html>
<html lang="es">

	<head>
		<!-- Etiquetas meta requeridas -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Título de la página -->
		<title>Tus datos</title>
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
			<header class="row mb-3">
				<!-- Menú -->
				<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top col-md-12">
					<!-- Logotipo -->
					<img src="../../../images/logo.jpg" width="120" height="55">

					<!-- Botón que desplegará el menú cuando este no se vea debido al tamaño del dispositivo
					en el que se esté viendo -->
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
						<span class="navbar-toggler-icon"></span>
					</button>

					<!-- Diferentes opciones del menú -->
					<div class="collapse navbar-collapse" id="menu">
						<?php
							if ($usuario->getTipo() == "Administrador") {
						?>

						<ul class="navbar-nav">
							<li class="nav-item">
								<a href="../view/vistaAdmin.php" class="nav-link">Inicio</a>
							</li>

							<li class="nav-item">
								<a href="./cargarReservas.php" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver, modificar o borrar reservas realizadas y/o canceladas">Reservas</a>
							</li>

							<li class="nav-item">
								<a href="./verUsuarios.php" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver, modificar o borrar usuarios">Usuarios</a>
							</li>

							<li class="nav-item">
								<a href="./verHoteles.php" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver, modificar o borrar hoteles">Hoteles</a>
							</li>
						</ul>

						<?php
							} else {
						?>

						<ul class="navbar-nav">
							<li class="nav-item">
								<a href="../../../index.php" class="nav-link">Inicio</a>
							</li>

							<li class="nav-item">
								<a href="./scripts/php/view/vistaReserva.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Haz tu reserva a medida!">Reservar</a>
							</li>

							<li class="nav-item">
								<a href="" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Conoce las valoraciones de nuestros clientes!">Valoraciones</a>
							</li>

							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown">Nosotros</a>

								<div class="dropdown-menu">
									<a class="dropdown-item" href="" data-toggle="tooltip" data-html="true" data-placement="right" title="¡Conoce la historia de Hoteles ESE!">Conócenos</a>
									<a class="dropdown-item" href="" data-toggle="tooltip" data-html="true" data-placement="right" title="¡Contáctanos y trabaja con nosotros!">Trabaja con nosotros</a>
								</div>
							</li>
						</ul>

						<?php
							}
						?>
					</div>

					<a href="./setUsuario.php" data-toggle="tooltip" data-html="true" title="¡Hola <?php echo $_SESSION['usuario'];?>!">
						<img src="../../../images/usuario.png" width="50" height="50" id="usuario">
					</a>

					<a href="../controller/cerrarSesion.php" data-toggle="tooltip" data-html="true" title="Cerrar sesión">
						<img src="../../../images/salir.svg" width="50" height="55">
					</a>
				</nav>
			</header>

			<?php
				if (isset($_GET["actualizacion"])) {
					if ($_GET["actualizacion"] == 1) {
			?>

			<div class="alert alert-success text-center mt-5" role="alert">
				<strong>¡Bien!</strong> Datos actualizados correctamente.
				<a href="./delVariable.php?controlador=./setUsuario.php?id=<?=base64_encode($_SESSION['usuario'])?>" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					} else {
			?>

			<div class="alert alert-warning text-center mt-5" role="alert">
				<strong>Vaya...</strong> No has actualizado ningún dato.
				<a href="./delVariable.php?controlador=./setUsuario.php?id=<?=base64_encode($_SESSION['usuario'])?>" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					}
				} elseif (isset($_GET["reserva"])) {
					if ($_GET["reserva"] == 1) {
			?>

			<!-- MOSTRAMOS QUE LA RESERVA SE HIZO CORRECTAMENTE -->

			<?php
					} else {
			?>

			<!-- MOSTRAMOS QUE HUBO ALGÚN PROBLEMA AL HACER LA RESERVA -->

			<?php
					}
				}
			?>			

			<section class="row justify-content-center mt-5">
				<div class="col-md-12">

					<header class="row justify-content-center">
						<h3 class="text-center mt-5">Tus datos</h3>
					</header>
					
					<form class="form-signin" method="post" action="./setDatos.php">
						<input type="hidden" name="redireccion" value="vistaDatos.php">
						<div class="form-label-group">
							<input type="email" id="correo" name="correo" class="form-control-plaintext" placeholder="Correo electrónico" value="<?=$usuario->getCorreo()?>" readonly>
							<label for="correo">Correo electrónico</label>
						</div>

						<div class="form-label-group">
							<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" value="<?=$usuario->getNombre()?>">
							<label for="nombre"><span class="obligatorio">*</span> Nombre</label>
						</div>

						<div class="form-label-group">
							<input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos" value="<?=$usuario->getApellidos()?>">
							<label for="apellidos"><span class="obligatorio">*</span> Apellidos</label>
						</div>

						<div class="form-group">
							<a href="./setPassword.php?id=<?=base64_encode($usuario->getCorreo())?>&controlador=setUsuario.php">Cambiar contraseña</a>
						</div>

						<div class="form-group">
							<input type="submit" name="setDatos" class="btn btn-success" value="Guardar">
						</div>
					</form>
				</div>

				<div class="col-md-12">
					<header class="row justify-content-center">
						<h3 class="text-center mt-5">Tus reservas</h3>
					</header>

					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Hotel</th>
									<th>Fecha de Reserva</th>
									<th>Fecha de Entrada</th>
									<th>Fecha de Salida</th>
									<th colspan="2">Opciones</th>
								</tr>
							</thead>

							<tbody>
								<?php
									foreach ($datos as $reservas) {
								?>

								<tr>
									<td>
										<?=$reservas->getNombreHotel()?>
									</td>
									<td>
										<?=$reservas->getFechaReserva()?>
									</td>
									<td>
										<?=$reservas->getFechaEntrada()?>
									</td>
									<td>
										<?=$reservas->getFechaSalida()?>
									</td>
									<td>
										<a href="detallesReserva.php&id=<?=$reservas->getId()?>">Más detalles</a>
									</td>
									<td>
										<input class="btn btn-warning btn-sm mr-2 text-left" data-toggle="modal" data-target="cancelar" type="button" value="Cancelar">
									</td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</section>
		</main>
	</body>
</html>
<!DOCTYPE html>
<html lang="es">

	<head>
		<!-- Etiquetas meta requeridas -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Título de la página -->
		<title>Administración - Reservas</title>
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
						<ul class="navbar-nav">
							<li class="nav-item">
								<a href="../view/vistaAdmin.php" class="nav-link">Inicio</a>
							</li>

							<li class="nav-item active">
								<a href="" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver, modificar o borrar reservas realizadas y/o canceladas">Reservas</a>
							</li>

							<li class="nav-item">
								<a href="../controller/verUsuarios.php" class="nav-link" data-toggle="tooltip" data-html="true" title="Crea, busca, elimina y modifica usuarios">Usuarios</a>
							</li>

							<li class="nav-item">
								<a href="./verHoteles.php" class="nav-link" data-toggle="tooltip" data-html="true" title="Crea, busca, elimina y modifica usuarios">Hoteles</a>
							</li>
						</ul>
					</div>

					<a href="./setUsuario.php" data-toggle="tooltip" data-html="true" title="¡Hola <?php echo $_SESSION['usuario'];?>!">
						<img src="../../../images/usuario.png" width="50" height="50" id="usuario">
					</a>

					<a href="./cerrarSesion.php" data-toggle="tooltip" data-html="true" title="Cerrar sesión">
						<img src="../../../images/salir.svg" width="50" height="55">
					</a>
				</nav>
			</header>

			<?php
				if ($data != null) {
			?>

			<header class="row justify-content-center mt-5 mb-4">
				<div class="col-md-12">
					<h3 class="text-center mt-5">Crea, elimina y modifica reservas</h3>

					<div class="row">
						<div class="col-md-6">
							<form class="form-signin">
								<div class="form-group">
									<p class="text-center"><b>Filtra</b> con un <b>correo u hotel:</b></p>
									<input type="text" class="form-control filtro" autofocus>
								</div>
							</form>
						</div>

						<div class="col-md-6">
							<form class="form-signin">
								<div class="form-group">
									<p class="text-center"><b>Filtra</b> introduciendo cualquier <b>fecha:</b></p>
									<input type="date" class="form-control filtro">
								</div>
							</form>
						</div>
					</div>
				</div>
			</header>

			<section class="row justify-content-center mt-5">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th scope="col">Usuario</th>
									<th scope="col">Hotel</th>
									<th scope="col">Fecha de reserva</th>
									<th scope="col">Fecha de entrada</th>
									<th scope="col">Fecha de salida</th>
									<th scope="col" colspan="2">Opciones</th>
								</tr>
							</thead>

							<tbody class="contenidobusqueda">
							<?php
								foreach ($data as $reservas) {
							?>
								<tr>
									<td>
										<?=$reservas->getUsuariosCorreo()?>
									</td>
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
										<a href="">
											<input class="btn btn-warning btn-sm mr-2 text-left" data-toggle="modal" data-target="#modificar" type="button" value="Modificar">
										</a>
									</td>
									<td>
										<input class="btn btn-danger btn-sm mr-2 text-left" data-toggle="modal" data-target="#eliminar" type="button" value="Eliminar">
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

			<?php
				} else {
			?>

			<header class="row justify-content-center mt-5 mb-4">
				<h3 class="text-center mt-5">No hay reservas por el momento.</h3>
			</header>

			<?php
				}
			?>

			<!-- Ventana modal para eliminar usuarios -->
			<section class="modal" id="eliminar">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header bg-danger text-white">
							<div class="modal-title">Eliminar reserva</div>
							<span data-dismiss="modal">X</span>
						</div>

						<form method="post" action="./eliminarReserva.php" class="form-signin" id="accion">
							<input type="hidden" class="identificador" name="correo" value="">
							<div class="modal-body">
								<div class="form-label-group">
									<p>¿Está seguro de que desea eliminar la reserva?</p>
								</div>
							</div>

							<div class="modal-footer">
								<input type="button" data-dismiss="modal" class="btn btn-primary" value="Cancelar">
								<input type="submit" class="btn btn-danger" value="Eliminar">
							</div>
						</form>
					</div>
				</div>
			</section>
		</main>
	</body>
</html>
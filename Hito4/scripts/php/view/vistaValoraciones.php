<!DOCTYPE html>
<html lang="es">

	<head>
		<!-- Etiquetas meta requeridas -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Título de la página -->
		<title>Administración - Valoraciones</title>
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
				if (isset($_GET["actualizacion"])) {
					if ($_GET["actualizacion"] == 1) {
			?>

			<div class="alert alert-success text-center mt-5" role="alert">
				<strong>¡Bien!</strong> La valoración se ha eliminado correctamente.
				<a href="./delVariable.php?controlador=./cargarValoraciones.php?idHotel=<?=base64_encode($hotel->getId())?>" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					} else {
			?>

			<div class="alert alert-warning text-center mt-5" role="alert">
				<strong>Vaya...</strong> La valoración no se ha podido eliminar, ponte en contacto con el administrador de la base de datos.
				<a href="./delVariable.php?controlador=./cargarValoraciones.php?idHotel=<?=base64_encode($hotel->getId())?>" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					}
				}
			?>

			<header class="row justify-content-center mt-5 mb-4">
				<div class="col-md-12">
					<h3 class="text-center mt-5">Valoraciones del hotel <b><?=$hotel->getNombre()?></b></h3>

					<div class="row">
						<div class="col-md-6">
							<form class="form-signin">
								<div class="form-group">
									<p class="text-center"><b>Filtra</b> con un <b>usuario o descripción:</b></p>
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
								<?php
									if ($data != null) {
								?>

								<th scope="col">Descripción</th>
								<th scope="col">Puntuación</th>
								<th scope="col">Fecha</th>
								<th scope="col">Usuario</th>
								<th scope="col">Opción</th>

								<?php
									} else {
								?>
									<p class='text-center'>No hay valoraciones del hotel <b><?=$hotel->getNombre()?></b> por el momento.</p>
								<?php
									}
								?>
							</tr>
						</thead>

						<tbody class="contenidobusqueda">

							<?php
								foreach ($data as $valoraciones) {
							?>

							<tr>
								<input type="hidden" value="<?=$valoraciones->getId()?>" class="identificador">
								<td><?=$valoraciones->getDescripcion()?></td>
								<td><?=$valoraciones->getPuntuacion()?></td>
								<td><?=$valoraciones->getFecha()?></td>
								<td><?=$valoraciones->getUsuariosCorreo()?></td>
								<td><input class="btn btn-danger btn-sm mr-2 text-left" data-toggle="modal" data-target="#eliminar" type="button" value="Eliminar"></td>
							</tr>

							<?php
								}
							?>
						</tbody>
					</table>
				</div>
			</section>

			<!-- Ventana modal para eliminar valoraciones -->
			<section class="modal" id="eliminar">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header bg-danger text-white">
							<div class="modal-title">Eliminar valoración</div>
							<span data-dismiss="modal">X</span>
						</div>

						<form method="post" action="./eliminarValoracion.php" class="form-signin" id="accion">
							<input type="hidden" class="identificador" name="idValoracion" value="">
							<div class="modal-body">
								<div class="form-label-group">
									<p>¿Está seguro de que desea eliminar la valoración?</p>
								</div>
							</div>

							<div class="modal-footer">
								<input type="button" data-dismiss="modal" class="btn btn-primary" value="Cancelar">
								<input type="submit" class="btn btn-danger" value="Eliminar">
							</div>
							<input type="hidden" name="idHotel" value="<?=base64_encode($hotel->getId())?>">
						</form>
					</div>
				</div>
			</section>
		</main>
	</body>
</html>
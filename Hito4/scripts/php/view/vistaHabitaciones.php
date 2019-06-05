<!DOCTYPE html>
<html lang="es">

	<head>
		<!-- Etiquetas meta requeridas -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Título de la página -->
		<title>Administración - Habitaciones</title>
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
								<a href="" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver, modificar o borrar reservas realizadas y/o canceladas">Reservas</a>
							</li>

							<li class="nav-item">
								<a href="../controller/verUsuarios.php" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver, modificar o borrar usuarios">Usuarios</a>
							</li>

							<li class="nav-item active">
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
				if (isset($_GET["deleteRoom"])) {
					if ($_GET["deleteRoom"] == 1) {
			?>

			<div class="alert alert-success text-center mt-5" role="alert">
				<strong>¡Bien!</strong> Habitación eliminada correctamente.
				<a href="./delVariable.php?controlador=./verHabitaciones.php?idHotel=<?=base64_encode($hotel->getId())?>&variable=deleteRoom" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					} else {
			?>

			<div class="alert alert-warning text-center mt-5" role="alert">
				<strong>Vaya...</strong> La habitación no se ha podido eliminar, consulte con el administrador de la base de datos.
				<a href="./delVariable.php?controlador=./verHabitaciones.php?idHotel=<?=base64_encode($hotel->getId())?>&variable=deleteRoom" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					}
				} elseif (isset($_GET["actualizacion"])) {
					if ($_GET["actualizacion"] == 1) {
			?>

			<div class="alert alert-success text-center mt-5" role="alert">
				<strong>¡Bien!</strong> Habitación actualizada correctamente.
				<a href="./delVariable.php?controlador=./verHabitaciones.php?idHotel=<?=base64_encode($hotel->getId())?>&variable=actualizacion" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					} else {
			?>

			<div class="alert alert-warning text-center mt-5" role="alert">
				<strong>Vaya...</strong> No has modificado ningún dato.
				<a href="./delVariable.php?controlador=./verHabitaciones.php?idHotel=<?=base64_encode($hotel->getId())?>&variable=actualizacion" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					}
				}
			?>

			<header class="row justify-content-center mt-5">
				<h3 class="text-center text-capitalize mt-5">Habitaciones del hotel <b><?=$hotel->getNombre()?></b></h3>
			</header>

			<section class="row justify-content-center mt-5">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
								<th scope="col">
									<input class="btn btn-primary btn-sm mr-2 text-left" data-toggle="modal" data-target="#aniadir" type="button" value="Añadir">
								</th>

								<?php
									if (isset($data) && $data != null) {
								?>

								<th scope="col">Descripción</th>
								<th scope="col">Precio/Noche</th>
								<th scope="col">Número de habitación</th>
								<th scope="col">Número de planta</th>
								<th scope="col" colspan="2">Opciones</th>

								<?php
									} else {
										echo "<p class='text-center'>No hay habitaciones en este hotel por el momento.</p>";
									}
								?>
							</tr>
						</thead>

						<tbody>

							<?php
								if (isset($data)) {
									foreach ($data as $habitaciones) {
							?>

							<tr>
								<input type="hidden" name="id" class="identificador" value="<?=$habitaciones->getId()?>">
								<td></td>
								<td><?=$habitaciones->getDescripcion()?></td>
								<td><?=$habitaciones->getPrecioNoche()?></td>
								<td><?=$habitaciones->getNumHabitacion()?></td>
								<td><?=$habitaciones->getNumPlanta()?></td>
								<td>
									<a href="./buscarHabitacion.php?idHabitacion=<?=base64_encode($habitaciones->getId())?>">
										<input class="btn btn-warning btn-sm mr-2 text-left" data-toggle="modal" data-target="#modificar" type="button" value="Modificar">
									</a>
								</td>
								<td><input class="btn btn-danger btn-sm mr-2 text-left" data-toggle="modal" data-target="#eliminar" type="button" value="Eliminar"></td>
							</tr>

							<?php
									}
								}
							?>
						</tbody>
					</table>
				</div>
			</section>

			<!-- Ventana modal para eliminar habitaciones -->
			<section class="modal" id="eliminar">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header bg-danger text-white">
							<div class="modal-title">Eliminar habitación</div>
							<span data-dismiss="modal">X</span>
						</div>

						<form method="post" action="./eliminarHabitacion.php" class="form-signin" id="accion">
							<input type="hidden" class="identificador" name="id" value="">
							<input type="hidden" name="hotelId" value="<?=$habitaciones->getHotelId()?>">
							<div class="modal-body">
								<div class="form-label-group">
									<p>¿Está seguro/a de que desea eliminar la habitación?</p>
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

			<!-- Ventana modal para añadir habitaciones -->
			<section class="modal" id="aniadir">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header bg-primary text-white">
							<div class="modal-title">Añadir habitación</div>
							<span data-dismiss="modal">X</span>
						</div>

						<form method="post" action="./altaHabitacion.php" class="form-signin">
							<input type="hidden" name="hotelId" value="<?=$habitaciones->getHotelId()?>">
							<div class="modal-body">
								<div class="form-group">
									<label for="descripcion">Descripción</label>
									<select multiple class="form-control" id="descripcion" name="descripcion">
										<option value="Individual">Individual</option>
										<option value="Doble">Doble</option>
										<option value="Familiar">Familiar</option>
									</select>
								</div>

								<div class="form-label-group">
									<input type="number" id="numHabitacion" name="numHabitacion" class="form-control" placeholder="Número de la habitación" min="1" required>
									<label for="numHabitacion"><span class="obligatorio">*</span>Número de la habitación</label>
								</div>

								<div class="form-label-group">
									<input type="number" id="numPlanta" name="numPlanta" class="form-control" placeholder="Planta en la que se encuentra la habitación" required>
									<label for="numPlanta"><span class="obligatorio">*</span>Planta en la que se encuentra la habitación</label>
								</div>

								<div class="form-label-group">
									<input type="number" id="precioNoche" name="precioNoche" class="form-control" placeholder="Precio de cada noche" min="1" required>
									<label for="precioNoche"><span class="obligatorio">*</span>Precio de cada noche</label>
								</div>

								<div class="form-check">
									<input type="checkbox" class="form-check-input" value="television" name="television" id="television">
									<label class="form-check-label" for="television">Televisión</label>
								</div>

								<div class="form-check">
									<input type="checkbox" class="form-check-input" value="vistas" name="vistas" id="vistas">
									<label class="form-check-label" for="vistas">Vistas</label>
								</div>
							</div>

							<div class="modal-footer text-right">
								<input type="submit" name="registro" class="btn btn-primary" value="Añadir">
							</div>
						</form>
					</div>
				</div>
			</section>
		</main>
	</body>
</html>
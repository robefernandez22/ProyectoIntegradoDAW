<!DOCTYPE html>
<html lang="es">

	<head>
		<!-- Etiquetas meta requeridas -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Título de la página -->
		<title>Administración - Hoteles</title>
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

		<style>
			body {
				display: -ms-flexbox;
				display: -webkit-box;
				display: flex;
				-ms-flex-align: center;
				-ms-flex-pack: center;
				-webkit-box-align: center;
				align-items: center;
				-webkit-box-pack: center;
				justify-content: center;
				padding-top: 40px;
				padding-bottom: 40px;
			}
		</style>
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
								<a href="./cargarReservas.php" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver y eliminar reservas">Reservas</a>
							</li>

							<li class="nav-item">
								<a href="./verUsuarios.php" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver, añadir, modificar y eliminar usuarios">Usuarios</a>
							</li>

							<li class="nav-item active">
								<a href="./verHoteles.php" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver, añadir, modificar y eliminar hoteles">Hoteles</a>
							</li>

							<li class="nav-item">
								<a href="./peticionesController.php" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver y eliminar peticiones">Peticiones</a>
							</li>
						</ul>
					</div>

					<a href="./setUsuario.php?admin" data-toggle="tooltip" data-html="true" title="¡Hola <?php echo $_SESSION['usuario'];?>!">
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
				<strong>¡Bien!</strong> Hotel eliminado correctamente.
				<a href="./delVariable.php?controlador=./verHoteles.php" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					} else {
			?>

			<div class="alert alert-warning text-center mt-5" role="alert">
				<strong>El hotel no se puede eliminar.</strong> El hotel tiene habitaciones con reservas asociadas.
				<a href="./delVariable.php?controlador=./verHoteles.php" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					}
				} elseif (isset($_GET["insercion"])) {
					if ($_GET["insercion"] == 1) {
			?>

			<div class="alert alert-success text-center mt-5" role="alert">
				<strong>¡Bien!</strong> Hotel añadido correctamente.
				<a href="./delVariable.php?controlador=./verHoteles.php" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					} else {
			?>

			<div class="alert alert-warning text-center mt-5" role="alert">
				<strong>Vaya...</strong> El hotel no se ha podido añadir.
				<a href="./delVariable.php?controlador=./verHoteles.php" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					}
				}
			?>

			<header class="row justify-content-center mt-5 mb-4">
				<div class="col-md-12">
					<h3 class="text-center mt-5">Crea, elimina y modifica hoteles</h3>

					<form class="form-signin">
						<div class="form-group">
							<p class="text-center"><b>Filtra</b> con un <b>nombre, una ciudad o dirección</b></p>
							<input type="text" class="form-control filtro" autofocus>
						</div>
					</form>
				</div>
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
									if ($data != null) {
								?>

								<th scope="col">Nombre</th>
								<th scope="col">Habitaciones</th>
								<th scope="col">Ciudad</th>
								<th scope="col">Dirección</th>
								<th scope="col" colspan="4">Opciones</th>

								<?php
									} else {
										echo "<p class='text-center'>No hay hoteles por el momento.</p>";
									}
								?>
							</tr>
						</thead>

						<tbody class="contenidobusqueda">

							<?php
								foreach ($data as $hoteles) {
							?>

							<tr>
								<input type="hidden" name="nombre" class="valor" value="<?=$hoteles->getNombre()?>">
								<input type="hidden" name="id" class="identificador" value="<?=$hoteles->getId()?>">
								<td></td>
								<td><?=$hoteles->getNombre()?></td>
								<td>
									<a href="./verHabitaciones.php?idHotel=<?=base64_encode($hoteles->getId())?>">
										<?=$hoteles->getHabitaciones()?>
									</a>
								</td>
								<td><?=$hoteles->getCiudad()?></td>
								<td><?=$hoteles->getDireccion()?></td>
								<td>
									<a href="./buscarHotel.php?id=<?=base64_encode($hoteles->getId())?>">
										<input class="btn btn-warning btn-sm mr-2 text-left" data-toggle="modal" data-target="#modificar" type="button" value="Modificar">
									</a>
								</td>
								<td>
									<input class="btn btn-danger btn-sm mr-2 text-left" data-toggle="modal" data-target="#eliminar" type="button" value="Eliminar">
								</td>
								<td>
									<a href="./cargarValoraciones.php?idHotel=<?=base64_encode($hoteles->getId())?>">Valoraciones</a>
								</td>
								<td>
									<a href="./pensionesController.php?idHotel=<?=base64_encode($hoteles->getId())?>">Pensiones</a>
								</td>
							</tr>

							<?php
								}
							?>
						</tbody>
					</table>
				</div>
			</section>

			<!-- Ventana modal para eliminar hoteles -->
			<section class="modal" id="eliminar">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header bg-danger text-white">
							<div class="modal-title">Eliminar hotel</div>
							<span data-dismiss="modal">X</span>
						</div>

						<form method="post" action="./eliminarHotel.php" class="form-signin" id="accion">
							<input type="hidden" class="identificador" name="id" value="">
							<div class="modal-body">
								<div class="form-label-group">
									<p>¿Está seguro de que desea eliminar el hotel <b><span class="valor"></span></b>?</p>
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

			<!-- Ventana modal para añadir hoteles -->
			<section class="modal" id="aniadir">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header bg-primary text-white">
							<div class="modal-title">Añadir hotel</div>
							<span data-dismiss="modal">X</span>
						</div>

						<form method="post" action="./altaHotel.php" class="form-signin">
							<div class="modal-body">
								<div class="form-label-group">
									<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" autofocus required>
									<label for="nombre"><span class="obligatorio">*</span> Nombre</label>
								</div>

								<div class="form-label-group">
									<textarea id="descripcion" name="descripcion" class="form-control" placeholder="Descripción" required></textarea>
								</div>

								<div class="form-label-group">
									<input type="text" id="ciudad" name="ciudad" class="form-control" placeholder="Ciudad del hotel" autofocus required>
									<label for="ciudad"><span class="obligatorio">*</span> Ciudad del hotel</label>
								</div>

								<div class="form-label-group">
									<input type="text" id="calle" name="calle" class="form-control" placeholder="Calle del hotel" required>
									<label for="calle"><span class="obligatorio">*</span> Calle del hotel</label>
								</div>

								<div class="form-label-group">
									<input type="number" min="1" id="numero" name="numero" class="form-control" placeholder="Número de la calle del hotel" required>
									<label for="numero"><span class="obligatorio">*</span> Número de la calle del hotel</label>
								</div>

								<div class="form-label-group">
									<input type="number" min="1" id="codPostal" name="codPostal" class="form-control" placeholder="Código postal" required>
									<label for="codPostal"><span class="obligatorio">*</span> Código postal</label>
								</div>

								<div class="form-label-group">
									<input type="number" min="1" max="5" id="estrellas" name="estrellas" class="form-control" placeholder="Estrellas" required>
									<label for="estrellas"><span class="obligatorio">*</span> Estrellas</label>
								</div>

								<div class="form-label-group">
									<div class="form-check">
										<input type="checkbox" class="form-check-input" value="garaje" name="garaje" id="garaje">
										<label class="form-check-label" for="garaje">Garaje</label>
									</div>

									<div class="form-check">
										<input type="checkbox" class="form-check-input" value="piscina" name="piscina" id="piscina">
										<label class="form-check-label" for="piscina">Piscina</label>
									</div>

									<div class="form-check">
										<input type="checkbox" class="form-check-input" value="aire" name="aire" id="aire">
										<label class="form-check-label" for="aire">Aire Acondicionado</label>
									</div>

									<div class="form-check">
										<input type="checkbox" class="form-check-input" value="wifi" name="wifi" id="wifi">
										<label class="form-check-label" for="wifi">Wi-Fi</label>
									</div>
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
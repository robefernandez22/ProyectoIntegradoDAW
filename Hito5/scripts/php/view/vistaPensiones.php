<!DOCTYPE html>
<html lang="es">

	<head>
		<!-- Etiquetas meta requeridas -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Título de la página -->
		<title>Administración - Pensiones</title>
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

							<li class="nav-item">
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
				if (isset($_GET["setPension"])) {
					if ($_GET["setPension"] == 1) {
			?>

			<div class="alert alert-success text-center mt-5" role="alert">
				<strong>¡Bien!</strong> Pensión actualizada correctamente.
				<a href="./delVariable.php?controlador=./pensionesController.php?idHotel=<?=$_GET['idHotel']?>&variable=setPension" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					} else {

			?>

			<div class="alert alert-warning text-center mt-5" role="alert">
				<strong>¡Vaya!</strong> No has actualizado ningún dato.
				<a href="./delVariable.php?controlador=./pensionesController.php?idHotel=<?=$_GET['idHotel']?>&variable=setPension" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					}
				} elseif (isset($_GET["crearPension"])) {
					if ($_GET["crearPension"] == 1) {
			?>

			<div class="alert alert-success text-center mt-5" role="alert">
				<strong>¡Bien!</strong> Pensión añadida correctamente.
				<a href="./delVariable.php?controlador=./pensionesController.php?idHotel=<?=$_GET['idHotel']?>&variable=crearPension" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					}
				}
			?>

			<header class="row justify-content-center mt-5 mb-4">
				<div class="col-md-12">
					<h3 class="text-center mt-5">Modifica las pensiones del hotel <b><?=$hotel->getNombre()?></b></h3>
				</div>
			</header>

			<section class="row justify-content-center mt-5">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<?php
										if ($pensionesHotel == null) {
									?>

									<th scope="col">
										<input class="btn btn-primary btn-sm mr-2 text-left" data-toggle="modal" data-target="#aniadir" type="button" value="Añadir">
									</th>

									<?php
											echo "<p class='text-center'>No hay pensiones en el hotel " . $hotel->getNombre() . " por el momento.</p>";
										} else {
									?>

									<th scope="col">Descripción</th>
									<th scope="col">Precio(€)</th>
									<th scope="col"></th>

									<?php
										}
									?>
								</tr>
							</thead>

							<tbody class="contenidobusqueda">
							<?php
								foreach ($pensionesHotel as $pension) {
							?>
								<tr>
									<form class="form-signin" method="post" action="./pensionesController.php">
										<input type="hidden" name="idPension" value="<?=$pension["id"]?>">
										<input type="hidden" name="idHotel" value="<?=$pension["hoteles_id"]?>">
										<td>
											<?=$pension["descripcion"]?>
										</td>
										<td>
											<div class="form-group">
												<input type="number" min="1" name="precio" class="form-control" value="<?=$pension["precio"]?>">
											</div>
										</td>
										<td>
											<input type="submit" class="btn btn-warning btn-sm mr-2 text-left" value="Modificar">
										</td>
									</form>
								</tr>
							<?php
								}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</section>

			<!-- Ventana modal para añadir usuario -->
			<section class="modal" id="aniadir">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header bg-primary text-white">
							<div class="modal-title">Añadir pensión al hotel <?=$hotel->getNombre()?></div>
							<span data-dismiss="modal">X</span>
						</div>

						<form method="post" action="./pensionesController.php" class="form-signin">
							<input type="hidden" name="crearPension">
							<input type="hidden" name="idHotel" value="<?=$hotel->getId()?>">
							<div class="modal-body">
								<div class="form-group">
									<label for="descripcion"><span class="obligatorio">*</span> Descripción</label>
									<input type="text" id="descripcion" name="descripcion" class="form-control" autofocus required>
								</div>

								<div class="form-group">
									<label for="precio"><span class="obligatorio">*</span> Precio</label>
									<input type="number" min="1" id="precio" name="precio" class="form-control" required>
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
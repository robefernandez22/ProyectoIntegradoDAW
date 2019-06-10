<!DOCTYPE html>
<html lang="es">

	<head>
		<!-- Etiquetas meta requeridas -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Título de la página -->
		<title>Administración - Habitación</title>
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
						<ul class="navbar-nav">
							<li class="nav-item">
								<a href="../view/vistaAdmin.php" class="nav-link">Inicio</a>
							</li>

							<li class="nav-item">
								<a href="./verReservas.php" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver, modificar o borrar reservas realizadas y/o canceladas">Reservas</a>
							</li>

							<li class="nav-item">
								<a href="./verUsuarios.php" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver, modificar o borrar usuarios">Usuarios</a>
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
				if (isset($_GET["actualizacion"])) {
					if ($_GET["actualizacion"] == 1) {
			?>

			<div class="alert alert-success text-center mt-5" role="alert">
				<strong>¡Bien!</strong> Habitación actualizada correctamente.
				<a href="./delVariable.php?controlador=./verHabitaciones.php?idHotel=<?=base64_encode($hotel->getId())?>&variable=actualizacion" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					} elseif($_GET["actualizacion"] == 0) {
			?>

			<div class="alert alert-warning text-center mt-5" role="alert">
				<strong>Vaya...</strong> No has modificado ningún dato.
				<a href="./delVariable.php?controlador=./verHabitaciones.php?idHotel=<?=base64_encode($hotel->getId())?>&variable=actualizacion" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					} elseif($_GET["actualizacion"] == -1) {
			?>

			<div class="alert alert-warning text-center mt-5" role="alert">
				<strong>Vaya...</strong> La habitación no se ha podido modificar. Ya existe una habitación con el mismo número.
				<a href="./delVariable.php?controlador=./verHabitaciones.php?idHotel=<?=base64_encode($hotel->getId())?>&variable=actualizacion" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					}
				}
			?>

			<header class="row justify-content-center">
				<h1 class="text-center mt-5">Modificando habitación</h1>
			</header>

			<form method="post" action="./setHabitacion.php" enctype="multipart/form-data">
				<section class="row justify-content-center mt-5">
					<div class="col-md-4">
						<div class="list-group">
							<a class="list-group-item list-group-item-action active" data-toggle="list" data-target="#descripcion">Descripción</a>
							<a class="list-group-item list-group-item-action" data-toggle="list" data-target="#numHabitacion">Número de habitación</a>
							<a class="list-group-item list-group-item-action" data-toggle="list" data-target="#numPlanta">Número de planta</a>
							<a class="list-group-item list-group-item-action" data-toggle="list" data-target="#precioNoche">Precio de cada noche</a>
							<a class="list-group-item list-group-item-action" data-toggle="list" data-target="#extras">Extras</a>
							<a class="list-group-item list-group-item-action" data-toggle="list" data-target="#imagenes">Imágenes</a>
						</div>
					</div>

					<div class="col-md-4">
						<div class="tab-content">
							<div class="tab-pane fade show active" id="descripcion">
								<div class="form-group">
									<label for="descripcion">Descripción:</label>
									<select multiple class="form-control" id="descripcion" name="descripcion">
										<option value="Individual" <?php if($habitacion->getDescripcion() == "Individual"){echo "selected";}?>>Individual</option>
										<option value="Doble" <?php if($habitacion->getDescripcion() == "Doble"){echo "selected";}?>>Doble</option>
										<option value="Familiar" <?php if($habitacion->getDescripcion() == "Familiar"){echo "selected";}?>>Familiar</option>
									</select>
								</div>
							</div>

							<div class="tab-pane fade show" id="numHabitacion">
								<div class="form-label-group">
									<input type="number" id="numHabitacion" name="numHabitacion" class="form-control" placeholder="Número de habitación" value="<?php echo $habitacion->getNumHabitacion();?>">
									<label for="numHabitacion"><span class="obligatorio">*</span> Número de habitación</label>
								</div>
							</div>

							<div class="tab-pane fade show" id="numPlanta">
								<div class="form-label-group">
									<input type="number" id="numPlanta" name="numPlanta" class="form-control" value="<?php echo $habitacion->getNumPlanta();?>">
									<label for="numPlanta"><span class="obligatorio">*</span> Número de planta</label>
								</div>
							</div>

							<div class="tab-pane fade show" id="precioNoche">
								<div class="form-label-group">
									<input type="number" id="precioNoche" name="precioNoche" class="form-control" value="<?php echo $habitacion->getPrecioNoche();?>">
									<label for="precioNoche"><span class="obligatorio">*</span> Precio de cada noche</label>
								</div>
							</div>

							<div class="tab-pane fade show" id="extras">
								<label>Extras:</label>
								<div class="form-label-group">
									<div class="form-check">
										<input type="checkbox" class="form-check-input" value="television" name="television" id="television" <?php if($habitacion->getTelevision() == "S"){echo "checked";}?>>
										<label class="form-check-label" for="television">Televisión</label>
									</div>

									<div class="form-check">
										<input type="checkbox" class="form-check-input" value="vistas" name="vistas" id="vistas" <?php if($habitacion->getVistas() == "S"){echo "checked";}?>>
										<label class="form-check-label" for="vistas">Vistas</label>
									</div>

									<div class="form-check">
										<input type="checkbox" class="form-check-input" value="aire" name="aire" id="aire" <?php if($habitacion->getAire() == "S"){echo "checked";}?>>
										<label class="form-check-label" for="aire">Aire Acondicionado</label>
									</div>
								</div>
							</div>

							<div class="tab-pane fade show" id="imagenes">
								<div class="form-group">
									<label for="imagen">Añade imágenes a la habitación</label>
									<input type="file" id="imagen" name="imagen" class="form-control-file">
								</div>

								<div class="row" id="galeria">
									<?php
										if ($habitacion->getImagenes() == null) {
									?>

									<strong><p class="text-center">La habitación no tiene imágenes por el momento.</p></strong>

									<?php
										} else {
											foreach ($habitacion->getImagenes() as $key => $image) {
									?>

									<div class="col-md-2">
										<a class="image" href="<?=$image['img_path']?>">
											<img src="<?=$image['img_path']?>" width="70" height="70">
										</a>
										<a href="./deleteImage.php?idImage=<?=base64_encode($image['id'])?>&idHabitacion=<?=base64_encode($habitacion->getId())?>" class="text-center">Eliminar</a>
									</div>
									<?php
											}
										}
									?>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="row justify-content-center mt-5">
					<div class="col-md-8">
						<input type="submit" name="setDatos" class="btn btn-primary" value="Guardar">
						<a href="./verHabitaciones.php?idHotel=<?=base64_encode($habitacion->getHotelId())?>">
							<input type="button" class="btn btn-warning" value="Cancelar">
						</a>
					</div>
				</section>
				<input type="hidden" name="id" value="<?=$habitacion->getId()?>">
				<input type="hidden" name="hotelId" value="<?=$habitacion->getHotelId()?>">
			</form>
		</main>
	</body>
</html>
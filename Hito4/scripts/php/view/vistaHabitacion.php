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

			<header class="row justify-content-center mt-5">
				<h1 class="text-center text-capitalize mt-5">Editando habitación</h1>
			</header>

			<form method="post" action="./setHabitacion.php" id="setDatos">
				<section class="row justify-content-center mt-5">
					<div class="col-md-4">
						<div class="list-group">
							<a class="list-group-item list-group-item-action active" data-toggle="list" data-target="#descripcion">Descripción</a>
							<a class="list-group-item list-group-item-action" data-toggle="list" data-target="#num_habitacion">Número de habitación</a>
							<a class="list-group-item list-group-item-action" data-toggle="list" data-target="#num_planta">Número de planta</a>
							<a class="list-group-item list-group-item-action" data-toggle="list" data-target="#precio_noche">Precio de cada noche</a>
							<a class="list-group-item list-group-item-action" data-toggle="list" data-target="#extras">Extras</a>
						</div>
					</div>

					<div class="col-md-4">
						<div class="tab-content">
							<div class="tab-pane fade show active" id="descripcion">
								<div class="form-group">
									<label for="descripcion">Descripción</label>
									<select multiple class="form-control" id="descripcion" name="descripcion">
										<option value="Individual" <?php if($habitacion->getDescripcion() == "Individual"){echo "selected";}?>>Individual</option>
										<option value="Doble" <?php if($habitacion->getDescripcion() == "Doble"){echo "selected";}?>>Doble</option>
										<option value="Familiar" <?php if($habitacion->getDescripcion() == "Familiar"){echo "selected";}?>>Familiar</option>
									</select>
								</div>
							</div>

							<div class="tab-pane fade show" id="num_habitacion">
								<div class="form-group">
									<input type="number" name="num_habitacion" class="form-control" value="<?php echo $habitacion->getNumHabitacion();?>">
								</div>
							</div>

							<div class="tab-pane fade show" id="num_planta">
								<div class="form-group">
									<input type="number" name="num_planta" class="form-control" value="<?php echo $habitacion->getNumPlanta();?>">
								</div>
							</div>

							<div class="tab-pane fade show" id="precio_noche">
								<div class="form-group">
									<input type="number" name="precio_noche" class="form-control" value="<?php echo $habitacion->getPrecioNoche();?>">
								</div>
							</div>

							<div class="tab-pane fade show" id="extras">
								<div class="form-label-group">
									<div class="form-check">
										<input type="checkbox" class="form-check-input" value="television" name="television" id="television" <?php if($habitacion->getTelevision() == "S"){echo "checked";}?>>
										<label class="form-check-label" for="television">Televisión</label>
									</div>

									<div class="form-check">
										<input type="checkbox" class="form-check-input" value="vistas" name="vistas" id="vistas" <?php if($habitacion->getVistas() == "S"){echo "checked";}?>>
										<label class="form-check-label" for="vistas">Vistas</label>
									</div>
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
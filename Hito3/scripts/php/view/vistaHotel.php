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

		<!-- Librería jQuery -->
		<script src="../../../lib/jquery-3.4.0.min.js"></script>
		<!-- Popper Script. Librería necesaria para que funcionen los elementos tooltip de Bootstrap -->
		<script src="../../../lib/popper.min.js"></script>
		<!-- Bootstrap Script -->
		<script src="../../../lib/bootstrap.min.js"></script>
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
					<a class="navbar-brand" href="./vistaAdmin.php">
						<img src="../../../images/logo.jpg" width="120" height="55">
					</a>

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

					<a href="./setUsuario.php?id=<?=base64_encode($_SESSION['correoUsuario'])?>" data-toggle="tooltip" data-html="true" title="¡Hola <?php echo $_SESSION['nombreUsuario'];?>!">
						<img src="../../../images/usuario.png" width="50" height="50" id="usuario">
					</a>

					<a href="./cerrarSesion.php" data-toggle="tooltip" data-html="true" title="Cerrar sesión">
						<img src="../../../images/salir.svg" width="50" height="55">
					</a>
				</nav>
			</header>

			<header class="row justify-content-center mt-5">
				<h1 class="text-center text-capitalize mt-5">Hotel <?=$hotel->getNombre()?></h1>
			</header>

			<form method="post" action="./setHotel.php" id="setDatos">
				<section class="row justify-content-center mt-5">
					<div class="col-md-4">
						<div class="list-group">
							<a class="list-group-item list-group-item-action active" data-toggle="list" data-target="#nombre">Nombre</a>
							<a class="list-group-item list-group-item-action" data-toggle="list" data-target="#descripcion">Descripción</a>
							<a class="list-group-item list-group-item-action" data-toggle="list" data-target="#ciudad">Ciudad</a>
							<a class="list-group-item list-group-item-action" data-toggle="list" data-target="#calle">Calle</a>
							<a class="list-group-item list-group-item-action" data-toggle="list" data-target="#numero">Número</a>
							<a class="list-group-item list-group-item-action" data-toggle="list" data-target="#codPostal">Código postal</a>
							<a class="list-group-item list-group-item-action" data-toggle="list" data-target="#estrellas">Estrellas</a>
							<a class="list-group-item list-group-item-action" data-toggle="list" data-target="#extras">Extras</a>
						</div>
					</div>

					<div class="col-md-4">
						<div class="tab-content">
							<div class="tab-pane fade show active" id="nombre">
								<div class="form-group">
									<input type="text" name="nombre" class="form-control" value="<?=$hotel->getNombre()?>">
								</div>
							</div>

							<div class="tab-pane fade show" id="descripcion">
								<div class="form-group">
									<textarea name="descripcion" class="form-control" placeholder="Descripción"><?=$hotel->getDescripcion()?></textarea>
								</div>
							</div>

							<div class="tab-pane fade show" id="ciudad">
								<div class="form-group">
									<input type="text" name="ciudad" class="form-control" value="<?=$hotel->getCiudad()?>">
								</div>
							</div>

							<div class="tab-pane fade show" id="calle">
								<div class="form-group">
									<input type="text" name="calle" class="form-control" value="<?=$hotel->getCalle()?>">
								</div>
							</div>

							<div class="tab-pane fade show" id="numero">
								<div class="form-group">
									<input type="number" name="numero" class="form-control" value="<?=$hotel->getNumero()?>">
								</div>
							</div>

							<div class="tab-pane fade show" id="codPostal">
								<div class="form-group">
									<input type="number" name="codPostal" class="form-control" value="<?=$hotel->getCodPostal()?>">
								</div>
							</div>

							<div class="tab-pane fade show" id="estrellas">
								<div class="form-group">
									<input type="number" name="estrellas" class="form-control" value="<?=$hotel->getEstrellas()?>">
								</div>
							</div>

							<div class="tab-pane fade show" id="extras">
								<div class="form-check">
									<input type="checkbox" class="form-check-input" value="garaje" name="garaje" id="garaje" <?php if($hotel->getGaraje() == "S"){echo "checked";}?>>
									<label class="form-check-label" for="garaje">Garaje</label>
								</div>

								<div class="form-check">
									<input type="checkbox" class="form-check-input" value="piscina" name="piscina" id="piscina" <?php if($hotel->getPiscina() == "S"){echo "checked";}?>>
									<label class="form-check-label" for="piscina">Piscina</label>
								</div>

								<div class="form-check">
									<input type="checkbox" class="form-check-input" value="aire" name="aire" id="aire" <?php if($hotel->getAire() == "S"){echo "checked";}?>>
									<label class="form-check-label" for="aire">Aire Acondicionado</label>
								</div>

								<div class="form-check">
									<input type="checkbox" class="form-check-input" value="wifi" name="wifi" id="wifi" <?php if($hotel->getWifi() == "S"){echo "checked";}?>>
									<label class="form-check-label" for="wifi">Wi-Fi</label>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="row justify-content-center mt-5">
					<div class="col-md-8">
						<input type="submit" name="setDatos" class="btn btn-primary" value="Guardar">
					</div>
				</section>
				<input type="hidden" name="id" value="<?=$hotel->getId()?>">
			</form>
		</main>
	</body>
</html>
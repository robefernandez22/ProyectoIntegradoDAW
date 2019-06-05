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
				<strong>¡Bien!</strong> Datos actualizados correctamente.
				<a href="./delVariable.php?controlador=./buscarHotel.php?id=<?=base64_encode($hotel->getId())?>" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					} else {
			?>

			<div class="alert alert-warning text-center mt-5" role="alert">
				<strong>Vaya...</strong> Los datos no se han podido actualizar, consulta con el administrador de la base de datos.
				<a href="./delVariable.php?controlador=./buscarHotel.php?id=<?=base64_encode($hotel->getId())?>" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					}
				} elseif (isset($_GET["deleteImage"])) {
					if ($_GET["deleteImage"] == 1) {
			?>

			<div class="alert alert-success text-center mt-5" role="alert">
				<strong>¡Bien!</strong> Imagen eliminada correctamente.
				<a href="./delVariable.php?controlador=./buscarHotel.php?id=<?=base64_encode($hotel->getId())?>" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					} else {
			?>

			<div class="alert alert-warning text-center mt-5" role="alert">
				<strong>Vaya...</strong> La imagen no se ha podido eliminar, consulta con el administrador de la base de datos.
				<a href="./delVariable.php?controlador=./buscarHotel.php?id=<?=base64_encode($hotel->getId())?>" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					}
				}
			?>

			<header class="row justify-content-center">
				<h3 class="text-center mt-5">Modificando hotel <strong><?=$hotel->getNombre()?></strong></h3>
			</header>

			<form method="post" action="./setHotel.php" enctype="multipart/form-data">
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
							<a class="list-group-item list-group-item-action" data-toggle="list" data-target="#imagenes">Imágenes</a>
							<input type="submit" name="guardar" value="Guardar" class="btn btn-success">							
						</div>
					</div>

					<div class="col-md-4">
						<div class="tab-content">
							<div class="tab-pane fade show active" id="nombre">
								<div class="form-label-group">
									<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" value="<?=$hotel->getNombre()?>">
									<label for="nombre">Nombre</label>
								</div>
							</div>

							<div class="tab-pane fade show" id="descripcion">
								<div class="form-group">
									<textarea name="descripcion" placeholder="Descripción" class="form-control"><?=$hotel->getDescripcion()?></textarea>
								</div>
							</div>

							<div class="tab-pane fade show" id="ciudad">
								<div class="form-label-group">
									<input type="text" id="ciudad" name="ciudad" class="form-control" placeholder="Ciudad" value="<?=$hotel->getCiudad()?>">
									<label for="ciudad">Ciudad</label>
								</div>
							</div>

							<div class="tab-pane fade show" id="calle">
								<div class="form-label-group">
									<input type="text" id="calle" name="calle" class="form-control" placeholder="Calle" value="<?=$hotel->getCalle()?>">
									<label for="calle">Calle</label>
								</div>
							</div>

							<div class="tab-pane fade show" id="numero">
								<div class="form-label-group">
									<input type="number" id="numero" name="numero" class="form-control" placeholder="Número" value="<?=$hotel->getNumero()?>">
									<label for="numero">Número</label>
								</div>
							</div>

							<div class="tab-pane fade show" id="codPostal">
								<div class="form-label-group">
									<input type="number" id="codPostal" name="codPostal" placeholder="Código Postal" class="form-control" value="<?=$hotel->getCodPostal()?>">
									<label for="codPostal">Código Postal</label>
								</div>
							</div>

							<div class="tab-pane fade show" id="estrellas">
								<div class="form-label-group">
									<input type="number" id="estrellas" name="estrellas" placeholder="Estrellas" class="form-control" value="<?=$hotel->getEstrellas()?>">
									<label for="estrellas">Estrellas</label>
								</div>
							</div>

							<div class="tab-pane fade show" id="extras">
								<div class="form-label-group">
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

							<div class="tab-pane fade show" id="imagenes">
								<div class="form-group">
									<label for="imagen">Añade imágenes al hotel</label>
									<input type="file" id="imagen" name="imagen" class="form-control-file">
								</div>

								<div class="row" id="galeria">
									<?php
										if ($hotel->getImagenes() == null) {
									?>

									<strong><p class="text-center">El hotel no tiene imágenes por el momento.</p></strong>

									<?php
										} else {
											foreach ($hotel->getImagenes() as $key => $image) {
									?>

									<div class="col-md-2">
										<a class="image" href="<?=$image['img_path']?>">
											<img src="<?=$image['img_path']?>" width="70" height="70">
										</a>
										<a href="./deleteImage.php?idImage=<?=base64_encode($image['id'])?>&idHotel=<?=base64_encode($hotel->getId())?>" class="text-center">Eliminar</a>
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
				<input type="hidden" name="id" value="<?=$hotel->getId()?>">
			</form>
		</main>
	</body>
</html>
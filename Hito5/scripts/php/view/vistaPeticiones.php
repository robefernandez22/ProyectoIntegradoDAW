<!DOCTYPE html>
<html lang="es">

	<head>
		<!-- Etiquetas meta requeridas -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Título de la página -->
		<title>Administración - Peticiones</title>
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

							<li class="nav-item active">
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
				if (isset($_GET["eliminarPeticion"])) {
					if ($_GET["eliminarPeticion"] == 1) {
			?>

			<div class="alert alert-success text-center mt-5" role="alert">
				<strong>¡Bien!</strong> Peticion eliminada correctamente.
				<a href="./delVariable.php?controlador=./peticionesController.php" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					} else {
			?>

			<div class="alert alert-warning text-center mt-5" role="alert">
				<strong>Vaya...</strong> La petición no se ha podido eliminar correctamente.
				<a href="./delVariable.php?controlador=./peticionesController.php" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					}
				}
			?>

			<header class="row justify-content-center mt-5 mb-4">
				<div class="col-md-12">
					<h3 class="text-center mt-5">Administra y elimina peticiones</h3>

					<form class="form-signin">
						<div class="form-group">
							<p class="text-center"><b>Filtra</b> por <b>nombre, apellidos, correo o teléfono</b></p>
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
								<?php
									if ($data != null) {
								?>

								<th scope="col">Nombre</th>
								<th scope="col">Apellidos</th>
								<th scope="col">Correo</th>
								<th scope="col">Teléfono</th>
								<th scope="col">Asunto</th>
								<th scope="col"></th>

								<?php
									} else {
										echo "<p class='text-center'>No hay peticiones por el momento.</p>";
									}
								?>
							</tr>
						</thead>

						<tbody class="contenidobusqueda">

							<?php
								foreach ($data as $peticiones) {
							?>

							<tr>
								<input type="hidden" name="id" class="identificador" value="<?=$peticiones->getId()?>">
								<td><?=$peticiones->getNombre()?></td>
								<td><?=$peticiones->getApellidos()?></td>
								<td><?=$peticiones->getCorreo()?></td>
								<td><?=$peticiones->getTelefono()?></td>
								<td><?=$peticiones->getAsunto()?></td>
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
			</section>

			<!-- Ventana modal para eliminar hoteles -->
			<section class="modal" id="eliminar">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header bg-danger text-white">
							<div class="modal-title">Eliminar petición</div>
							<span data-dismiss="modal">X</span>
						</div>

						<form method="post" action="./peticionesController.php" class="form-signin" id="accion">
							<input type="hidden" class="identificador" name="eliminar" value="">
							<div class="modal-body">
								<div class="form-label-group">
									<p>¿Está seguro/a de que desea eliminar la petición seleccionada?</b>?</p>
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
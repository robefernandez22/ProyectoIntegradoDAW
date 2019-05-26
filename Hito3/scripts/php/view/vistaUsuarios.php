<?php
	error_reporting(E_ALL ^ E_NOTICE);
	session_start();
?>

<!DOCTYPE html>
<html lang="es">

	<head>
		<!-- Etiquetas meta requeridas -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Título de la página -->
		<title>Administración - Usuarios</title>
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

		<style>
			th, td {
				padding: 10px;
				text-align: center;
			}

			table {
				margin: auto;
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
					<a class="navbar-brand" href="./vistaUsuarios.php">
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
								<a href="./vistaAdmin.php" class="nav-link">Inicio</a>
							</li>

							<li class="nav-item">
								<a href="" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver, modificar o borrar reservas realizadas y/o canceladas">Reservas</a>
							</li>

							<li class="nav-item active">
								<a href="../controller/verUsuarios.php" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver, modificar o borrar usuarios">Usuarios</a>
							</li>

							<li class="nav-item">
								<a href="" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver, modificar o borrar opiniones">Opiniones</a>
							</li>

							<li class="nav-item">
								<a href="" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver, modificar o borrar hoteles">Hoteles</a>
							</li>
						</ul>
					</div>

					<a href="./vistaDatos.php" data-toggle="tooltip" data-html="true" title="¡Hola <?php echo $_SESSION['nombreUsuario'];?>!">
						<img src="../../../images/usuario.png" width="50" height="50" id="usuario">
					</a>

					<a href="../controller/cerrarSesion.php" data-toggle="tooltip" data-html="true" title="Cerrar sesión">
						<img src="../../../images/salir.svg" width="50" height="55">
					</a>
				</nav>
			</header>

			<header class="row justify-content-center mt-5">
				<input class="btn btn-primary btn-sm mr-2 mt-5 text-left" data-toggle="modal" data-target="#entrar" type="button" value="Añadir Usuario">
				<h3 class="text-center text-capitalize mt-5">Crea, busca, elimina y modifica usuarios</h3>
			</header>

			<section class="row justify-content-center mt-5">
				<div class="col-md-12">
					<table border="1">
						<tr>
							<th>Correo</th>
							<th>Nombre</th>
							<th>Apellidos</th>
							<th colspan="2">Opciones</th>
						</tr>
						<?php
							foreach ($data as $usuarios) {
						?>

						<tr>
							<td><?=$usuarios->getCorreo()?></td>
							<td><?=$usuarios->getNombre()?></td>
							<td><?=$usuarios->getApellidos()?></td>
							<td>Modificar</td>
							<td>Eliminar</td>
						</tr>

						<?php
							}
						?>
					</table>
				</div>
			</section>
		</main>
	</body>
</html>
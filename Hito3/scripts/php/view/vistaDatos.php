<?php
	// error_reporting(E_ALL ^ E_NOTICE);
	session_start();
	require_once "../model/Usuario.php";
	$datos = Usuario::buscarUsuario($_SESSION["correoUsuario"]);
	$usuario = new Usuario($datos);
?>

<!DOCTYPE html>
<html lang="es">

	<head>
		<!-- Etiquetas meta requeridas -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Título de la página -->
		<title>Administración - Tus datos</title>
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
								<a href="./vistaAdmin.php" class="nav-link">Inicio</a>
							</li>

							<li class="nav-item">
								<a href="" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver, modificar o borrar reservas realizadas y/o canceladas">Reservas</a>
							</li>

							<li class="nav-item">
								<a href="../controller/" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver, modificar o borrar usuarios">Usuarios</a>
							</li>

							<li class="nav-item">
								<a href="" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver, modificar o borrar opiniones">Opiniones</a>
							</li>

							<li class="nav-item">
								<a href="" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver, modificar o borrar habitaciones">Habitaciones</a>
							</li>

							<li class="nav-item">
								<a href="" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver, modificar o borrar hoteles">Hoteles</a>
							</li>
						</ul>
					</div>

					<a href="../controller/verDatos.php" data-toggle="tooltip" data-html="true" title="¡Hola <?php echo $_SESSION['nombreUsuario'];?>!">
						<img src="../../../images/usuario.png" width="50" height="50" id="usuario">
					</a>

					<a href="../controller/cerrarSesion.php" data-toggle="tooltip" data-html="true" title="Cerrar sesión">
						<img src="../../../images/salir.svg" width="50" height="55">
					</a>

				</nav>
			</header>

			<header class="row justify-content-center mt-5">
				<h1 class="text-center text-capitalize mt-5">Tus datos personales</h1>
			</header>

			<section class="row justify-content-center mt-5">
				<div class="col-md-4">
					<div class="list-group">
						<a class="list-group-item list-group-item-action active" data-toggle="list" data-target="#correo">Correo</a>
						<a class="list-group-item list-group-item-action" data-toggle="list" data-target="#nombre">Nombre</a>
						<a class="list-group-item list-group-item-action" data-toggle="list" data-target="#apellidos">Apellidos</a>
						<a class="list-group-item list-group-item-action" data-toggle="list" data-target="#password">Cambiar password</a>
					</div>
				</div>

				<div class="col-md-4">
					<div class="tab-content">
						<div class="tab-pane fade show active" id="correo">
							<form method="post" action="../controller/setDatos.php">
								<div class="form-group">
									<input type="email" name="correo" class="form-control" value="<?php echo $_SESSION['correoUsuario'];?>">
								</div>
							</form>
						</div>

						<div class="tab-pane fade show" id="nombre">
							<form method="post" action="../controller/setDatos.php">
								<div class="form-group">
									<input type="text" name="nombre" class="form-control" value="<?php echo $_SESSION['nombreUsuario'];?>">
								</div>
							</form>
						</div>

						<div class="tab-pane fade show" id="apellidos">
							<form method="post" action="../controller/setDatos.php">
								<div class="form-group">
									<input type="text" name="apellidos" class="form-control" value="<?php echo $usuario->getApellidos();?>">
								</div>
							</form>
						</div>

						<div class="tab-pane fade show" id="password">
							<form method="post" action="../controller/setDatos.php">
								<div class="form-group">
									<label>Introduce tu password actual:</label>
									<input type="password" name="passwordActual" class="form-control" autofocus>
								</div>

								<div class="form-group">
									<label>Introduce tu nueva password:</label>
									<input type="password" name="passwordNueva" class="form-control">
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
		</main>

	</body>

</html>
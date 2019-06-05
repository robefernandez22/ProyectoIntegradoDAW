<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="es">

	<head>
		<!-- Etiquetas meta requeridas -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Título de la página -->
		<title>Administración - Inicio</title>
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
							<li class="nav-item active">
								<a href="./vistaAdmin.php" class="nav-link">Inicio</a>
							</li>

							<li class="nav-item">
								<a href="../controller/cargarReservas.php" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver, modificar o borrar reservas realizadas y/o canceladas">Reservas</a>
							</li>

							<li class="nav-item">
								<a href="../controller/verUsuarios.php" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver, modificar o borrar usuarios">Usuarios</a>
							</li>

							<li class="nav-item">
								<a href="../controller/verHoteles.php" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver, modificar o borrar hoteles">Hoteles</a>
							</li>
						</ul>
					</div>

					<a href="../controller/setUsuario.php" data-toggle="tooltip" data-html="true" title="¡Hola <?php echo $_SESSION['usuario'];?>!">
						<img src="../../../images/usuario.png" width="50" height="50" id="usuario">
					</a>

					<a href="../controller/cerrarSesion.php" data-toggle="tooltip" data-html="true" title="Cerrar sesión">
						<img src="../../../images/salir.svg" width="50" height="55">
					</a>
				</nav>
			</header>

			<?php
				if (isset($_GET["login"])) {
			?>

			<div class="alert alert-success text-center mt-5" role="alert">
				<strong>¡Bien!</strong> Has iniciado sesión correctamente. Bienvenido/a <b><?=$_SESSION["usuario"]?></b>
				<a href="../controller/delVariable.php?controlador=../view/vistaAdmin.php&variable=login" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
				}
			?>

			<div class="jumbotron">
				<div class="container">
					<h3 class="display-4">Bienvenido/a al panel de administración de Hoteles ESE <b><?=$_SESSION["usuario"]?></b>.</h3>
					<p>EAT, SLEEP AND ENJOY <b>/</b> COME, DUERME Y DISFRUTA</p>
					<p>En este panel de administración, podrás:</p>
					<ol>
						<li>Ver todos las reservas que se han hecho, modificarlas, eliminarlas y añadir nuevas reservas clickando en el apartado de <b>Reservas</b> del menú superior.</li>
						<li>Ver todos los usuarios existentes, modificarlos, eliminarlos y añadir nuevos usuarios clickando en el apartado de <b>Usuarios</b> del menú superior.</li>
						<li>Ver todos los hoteles existentes, modificarlos, eliminarlos y añadir nuevos hoteles clickando en el apartado de <b>Hoteles</b> del menú superior.</li>
						<li>Y también podrás modificar tus propios datos clickando en el <b>icono de usuario</b>, en la parte <b>superior derecha</b>.</li>
					</ol>
				</div>
			</div>

			<footer class="text-muted">
				<div class="container text-center">
					<p>Hoteles ESE &copy; 2019</p>
				</div>
			</footer>
		</main>
	</body>
</html>
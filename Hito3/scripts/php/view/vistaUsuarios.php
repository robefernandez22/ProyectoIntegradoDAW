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
		<link rel="stylesheet" type="text/css" href="../../../lib/floating-labels.css">

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
								<a href="../view/vistaAdmin.php" class="nav-link">Inicio</a>
							</li>

							<li class="nav-item">
								<a href="" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver, modificar o borrar reservas realizadas y/o canceladas">Reservas</a>
							</li>

							<li class="nav-item active">
								<a href="../controller/verUsuarios.php" class="nav-link" data-toggle="tooltip" data-html="true" title="Ver, modificar o borrar usuarios">Usuarios</a>
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
				<h3 class="text-center text-capitalize mt-5">Crea, busca, elimina y modifica usuarios</h3>
			</header>

			<section class="row justify-content-center mt-5">
				<div class="col-md-12">
					<table>
						<tr>
							<th><input class="btn btn-primary btn-sm mr-2 text-left" data-toggle="modal" data-target="#aniadir" type="button" value="Añadir"></th>
							<th>Correo</th>
							<th>Nombre</th>
							<th>Apellidos</th>
							<th colspan="2">Opciones</th>
						</tr>

						<?php
							foreach ($data as $usuarios) {
						?>

						<tr>
							<input type="hidden" name="correo" value="<?=$usuarios->getCorreo()?>">
							<td></td>
							<td><?=$usuarios->getCorreo()?></td>
							<td><?=$usuarios->getNombre()?></td>
							<td><?=$usuarios->getApellidos()?></td>
							<td>
								<a href="./setUsuario.php?id=<?=base64_encode($usuarios->getCorreo())?>">
									<input class="btn btn-warning btn-sm mr-2 text-left" data-toggle="modal" data-target="#modificar" type="button" value="Modificar">
								</a>
							</td>
							<td><input class="btn btn-danger btn-sm mr-2 text-left" data-toggle="modal" data-target="#eliminar" type="button" value="Eliminar"></td>
						</tr>

						<?php
							}
						?>
					</table>
				</div>
			</section>

			<!-- Ventana modal para eliminar usuarios -->
			<section class="modal" id="eliminar">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header bg-primary text-white">
							<div class="modal-title">Eliminar usuario</div>
							<span data-dismiss="modal">X</span>
						</div>

						<form method="post" action="./eliminarUsuario.php" class="form-signin" id="accion">
							<input type="hidden" name="correo" value="">
							<div class="modal-body">
								<div class="form-label-group">
									<p>¿Está seguro de que desea eliminar al usuario con el correo <b><span id="correo"></span></b>?</p>
								</div>
							</div>

							<div class="modal-footer">
								<input type="button" data-dismiss="modal" class="btn btn-primary" value="Cancelar">
								<input type="submit" class="btn btn-danger" value="Eliminar">
							</div>

							<input type="hidden" name="pagina" value="verUsuarios.php">
						</form>
					</div>
				</div>
			</section>

			<!-- Ventana modal para añadir usuario -->
			<section class="modal" id="aniadir">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header bg-primary text-white">
							<div class="modal-title">Añadir usuario</div>
							<span data-dismiss="modal">X</span>
						</div>

						<form method="post" action="./altaUsuario.php" class="form-signin">
							<div class="modal-body">
								<div class="form-label-group">
									<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" autofocus>
									<label for="nombre"><span class="obligatorio">*</span>Nombre</label>
								</div>

								<div class="form-label-group">
									<input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos">
									<label for="apellidos"><span class="obligatorio">*</span>Apellidos</label>
								</div>

								<div class="form-label-group">
									<input type="email" id="inputEmail1" name="correo" class="form-control" placeholder="Dirección de correo electrónico" autofocus required>
									<label for="inputEmail1"><span class="obligatorio">*</span>Dirección de correo electrónico</label>
								</div>

								<div class="form-label-group">
									<input type="password" id="password1" name="password" class="form-control" placeholder="Contraseña">
									<label for="password1"><span class="obligatorio">*</span>Contraseña</label>
								</div>

								<div class="form-group">
									<label><span class="obligatorio">*</span>Tipo</label><br>
									<input type="radio" name="tipo" value="U"><label>Usuario</label><br>
									<input type="radio" name="tipo" value="A"><label>Administrador</label>
								</div>
							</div>

							<div class="modal-footer text-right">
								<input type="submit" name="registro" class="btn btn-primary" value="Añadir">
							</div>

							<!-- Campo de texto oculto que mandamos al controlador 'altaUsuario' para que luego nos redireccione de nuevo aquí -->
							<input type="hidden" name="pagina" value="verUsuarios.php">
						</form>
					</div>
				</div>
			</section>
		</main>
	</body>
</html>
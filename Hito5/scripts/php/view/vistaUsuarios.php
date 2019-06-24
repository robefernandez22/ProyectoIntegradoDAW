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

							<li class="nav-item active">
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
				if (isset($_GET["actualizacion"])) {
					if ($_GET["actualizacion"] == 1) {
			?>

			<div class="alert alert-success text-center mt-5" role="alert">
				<strong>¡Bien!</strong> Usuario actualizado correctamente.
				<a href="./delVariable.php?controlador=./verUsuarios.php&variable=actualizacion" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					} else {

			?>

			<div class="alert alert-warning text-center mt-5" role="alert">
				<strong>¡Vaya!</strong> No has actualizado ningún dato.
				<a href="./delVariable.php?controlador=./verUsuarios.php&variable=actualizacion" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					}
				} elseif (isset($_GET["eliminacion"])) {
					if ($_GET["eliminacion"] == 1) {
			?>

			<div class="alert alert-success text-center mt-5" role="alert">
				<strong>¡Bien!</strong> Usuario eliminado correctamente.
				<a href="./delVariable.php?controlador=./verUsuarios.php&variable=eliminacion" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					} else {
			?>

			<div class="alert alert-danger text-center mt-5" role="alert">
				<strong>El usuario no se ha podido eliminar.</strong> El usuario tiene reservas asociadas aún por efectuar.
				<a href="./delVariable.php?controlador=./verUsuarios.php&variable=eliminacion" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					}
				} elseif (isset($_GET["aniadir"])) {
					if ($_GET["aniadir"] == 1) {
			?>

			<div class="alert alert-success text-center mt-5" role="alert">
				<strong>¡Bien!</strong> Usuario añadido correctamente.
				<a href="./delVariable.php?controlador=./verUsuarios.php&variable=aniadir" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					} else {
			?>

			<div class="alert alert-danger text-center mt-5" role="alert">
				<strong>Vaya...</strong> Ya existe un usuario con el mismo correo.
				<a href="./delVariable.php?controlador=./verUsuarios.php&variable=aniadir" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					}
				} elseif (isset($_GET["password"])) {
					if ($_GET["password"] == 1) {
			?>

			<div class="alert alert-success text-center mt-5" role="alert">
				<strong>¡Bien!</strong> Contraseña del usuario <b><?=base64_decode($_GET['id'])?></b> actualizada correctamente.
				<a href="./delVariable.php?controlador=./verUsuarios.php&variable=password" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					} else {
			?>

			<div class="alert alert-danger text-center mt-5" role="alert">
				<strong>Vaya...</strong> La contraseña del usuario <b><?=base64_decode($_GET['id'])?></b> no se ha podido actualizar correctamente, contacte con el administrador de la base de datos.
				<a href="./delVariable.php?controlador=./verUsuarios.php&variable=password" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
			</div>

			<?php
					}
				}
			?>

			<header class="row justify-content-center mt-5 mb-4">
				<div class="col-md-12">
					<h3 class="text-center mt-5">Crea, elimina y modifica usuarios</h3>

					<form class="form-signin">
						<div class="form-group">
							<p class="text-center"><b>Filtra</b> con un <b>correo, nombre o apellido:</b></p>
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
									<th scope="col">
										<input class="btn btn-primary btn-sm mr-2 text-left" data-toggle="modal" data-target="#aniadir" type="button" value="Añadir">
									</th>

									<?php
										if ($data != null) {
									?>

									<th scope="col">Correo</th>
									<th scope="col">Nombre</th>
									<th scope="col">Apellidos</th>
									<th scope="col">Tipo</th>
									<th scope="col" colspan="3">Opciones</th>

									<?php
										} else {
											echo "<p class='text-center'>No hay usuarios por el momento.</p>";
										}
									?>
								</tr>
							</thead>

							<tbody class="contenidobusqueda">
							<?php
								foreach ($data as $usuarios) {
							?>
								<tr>
									<form class="form-signin" method="post" action="./setDatos.php">
										<input type="hidden" class="identificador valor" name="correo" value="<?=$usuarios->getCorreo()?>">
										<td></td>
										<td>
											<?=$usuarios->getCorreo()?>
										</td>
										<td>
											<div class="form-group">
												<input type="text" name="nombre" class="form-control" value="<?=$usuarios->getNombre()?>" placeholder="Nombre">
											</div>
										</td>
										<td>
											<div class="form-group">
												<input type="text" name="apellidos" class="form-control" value="<?=$usuarios->getApellidos()?>" placeholder="Apellidos">
											</div>
										</td>
										<td>
											<div class="form-check">
												<input type="radio" class="form-check-input" value="A" name="tipo" <?php if($usuarios->getTipo() == "Administrador"){echo "checked";}?>>
												<label class="form-check-label">Administrador</label>
											</div>
											<div class="form-check">
												<input type="radio" class="form-check-input" value="U" name="tipo" <?php if($usuarios->getTipo() == "Usuario"){echo "checked";}?>>
												<label class="form-check-label">Usuario</label>
											</div>
										</td>
										<td>
											<input type="submit" class="btn btn-warning btn-sm mr-2 text-left" value="Modificar">
										</td>
									</form>
									<td>
										<input class="btn btn-danger btn-sm mr-2 text-left" data-toggle="modal" data-target="#eliminar" type="button" value="Eliminar">
									</td>
									<td>
										<a href="./setPassword.php?id=<?=base64_encode($usuarios->getCorreo())?>&admin">Cambiar contraseña</a>
									</td>
								</tr>
							<?php
								}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</section>

			<!-- Ventana modal para eliminar usuarios -->
			<section class="modal" id="eliminar">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header bg-danger text-white">
							<div class="modal-title">Eliminar usuario</div>
							<span data-dismiss="modal">X</span>
						</div>

						<form method="post" action="./eliminarUsuario.php" class="form-signin" id="accion">
							<input type="hidden" class="identificador" name="correo" value="">
							<div class="modal-body">
								<div class="form-label-group">
									<p>¿Está seguro de que desea eliminar al usuario con el correo <b><span class="valor"></span></b>?</p>
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
									<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" autofocus required>
									<label for="nombre"><span class="obligatorio">*</span> Nombre</label>
								</div>

								<div class="form-label-group">
									<input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos" required>
									<label for="apellidos"><span class="obligatorio">*</span> Apellidos</label>
								</div>

								<div class="form-label-group">
									<input type="email" id="correo" name="correo" class="form-control" placeholder="Dirección de correo electrónico" autofocus required>
									<label for="correo"><span class="obligatorio">*</span> Dirección de correo electrónico</label>
								</div>

								<div class="form-label-group">
									<input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
									<label for="password"><span class="obligatorio">*</span> Contraseña</label>
								</div>

								<div class="form-group">
									<label><span class="obligatorio">*</span> Tipo</label><br>
									<input type="radio" name="tipo" value="U" required> <label>Usuario</label><br>
									<input type="radio" name="tipo" value="A" required> <label>Administrador</label>
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
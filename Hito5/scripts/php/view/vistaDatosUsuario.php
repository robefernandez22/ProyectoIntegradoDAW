<!DOCTYPE html>
<html lang="es">

	<head>
		<!-- Etiquetas meta requeridas -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Título de la página -->
		<title>Hoteles ESE - Tus datos</title>
		<!-- Favicon -->
		<link rel="shortcut icon" type="favicon/ico" href="../../../images/favicon.ico">

		<!-- CSS principal -->
		<link rel="stylesheet" type="text/css" href="../../../style/main.css">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="../../../lib/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../../../lib/floating-labels.css">

		<script src="../../../lib/jquery-3.4.0.min.js"></script>
		<script src="../../../lib/jquery-migrate-3.0.1.min.js"></script>

		<link rel="stylesheet" type="text/css" href="../../../css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../../../css/main_styles.css">

		<link rel="stylesheet" type="text/css" href="../../../css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../../../css/main_styles.css">

		<!-- CSS para el tema -->
		<link rel="stylesheet" href="../../../css/animate.css">
		<link rel="stylesheet" href="../../../css/owl.carousel.min.css">
		<link rel="stylesheet" href="../../../css/aos.css">
		<link rel="stylesheet" href="../../../css/bootstrap-datepicker.css">
		<link rel="stylesheet" href="../../../css/jquery.timepicker.css">
		<link rel="stylesheet" href="../../../css/style.css">
	</head>

	<body>

		<header class="site-header js-site-header">
			<div class="container-fluid">
				<div class="row align-items-center">
					<nav class="navbar navbar-expand-sm navbar-dark fixed-top">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
							<span class="navbar-toggler-icon"></span>
						</button>

						<!-- Diferentes opciones del menú -->
						<div class="collapse navbar-collapse" id="menu">
							<ul class="navbar-nav">
								<li class="nav-item">
									<a href="../../../index.php" class="nav-link">Inicio</a>
								</li>

								<li class="nav-item">
									<a href="../controller/cargarValoraciones.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Conoce las opiniones de nuestros clientes!">Valoraciones</a>
								</li>

								<li class="nav-item">
									<a href="../view/vistaConocenos.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Conoce a todo el equipo de Hoteles ESE!">Conócenos</a>
								</li>

								<li class="nav-item">
									<a href="../controller/contactoController.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Contáctanos con cualquier duda que tengas!">Contáctanos</a>
								</li>
							</ul>
						</div>

						<!-- Botones para abrir la ventana de login y de registro -->
						<form class="form-inline">
							<?php
								if (!isset($_SESSION["usuario"])) {
							?>
							<a href="../view/formularioInicio.php" data-toggle="tooltip" data-html="true" title="¡Inicia sesión y haz tu reserva!">
								<input class="btn btn-primary btn-sm mr-2" type="button" value="Entrar">
							</a>

							<a href="../view/formularioRegistro.php" data-toggle="tooltip" data-html="true" title="¡Regístrate para poder reservar!">
								<input class="btn btn-warning btn-sm" type="button" value="Registrarse">
							</a>
							<?php
								} else {
							?>
							<a href="../controller/setUsuario.php?id=<?=base64_encode($_SESSION['usuario'])?>" data-toggle="tooltip" data-html="true" title="¡Hola <?php echo $_SESSION['usuario'];?>!">
								<img src="../../../images/usuario.png" width="50" height="50" id="usuario">
							</a>

							<a href="../controller/cerrarSesion.php" data-toggle="tooltip" data-html="true" title="Cerrar sesión">
								<img src="../../../images/salir.svg" width="50" height="50">
							</a>
							<?php
								}
							?>
						</form>
					</nav>
				</div>
			</div>
		</header>
		<!-- END head -->

		<section class="site-hero overlay" style="background-image: url(../../../images/contact.jpg)" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row site-hero-inner justify-content-center align-items-center">
					<?php
						if (isset($_GET["actualizacion"])) {
							if ($_GET["actualizacion"] == 1) {
					?>

					<div class="alert alert-success text-center mt-5" role="alert">
						<b>¡Bien!</b> Datos actualizados correctamente.
						<a href="./delVariable.php?controlador=./setUsuario.php?id=<?=base64_encode($_SESSION['usuario'])?>" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
					</div>

					<?php
							} else {
					?>

					<div class="alert alert-warning text-center mt-5" role="alert">
						<b>Vaya...</b> No has actualizado ningún dato.
						<a href="./delVariable.php?controlador=./setUsuario.php?id=<?=base64_encode($_SESSION['usuario'])?>" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
					</div>

					<?php
							}
						} elseif (isset($_GET["reserva"])) {
							if ($_GET["reserva"] == 1) {
					?>

					<div class="alert alert-success text-center mt-5" role="alert">
						<b>¡Bien!</b> Reserva realizada correctamente. Puedes verla justo abajo, en el apartado de <b>Tus reservas</b>.
						<a href="./delVariable.php?controlador=./setUsuario.php?id=<?=base64_encode($_SESSION['usuario'])?>" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
					</div>

					<?php
							} else {
					?>

					<div class="alert alert-warning text-center mt-5" role="alert">
						<b>Vaya...</b> Hubo algún problema al realizar tu reserva. Ponte en <a href="../view/vistaContacto.php">contacto</a> con nosotros e intentaremos solucionarlo.
						<a href="./delVariable.php?controlador=./setUsuario.php?id=<?=base64_encode($_SESSION['usuario'])?>" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
					</div>

					<?php
							}
						} elseif (isset($_GET["eliminacion"])) {
							if ($_GET["eliminacion"] == 1) {
					?>

					<div class="alert alert-success text-center mt-5" role="alert">
						<b>¡Bien!</b> Reserva cancelada correctamente.
						<a href="./delVariable.php?controlador=./setUsuario.php?id=<?=base64_encode($_SESSION['usuario'])?>" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
					</div>

					<?php
							} else {
					?>

					<div class="alert alert-warning text-center mt-5" role="alert">
						<b>Vaya...</b> Hubo algún problema al cancelar tu reserva. Ponte en <a href="../view/vistaContacto.php">contacto</a> con nosotros e intentaremos solucionarlo.
						<a href="./delVariable.php?controlador=./setUsuario.php?id=<?=base64_encode($_SESSION['usuario'])?>" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
					</div>

					<?php
							}
						} elseif (isset($_GET["valoracion"])) {
							if ($_GET["valoracion"] == 1) {
					?>

					<div class="alert alert-success text-center mt-5" role="alert">
						<b>¡Gracias!</b> La reserva se ha valorado correctamente, muchas gracias por tu opinión.
						<a href="./delVariable.php?controlador=./setUsuario.php?id=<?=base64_encode($_SESSION['usuario'])?>" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
					</div>

					<?php
							} else {
					?>

					<div class="alert alert-warning text-center mt-5" role="alert">
						<b>Vaya...</b> Hubo algún problema al valorar tu reserva. Ponte en <a href="../view/vistaContacto.php">contacto</a> con nosotros e intentaremos solucionarlo.
						<a href="./delVariable.php?controlador=./setUsuario.php?id=<?=base64_encode($_SESSION['usuario'])?>" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
					</div>

					<?php
							}
						}
					?>

					<div class="col-md-10 text-center" data-aos="fade-up">
						<span class="custom-caption text-uppercase text-white d-block mb-3">Tus datos y tus reservas</span>
						<h1 class="heading">Eat, sleep and enjoy</h1>
					</div>
				</div>
			</div>

			<a class="mouse smoothscroll" href="#next">
				<div class="mouse-icon">
					<span class="mouse-wheel"></span>
				</div>
			</a>
		</section>
		<!-- END section -->

		<section class="py-5 bg-light" id="next">
			<div class="container">
				<div class="row justify-content-center text-center mb-5">
					<div class="col-md-7">
						<form>
							<h2 class="heading" data-aos="fade-up">Tus reservas</h2>
							<p data-aos="fade-up" data-aos-delay="100">Observa, cancela y valora tus reservas.</p>
							<div class="alert alert-danger text-center mt-5" role="alert">
								Podrás cancelar una reserva siempre y cuando el día actual no coincida con el día de entrada de la reserva.
							</div>

							<div class="alert alert-success text-center mt-5" role="alert">
								Podrás valorar una reserva siempre y cuando haya finalizado tu estantia en el hotel correspondiente.
							</div>
						</form>
					</div>
				</div>
				<div class="row align-items-center">
					<div class="col-md-12" data-aos="fade-up">
						<?php
							if ($datos != null) {
						?>

						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Hotel</th>
										<th>Fecha de reserva</th>
										<th>Fecha de entrada</th>
										<th>Fecha de salida</th>
										<th colspan="3">Opciones</th>
									</tr>
								</thead>

								<tbody>
									<?php
										foreach ($datos as $reservas) {
									?>

									<tr>
										<!-- Para cancelar y valorar reservas -->
										<input type="hidden" class="identificador" name="idReserva" value="<?=$reservas->getId()?>">
										<!-- Para valorar reservas -->
										<input type="hidden" class="identificadorHotel" name="identificadorHotel" value="<?=$reservas->getHotelId()?>">
										<td><?=$reservas->getNombreHotel()?></td>
										<td><?=$reservas->getFechaReserva()?></td>
										<td><?=$reservas->getFechaEntrada()?></td>
										<td><?=$reservas->getFechaSalida()?></td>
										<td><a href="./detallesReserva.php?id=<?=$reservas->getId()?>">Más detalles</a></td>

										<?php
											$fechaEntrada = $reservas->getFechaEntrada();
											$fechaSalida = $reservas->getFechaSalida();
											$fechaActual = date("20"."y-m-d");
											$valorada = Valoraciones::buscarValoracion($reservas->getId());

											if($valorada != null) {
												$tipoValoracion = "hidden";
											} elseif ($fechaSalida > $fechaActual) {
												$tipoValoracion = "hidden";
											} else {
												$tipoValoracion = "button";
											}
										?>

										<td>
											<input class="btn btn-warning btn-sm mr-2 text-left" data-toggle="modal" data-target="#cancelar" type="<?php if($fechaEntrada <= $fechaActual){echo "hidden";}else{echo"button";}?>" value="Cancelar">
										</td>
										<td>
											<input class="btn btn-primary btn-sm mr-2 text-left" data-toggle="modal" data-target="#valorar" type="<?=$tipoValoracion?>" value="Valorar">
										</td>
									</tr>

									<?php
										}
									?>
								</tbody>
							</table>
						</div>

						<?php
							} else {
						?>

						<h2 class="text-center">Actualmente no has realizado ninguna reserva</h2>

						<?php
							}
						?>
					</div>
				</div>
			</div>
		</section>

		<section class="py-5 bg-light">
			<div class="container">
				<div class="row justify-content-center text-center mb-5">
					<div class="col-md-7">
						<h2 class="heading" data-aos="fade-up">Tus datos</h2>
						<p data-aos="fade-up" data-aos-delay="100">Observa y actualiza tus datos con toda libertad.</p>
					</div>
				</div>
				<div class="row align-items-center">
					<div class="col-md-12" data-aos="fade-up">
						<form class="form-signin" method="post" action="./setDatos.php">
							<input type="hidden" name="redireccion" value="vistaDatosUsuario.php">

							<div class="row">
								<div class="col-md-12">
									<div class="form-label-group">
										<input type="email" id="correo" name="correo" class="form-control-plaintext" placeholder="Correo electrónico" value="<?=$usuario->getCorreo()?>" readonly>
										<label for="correo">Correo electrónico</label>
									</div>

									<div class="form-label-group">
										<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" value="<?=$usuario->getNombre()?>">
										<label for="nombre"><span class="obligatorio">*</span> Nombre</label>
									</div>

									<div class="form-label-group">
										<input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos" value="<?=$usuario->getApellidos()?>">
										<label for="apellidos"><span class="obligatorio">*</span> Apellidos</label>
									</div>

									<div class="form-group">
										<a href="./setPassword.php?id=<?=base64_encode($usuario->getCorreo())?>">Cambiar contraseña</a>
									</div>

									<div class="form-group">
										<input type="submit" name="setDatos" class="btn btn-success" value="Guardar">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>

		<section class="section bg-image overlay" style="background-image: url('../../../images/hero_4.jpg');">
			<div class="container">
				<div class="row pt-5">
					<p class="col-md-12 text-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Hoteles ESE &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made <i class="icon-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
				</div>
			</div>
		</section>

		<!-- Ventana modal para cancelar reservas -->
			<section class="modal" id="cancelar">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header bg-danger text-white">
							<div class="modal-title">Cancelar reserva</div>
							<span data-dismiss="modal">X</span>
						</div>

						<form method="post" action="./eliminarReserva.php" class="form-signin" id="accion">
							<input type="hidden" class="identificador" name="idReserva" value="">
							<div class="modal-body">
								<div class="form-label-group">
									<p>¿Está seguro de que desea cancelar la reserva seleccionada?</p>
								</div>
							</div>

							<div class="modal-footer">
								<input type="button" data-dismiss="modal" class="btn btn-primary" value="No">
								<input type="submit" class="btn btn-danger" value="Si">
							</div>

							<input type="hidden" name="usuario">
						</form>
					</div>
				</div>
			</section>

			<!-- Ventana modal para valorar reservas -->
			<section class="modal" id="valorar">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header bg-primary text-white">
							<div class="modal-title">Valorar reserva</div>
							<span data-dismiss="modal">X</span>
						</div>

						<form method="post" action="./insertarValoracion.php" class="form-signin" id="valoracion">
							<input type="hidden" class="identificador" name="idReserva" value="">
							<input type="hidden" class="identificadorHotel" name="idHotel" value="">

							<div class="modal-body">
								<div class="form-group">
									<label for="puntuacion"><span class="obligatorio">*</span> Puntua tu estancia de 1 a 5:</label><br>
									<select id="puntuacion" class="form-control" name="puntuacion">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
								</div>

								<div class="form-group">
									<label for="descripcion"><span class="obligatorio">*</span> Describe tu estancia:</label>
									<textarea cols="47" rows="5" id="descripcion" name="descripcion" required></textarea>
								</div>
							</div>

							<div class="modal-footer">
								<input type="button" data-dismiss="modal" class="btn btn-warning" value="Cancelar">
								<input type="submit" class="btn btn-primary" value="Valorar">
							</div>
						</form>
					</div>
				</div>
			</section>

		<!-- Scripts necesarios -->
		<script src="../../../lib/popper.min.js"></script>
		<script src="../../../lib/bootstrap.min.js"></script>
		<script src="../../../lib/owl.carousel.min.js"></script>
		<script src="../../../lib/jquery.stellar.min.js"></script>
		<script src="../../../lib/bootstrap-datepicker.js"></script>
		<script src="../../../lib/jquery.timepicker.min.js"></script>
		<!-- Script Base64 -->
		<script src="../../../lib/base64.js"></script>
		<!-- Script principal -->
		<script src="../../js/main.js"></script>
		<script src="../../../lib/aos.js"></script> 
		<script src="../../js/theme.js"></script>

		<!-- Scripts para las valoraciones. -->
		<script src="../../../lib/parallax.min.js"></script>
		<script src="../../../lib/custom.js"></script>

	</body>
</html>
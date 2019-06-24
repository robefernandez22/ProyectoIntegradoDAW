<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Etiquetas meta requeridas -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Título de la página -->
    <title>Hoteles ESE - Inicio</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="favicon/ico" href="./images/favicon.ico">

    <!-- CSS principal -->
    <link rel="stylesheet" type="text/css" href="./style/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="./lib/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./lib/floating-labels.css">

    <script src="./lib/jquery-3.4.0.min.js"></script>
    <script src="./lib/jquery-migrate-3.0.1.min.js"></script>

    <!-- Librerías necesarias para FancyBox -->
    <script src="./lib/fancybox/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" href="./lib/fancybox/jquery.fancybox.min.css" type="text/css" media="screen">
    <!-- Script para galeria de imágenes -->
    <script src="./scripts/js/galeria.js"></script>

    <!-- CSS para el tema -->
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/style.css">
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
                <li class="nav-item active">
                  <a href="./index.php" class="nav-link">Inicio</a>
                </li>

                <li class="nav-item">
                  <a href="./scripts/php/controller/cargarValoraciones.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Conoce las opiniones de nuestros clientes!">Valoraciones</a>
                </li>

                <li class="nav-item">
                  <a href="./scripts/php/view/vistaConocenos.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Conoce a todo el equipo de Hoteles ESE!">Conócenos</a>
                </li>

                <li class="nav-item">
                  <a href="./scripts/php/controller/contactoController.php" class="nav-link" data-toggle="tooltip" data-html="true" title="¡Contáctanos con cualquier duda que tengas!">Contáctanos</a>
                </li>
              </ul>
            </div>

            <!-- Botones para abrir la ventana de login y de registro -->
            <form class="form-inline">
              <?php
                if (!isset($_SESSION["usuario"])) {
              ?>
              <a href="./scripts/php/view/formularioInicio.php" data-toggle="tooltip" data-html="true" title="¡Inicia sesión y haz tu reserva!">
                <input class="btn btn-primary btn-sm mr-2" data-toggle="modal" type="button" value="Entrar">
              </a>

              <a href="./scripts/php/view/formularioRegistro.php" data-toggle="tooltip" data-html="true" title="¡Regístrate para poder reservar!">
                <input class="btn btn-warning btn-sm" data-toggle="modal" type="button" value="Registrarse">
              </a>
              <?php
                } else {
              ?>
              <a href="./scripts/php/controller/setUsuario.php?id=<?=base64_encode($_SESSION['usuario'])?>" data-toggle="tooltip" data-html="true" title="¡Hola <?php echo $_SESSION['usuario'];?>!">
                <img src="./images/usuario.png" width="50" height="50" id="usuario">
              </a>

              <a href="./scripts/php/controller/cerrarSesion.php" data-toggle="tooltip" data-html="true" title="Cerrar sesión">
                <img src="./images/salir.svg" width="50" height="50">
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

    <section class="site-hero overlay" style="background-image: url(images/fondo_principal.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">

          <?php
            if (isset($_GET["not_found"])) {
          ?>

          <div class="alert alert-warning text-center" role="alert">
            <b>Vaya...</b> No has podido iniciar sesión, los datos que has introducido no existen.
            <a href="./scripts/php/controller/delVariable.php?controlador=../../../index.php&variable=not_found" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
          </div>

          <?php
            } elseif(isset($_GET["password"])) {
              if ($_GET["password"] == 1) {
          ?>

          <div class="alert alert-success text-center" role="alert">
            <b>¡Bien!</b> Has actualizado correctamente tu contraseña, pero, por seguridad debes iniciar sesión de nuevo ingresando con tu nueva contraseña.
            <a href="./scripts/php/controller/delVariable.php?controlador=../../../index.php&variable=password" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
          </div>

          <?php
              }
            } elseif(isset($_GET["login"])) {
          ?>

          <div class="alert alert-success text-center" role="alert">
            <b>¡Bien!</b> Has iniciado sesión correctamente. Bienvenido/a <b><?=$_SESSION["usuario"]?></b>
            <a href="./scripts/php/controller/delVariable.php?controlador=../../../index.php&variable=login" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
          </div>

          <?php
            } elseif (isset($_GET["tipo"])) {
          ?>

          <div class="alert alert-success text-center" role="alert">
            <b>¡Bien!</b> Has actualizado correctamente tus datos, pero, cambiaste tu rol de usuario, así que por seguridad debes iniciar sesión de nuevo.
            <a href="./scripts/php/controller/delVariable.php?controlador=../../../index.php&variable=tipo" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
          </div>

          <?php
            } elseif (isset($_GET["entradaMenorActual"])) {
          ?>

          <div class="alert alert-warning text-center" role="alert">
            <b>¡Cuidado!</b> La <b>fecha de entrada</b> no puede ser menor que la <b>fecha actual</b>.
            <a href="./scripts/php/controller/delVariable.php?controlador=../../../index.php&variable=entradaMenorActual" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
          </div>

          <?php
            } elseif (isset($_GET["salidaMenorActual"])) {
          ?>

          <div class="alert alert-warning text-center" role="alert">
            <b>¡Cuidado!</b> La <b>fecha de salida</b> no puede ser menor que la <b>fecha actual</b>.
            <a href="./scripts/php/controller/delVariable.php?controlador=../../../index.php&variable=salidaMenorActual" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
          </div>

          <?php
            } elseif (isset($_GET["entradaMayorSalida"])) {
          ?>

          <div class="alert alert-warning text-center" role="alert">
            <b>¡Cuidado!</b> La <b>fecha de entrada</b> no puede ser mayor que la <b>fecha de salida</b>.
            <a href="./scripts/php/controller/delVariable.php?controlador=../../../index.php&variable=entradaMayorSalida" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
          </div>

          <?php
            } elseif (isset($_GET["peticion"])) {
              if ($_GET["peticion"] == 1) {
          ?>

          <div class="alert alert-success text-center" role="alert">
            <b>¡Bien!</b> Tu petición se ha enviado correctamente. Te responderemos tan pronto como nos sea posible.
            <a href="./scripts/php/controller/delVariable.php?controlador=../../../index.php&variable=peticion" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
          </div>

          <?php
              } else {
          ?>

          <div class="alert alert-warning text-center" role="alert">
            <b>Vaya...</b> Tu petición no se ha podido enviar correctamente. Inténtalo de nuevo más tarde.
            <a href="./scripts/php/controller/delVariable.php?controlador=../../../index.php&variable=peticion" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
          </div>

          <?php
              }
            } elseif (isset($_GET["eliminacion"])) {
              if ($_GET["eliminacion"] == 1) {
          ?>

          <div class="alert alert-warning text-center" role="alert">
            <b>Has eliminado tu cuenta.</b> Por lo que, por seguridad tu sesión se ha cerrado.
            <a href="./scripts/php/controller/delVariable.php?controlador=../../../index.php&variable=eliminacion" class="float-right" aria-hidden="true"><h3>&times;</h3></a>
          </div>

          <?php
              }
            }
          ?>

          <div class="col-md-10 text-center" data-aos="fade-up">
            <span class="custom-caption text-uppercase text-white d-block mb-3">Welcome To Hoteles ESE</span>
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

    <section class="section bg-light pb-0 mt-5">
      <div class="container">
        <div class="row check-availabilty" id="next">
          <div class="block-32" data-aos="fade-up" data-aos="-200">
            <form method="post" action="./scripts/php/controller/procesoReserva.php">
              <input type="hidden" name="buscar">

              <div class="row justify-content-center">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="fechaEntrada">Check In</label>
                    <input type="date" name="fechaEntrada" id="fechaEntrada" class="form-control" required>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label for="fechaSalida">Check Out</label>
                    <input type="date" name="fechaSalida" id="fechaSalida" class="form-control" required>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="numPersonas">Número de personas</label>
                    <select class="form-control form-control-lg" name="numPersonas" id="numPersonas">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ciudad">Selecciona un destino</label>
                    <select class="form-control form-control-lg" name="ciudad" id="ciudad">
                      <?php
                        foreach ($ciudades as $value) {
                      ?>
                      <option value="<?=$value[0]?>"><?=$value[0]?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row justify-content-center">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <section class="py-5 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-7 ml-auto order-lg-2 position-relative mb-5" data-aos="fade-up">
            <figure class="img-absolute">
              <img src="images/food-1.jpg" alt="Image" class="img-fluid">
            </figure>
            <img src="images/img_1.jpg" alt="Image" class="img-fluid rounded">
          </div>
          <div class="col-md-12 col-lg-4 order-lg-1" data-aos="fade-up">
            <h2 class="heading">Bienvenidos/as</h2>
            <p class="mb-4">Hoteles ESE es una cadena hotelera con gran peso en el sector turístico de España. Nuestros hoteles están siempre en el centro de las ciudades y cuentan con instalaciones nuevas y de calidad, cuidando siempre hasta el más mínimo detalle.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="section slider-section bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade-up">Nuestros hoteles</h2>
            <p class="mb-4">Disfruta con imágenes de algunos de nuestros hoteles.</p>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-12">
            <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
              <?php
                foreach ($imagenes as $key => $images) {
                  $datos = Hoteles::buscarHotel($hoteles[$key]);
                  $hotel = new Hoteles($datos);
              ?>
              
              <div class="slider-item">
                <a href="<?=$images?>" data-fancybox="images" data-caption="<?=$hotel->getNombre()?>"><img src="<?=$images?>" alt="Image placeholder" class="img-fluid"></a>
              </div>
              
              <?php
                }
              ?>
            </div>
            <!-- END slider -->
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="section bg-image overlay" style="background-image: url('./images/hero_4.jpg');">
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
    
    <script src="./lib/popper.min.js"></script>
    <script src="./lib/bootstrap.min.js"></script>
    <script src="./lib/owl.carousel.min.js"></script>
    <script src="./lib/jquery.stellar.min.js"></script>
    <script src="./lib/bootstrap-datepicker.js"></script>
    <script src="./lib/jquery.timepicker.min.js"></script>
    <!-- Script Base64 -->
    <script src="./lib/base64.js"></script>
    <!-- Script principal -->
    <script src="./scripts/js/main.js"></script>
    <script src="./lib/aos.js"></script> 
    <script src="./scripts/js/theme.js"></script>
  </body>
</html>
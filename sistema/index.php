<?php
session_start();
$_SESSION['active'] = $_COOKIE['active'];
$_SESSION['rol'] = $_COOKIE['rol'];
setcookie("active", "", time() - 3600, "/");
setcookie("rol", "", time() - 3600, "/");
ini_set('display_errors', 0);

require_once "../conexion.php";

if (empty($_SESSION['active'])) {
	header('location: ../');
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
        rel="stylesheet" />
    <title>CyberHunters</title>
    <!-- Bootstrap core CSS -->
    <link href="../src/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../src/css/fontawesome.css" />
    <link rel="stylesheet" href="../src/css/templatemo-grad-school.css" />
    <link rel="stylesheet" href="../src/css/owl.css" />
    <link rel="stylesheet" href="../src/css/lightbox.css" />
    <link rel="stylesheet" href="../src/css/lightbox.css" />
    <link rel="stylesheet" href="../css/Styles_inicio.css">

    <link rel="shortcut icon" href="../src/images/cyberhunter_logo.png" />
    <!-- Font Awesome -->
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
            integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
    />
</head>

<body>
    <header class="main-header clearfix" role="header">
        <div class="logo">
            <a href="#"><em>Cyber</em>Hunt<em>ers</em></a>
        </div>

        <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>

        <nav id="menu" class="main-nav" role="navigation">
            <ul class="main-menu">
                <li>
                    <a href="#section1">Inicio</a>
                </li>

                <li>
                    <form action="close.php" method="post" class="logout d-inline">
                        <button type="submit" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i>
                            Cerrar sesión
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>

      <!--<section class="section main-banner" id="top" data-section="section1">
        <video autoplay muted loop id="bg-video" width="100%">
            <source src="../src/images/dinoram.mp4" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">

                <h2><em>Gestion</em> de Nomina</h2>
                <br />

                <br />
                <div class="main-button">
                    <div class="scroll-to-section">
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section class="section video" data-section="section5">
        <div class="container">

            <div class="cont_centro">
                <div class="left-content">
                    <div .puff-in-center>
                    <span></span>
                    <h4><em>Tabla de Nomina</em></h4>
                    <table id="datatable_users" class="table">
                        <thead>
                            <tr>
                                <th class="centered">#</th>
                                <th class="centered">Nombre</th>
                                <th class="centered">Email</th>
                                <th class="centered">Direccion</th>
                                <th class="centered">Compañia</th>
                                <th class="centered">Estado</th>
                                <th class="centered">Editar</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody_Users"></tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <i class="fa fa-copyright"></i> Copyright 2023 by Cyberhunters |
                        Diseño:
                        <a href="https://templatemo.com" rel="sponsored" target="_parent">Cyberhunters</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="../src/js/jquery/jquery.min.js"></script>
    <script src="../src/js/bootstrap.bundle.min.js"></script>

    <script src="../src/js/isotope.min.js"></script>
    <script src="../src/js/owl-carousel.js"></script>
    <script src="../src/js/lightbox.js"></script>
    <script src="../src/js/tabs.js"></script>
    <script src="../src/js/video.js"></script>
    <script src="../src/js/slick-slider.js"></script>
    <!--<script src="../src/js/custom.js"></script>  Esta cosa genera un error en bucle-->
    <script src="../src/js/main.js"></script>

    <!-- Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- DataTable -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script src="../js/table.js"></script>
    
</body>

</html>
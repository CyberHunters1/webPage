<?php
session_start();

ini_set('display_errors', 0);

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
    <title>Nomina CyberHunters</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../src/css/fontawesome.css" />
    <link rel="stylesheet" href="../src/css/templatemo-grad-school.css" />
    <link rel="stylesheet" href="../src/css/owl.css" />
    <link rel="stylesheet" href="../src/css/lightbox.css" />
    <link rel="stylesheet" href="../public/css/Styles_inicio.css">
    <link rel="stylesheet" href="../public/css/globalStyles.css">
    <link rel="shortcut icon" href="../src/images/cyberhunter_logo.png" />
</head>

<body>
    <header class="main-header clearfix" role="header">

        <div class="logo">
            <a href="#">

                <em>Cyber</em>Hunt<em>ers</em></a>
        </div>

        <nav id="menu" class="main-nav" role="navigation">
            <ul class="main-menu">
                <li>
                    <a href="nominas.html">Nominas</a>
                </li>
                <li>
                    <a href="nosotros.php">Acerca de Nosotros</a>
                </li>
                <li class="justify-content-center padd-top-btm-10 d-sm-inline-block d-flex">
                    <form action="../controllers/close_session.php" method="post" class="logout d-inline">
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    <div id="contenido-dinamico">
        <section class="section video" data-section="section5">
            <div class="container">

                <div class="cont_centro">
                    <div class="left-content">
                        <span></span>
                        <h4><em>Tabla de Nomina</em></h4>
                        <?php
                        if ($_SESSION['rol'] == 1) {
                            ?>
                            <form action="../controllers/add_employees.php" method="post" class="d-inline">
                                <button id="btn_agregar" type="button" class="btn btn-success"><i
                                        class="fas fa-sign-out-alt">
                                    </i>
                                    Agregar
                                </button>
                            </form>
                            <?php
                        }
                        ?>
                        <div class="table-responsive">
                            <table id="datatable_users" class="table table-striped table-bordered ">
                                <thead>
                                    <tr>
                                        <th class="centered">Indice</th>
                                        <th class="centered">RFC</th>
                                        <th class="centered">Nombre</th>
                                        <th class="centered">Apellido Pat.</th>
                                        <th class="centered">Apellido Mat.</th>
                                        <th class="centered">Salario</th>
                                        <?php if ($_SESSION['rol'] == 1) { ?>
                                            <th class="centered">Acciones</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody id="tableBody_Users"></tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </section>




    </div>

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
    <script src="../src/js/isotope.min.js"></script>
    <script src="../src/js/owl-carousel.js"></script>
    <script src="../src/js/lightbox.js"></script>
    <script src="../src/js/tabs.js"></script>
    <script src="../src/js/video.js"></script>
    <script src="../src/js/slick-slider.js"></script>
    <script src="../public/js/dinamicPage.js"></script>


    <!-- Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- DataTable -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>


    <script src="../public/js/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link rel="shortcut" src="../public/js/sweetalert2.min.css">
    </link>
    <script src="../public/js/table.js"></script>
    <script src="../public/js/formulario.js"></script>

</body>

</html>
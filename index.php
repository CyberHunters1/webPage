<?php
session_start();
if (!empty($_SESSION['active'])) {
  header('location: sistema/');
}

?>



<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio De Sesion</title>
  <link rel="stylesheet" href="./public/css/Styles.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
    rel="stylesheet" />
  <title>CyberHunters</title>
  <!-- Bootstrap core CSS -->
  <link href="src/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="src/css/fontawesome.css" />
  <link rel="stylesheet" href="src/css/templatemo-grad-school.css" />
  <link rel="stylesheet" href="src/css/owl.css" />
  <link rel="stylesheet" href="src/css/lightbox.css" />

  <link rel="stylesheet" href="@sweetalert2/theme-borderless/borderless.css">
  <link rel="shortcut icon" href="src/images/cyberhunter_logo.png" />

</head>

<body>
  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="270.11" height="649.9" overflow="visible">
  <style>
    .geo-arrow {
      fill: none;
      stroke: #fff;
      stroke-width: 2;
      stroke-miterlimit: 10;
    }
  </style>
  <g class="item-to bounce-1">
    <path class="geo-arrow draw-in" d="M135.06 142.564L267.995 275.5 135.06 408.434 2.125 275.499z" />
  </g>
  <circle class="geo-arrow item-to bounce-2" cx="194.65" cy="69.54" r="7.96" />
  <circle class="geo-arrow draw-in" cx="194.65" cy="39.5" r="7.96" />
  <circle class="geo-arrow item-to bounce-3" cx="194.65" cy="9.46" r="7.96" />
  <g class="geo-arrow item-to bounce-2">
    <path class="st0 draw-in" d="M181.21 619.5l13.27 27 13.27-27zM194.48 644.5v-552" />
  </g>
</svg>
</div>
<div class="arrow arrow--bottom">
<svg xmlns="http://www.w3.org/2000/svg" width="31.35" height="649.9" overflow="visible">
  <style>
    .geo-arrow {
      fill: none;
      stroke: #fff;
      stroke-width: 2;
      stroke-miterlimit: 10;
    }
  </style>
  <g class="item-to bounce-1">
    <circle class="geo-arrow item-to bounce-3" cx="15.5" cy="580.36" r="7.96" />
    <circle class="geo-arrow draw-in" cx="15.5" cy="610.4" r="7.96" />
    
    <g class="item-to bounce-2">
      <path class="geo-arrow draw-in" d="M28.94 30.4l-13.26-27-13.27 27zM15.68 5.4v552" />
    </g>
  </g>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" class="dotted-circle" width="352" height="352" overflow="visible">
  <circle cx="176" cy="176" r="174" fill="none" stroke="#fff" stroke-width="2" stroke-miterlimit="10" stroke-dasharray="12.921,11.9271"/>
</svg>
 -->
  <!-- </div>
  </div>
   -->
  <header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="#">

        <em>Cyber</em>Hunt<em>ers</em></a>
    </div>
  </header>

  <section class="vh-100 gradient-custom" style="margin-top:30px">
    <form action="controllers/login.php" method="POST">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 text-uppercase">Iniciar sesión</h2>
                <p class="text-white-50 mb-5">por favor ingrese su usuario y contraseña</p>


                  <div class="form-outline form-white mb-4">
                    <input type="email" class="form-control form-control-lg" name="usuario" id="usuario"/>
                    <label class="form-label" for="typeEmailX">Email</label>
                  </div>

                  <div class="form-outline form-white mb-4">
                    <input type="password" class="form-control form-control-lg" name="clave" id="clave"/>
                    <label class="form-label" for="typePasswordX">contraseña</label>
                  </div>


                  <button class="btn btn-outline-light btn-lg px-5 B_Iniciar"  value="Iniciar" >continuar</button>
                </form>
              </div>

              <div>

              </div>

            </div>
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


</body>

</html>
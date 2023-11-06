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
<svg xmlns="http://www.w3.org/2000/svg" width="270.11" height="649.9" overflow="visible">
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

  </div>
  </div>
  <header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="#">
    
      <em>Cyber</em>Hunt<em>ers</em></a>
    </div>
  </header>
  <main>
      <div class="Formulario p-4">
        <h2>Inicio de Sesion </h2>
        <form action="controllers/login.php" method="POST">
          <div class="Username">
            <input type="text" placeholder="Usuario" name="usuario" id="usuario">
            
          </div>
          <div class="Username">
            <input type="password" placeholder="Contraseña" name="clave" id="clave">

          </div>
          <button class="B_Iniciar"  value="Iniciar" > Iniciar</button>
        

        </form>
      </div>
  </main>

  <footer>
    <div class="pie-de-pagina">
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


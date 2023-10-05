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
  <title>Document</title>
  <link rel="stylesheet" href="./css/Styles.css">
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="shortcut icon" href="src/images/cyberhunter_logo.png" />

</head>

<body>

  <header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="#"><em>Cyber</em>Hunt<em>ers</em></a>
    </div>
  </header>
  <main>
    <div class="Formulario p-4">
      <h1>Inicio de Sesión </h1>
      <form action="func.php" method="POST">
        <div class="Username">
          <input type="text" placeholder="Usuario" name="usuario" id="usuario">
          
        </div>
        <div class="Username">
          <input type="password" placeholder="Contraseña" name="clave" id="clave">

        </div>
        <input type="submit" value="Iniciar">
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

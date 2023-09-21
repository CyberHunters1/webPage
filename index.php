<?php
session_start();
if (!empty($_SESSION['active'])) {
    header('location: sistema/');
  }

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Inventario Graph</title>

</head>

<body >
  <div >
    <div >
      <h1 style="text-align:center;">Sistema de Inventario ING-GRAPH</h1>
    </div>
    <div >
      <div >
        <h1 >Iniciar Sesión</h1>
      </div>
      <form action="func.php" method="POST">
        
        <div class="form-group">
          <label for="usuario">Usuario</label>
          <input type="text"  placeholder="Usuario" name="usuario" id="usuario">
        </div>
        <div class="form-group">
          <label for="clave">Contraseña</label>
          <input type="password" placeholder="Contraseña" name="clave" id="clave">
        </div>
        <input type="submit" value="Iniciar" >
      </form>
    </div>
  </div>
</body>

</html>
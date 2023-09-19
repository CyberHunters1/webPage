<?php
session_start();
$alert = '';
if (!empty($_SESSION['active'])) {
  header('location: sistema/');
} else {

  if (!empty($_POST)) {
    if (empty($_POST['usuario'])) {
      $alert = '<div class="alert alert-danger" role="alert">
      Ingrese su usuario y su clave
      </div>';
    } else {

      require_once 'conexion.php';
  
      $collection = $_SESSION['conexion']->collection('empleados');
      $document = $collection->document($_POST['usuario']);
      $snapshot = $document->snapshot();
      
      
      if (!$snapshot->exists()) {
        $alert = '<div class="alert alert-danger" role="alert">
        Usuario no registrado.
        </div>';
        session_destroy();

      } else {

        $data=$snapshot->data();
        if ($data['password'] != $_POST['clave']){
          $alert = '<div class="alert alert-danger" role="alert">
          Contraseña erronea.
          </div>';
          session_destroy();
        }
        else{
          setcookie("rol", $data['rol'], time() + 3600, "/");
          setcookie("active", true, time() + 3600, "/");

          
          header('location: sistema/');
        }
      }
    }
  }
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
      <form method="POST">
        <?php echo isset($alert) ? $alert : ""; ?>
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

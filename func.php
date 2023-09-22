<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $caracteresEspeciales = array(',', ';', ':', '.', '/', '-', '"', "'", '+', '[', ']', '{', '}', '*');

  if (empty($_POST['usuario'] || $_POST['clave'])) {
    echo 'Error de inicio de sesión';
  } else {

    require_once 'conexion.php';

    $collection = $_SESSION['conexion']->collection('empleados');
    $document = $collection->document($_POST['usuario']);
    $snapshot = $document->snapshot();
    
    if (!$snapshot->exists()) {
      echo 'Credenciales incorrectas';
      session_destroy();
    }
    else{

      $data=$snapshot->data();
      $key=str_replace($caracteresEspeciales, '', $_POST['clave']);
      $key = hash('sha256', $key);

      if ($data['password'] != $key){
        echo  'Credenciales incorrectas';
        session_destroy();
      }
      else{

        $_SESSION['active']=true;
        setcookie("rol", $data['rol'], time() + 3600, "/");
        setcookie("active", true, time() + 3600, "/"); 
        header('location: sistema/');
        
      }
    }
  }
}

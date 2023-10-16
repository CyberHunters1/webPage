<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Agrega la referencia a SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $caracteresEspeciales = array(',', ';', ':', '.', '/', '-', '"', "'", '+', '[', ']', '{', '}', '*');

  if (empty($_POST['usuario'] || $_POST['clave'])) {
    echo '<script>
            Swal.fire({
                icon: "error",
                title: "Error de inicio de sesión",
                text: "Por favor, ingrese un usuario y contraseña válidos.",
                confirmButtonText: "Aceptar"
            }).then(function(result) {
                if (result.isConfirmed) {
                    window.location.href = "../index.php"; // Redirige al usuario a index.html después de hacer clic en "Aceptar"
                }
            });
          </script>';
  } else {
  
    require_once '../models/conexion.php';
  
    $collection = $firestore->collection('empleados');
    $document = $collection->document($_POST['usuario']);
    $snapshot = $document->snapshot();
    
    if (!$snapshot->exists()) {
      echo '<script>
              Swal.fire({
                  icon: "error",
                  title: "Credenciales incorrectas",
                  text: "Las credenciales proporcionadas no son válidas.",
                  confirmButtonText: "Aceptar"
              }).then(function(result) {
                  if (result.isConfirmed) {
                      window.location.href = "../index.php"; // Redirige al usuario a index.html después de hacer clic en "Aceptar"
                  }
              });
            </script>';
      session_destroy();
    }
    else {
      $data=$snapshot->data();
      $key=str_replace($caracteresEspeciales, '', $_POST['clave']);
      $key = hash('sha256', $key);
  
      if ($data['password'] != $key){
        echo  '<script>
                Swal.fire({
                    icon: "error",
                    title: "Credenciales incorrectas",
                    text: "Las credenciales proporcionadas no son válidas.",
                    confirmButtonText: "Aceptar"
                }).then(function(result) {
                    if (result.isConfirmed) {
                        window.location.href = "../index.php"; // Redirige al usuario a index.html después de hacer clic en "Aceptar"
                    }
                });
              </script>';
        session_destroy();
      }
      else {
  
        $_SESSION['active']=true;
        $_SESSION['rol']=$data['rol'];
        $_SESSION['id_usr']= $_POST['usuario'];
        
        echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Inicio de sesión exitoso",
                    text: "¡Bienvenido!",
                    confirmButtonText: "Continuar"
                }).then(function() {
                    window.location.href = "../sistema/"; // Redirige al usuario a ../sistema/ después de hacer clic en "Continuar"
                });
              </script>';
      }
    }
  }
}
?>
</body>
</html>

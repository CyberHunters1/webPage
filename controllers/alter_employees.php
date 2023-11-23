<?php 
session_start();
require_once '../models/conexion.php';

if($_SERVER['REQUEST_METHOD']=='POST' && $_SESSION['rol']==1){

    $regexFisica = '/^[A-Z&Ñ]{4}\d{6}[A-Z0-9]{3}$/i';
    $caracteresEspeciales = array(',', ';', '.', '"', "'");

    $rfc=$_POST['rfc'];

    $ap = rtrim(preg_replace("/[^a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s]/u", "", $_POST['ap_p']));
    $am = rtrim(preg_replace("/[^a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s-]/u", "", $_POST['ap_m']));
    $nom = rtrim(preg_replace("/[^a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s-]/u", "", $_POST['nombre']));
    $salario = rtrim(filter_var($_POST['salario'], FILTER_SANITIZE_NUMBER_INT));
    $rol = ($_POST['rol']!= 1) ? 2 : 1;

    $pass=str_replace($caracteresEspeciales, '', $_POST['token']);
    
    $rfc = strtoupper(str_replace(' ', '', $rfc));
     
    if (!preg_match($regexFisica, $rfc) || strlen($pass) < 8) {
        echo !preg_match($regexFisica, $rfc) ? 0 : 1;
    } else{

        $pass = hash('sha256', $pass);
        $nuevosDatos = [
            ['path' => 'salario', 'value'=>$salario],
            ['path' => 'nombre', 'value'=>$nombre], 
            ['path' => 'ap_p', 'value'=>$ap_p], 
            ['path' => 'ap_m', 'value'=>$ap_m], 
            ['path' => 'password', 'value'=>$password], 
            ['path' => 'rfc', 'value'=>$rfc], 
            ['path' => 'rol', 'value'=>$rol.''], 

        ];

        try {
            $documento = $firestore->collection('empleados')->document($id);
            $documento->update($nuevosDatos);
            echo "Documento actualizado exitosamente.";

        } catch (\Google\Cloud\Core\Exception\GoogleException $e) {
            echo "Error al actualizar el documento: " . $e->getMessage();
        }
    }


}



?>
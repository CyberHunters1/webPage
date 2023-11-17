<?php
session_start();

if($_SERVER['REQUEST_METHOD']=='POST' && $_SESSION['rol']==1){
    require_once '../models/conexion.php';

    $regexFisica = '/^[A-Z&Ñ]{4}\d{6}[A-Z0-9]{3}$/i';
    $caracteresEspeciales = array(',', ';', ':', '.', '/', '-', '"', "'", '+', '[', ']', '{', '}', '*');

    $rfc=$_POST['rfc'];

    $ap = rtrim(preg_replace("/[^a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s]/u", "", $_POST['ap_p']));
    $am = rtrim(preg_replace("/[^a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s-]/u", "", $_POST['ap_m']));
    $nom = rtrim(preg_replace("/[^a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s-]/u", "", $_POST['nombre']));
    $salario = rtrim(filter_var($_POST['salario'], FILTER_SANITIZE_NUMBER_INT));
    $rol = ($_POST['rol']!= 1) ? 2 : 1;

    $caracteresEspeciales = array(',', ';', ':', '.', '/', '-', '"', "'", '+', '[', ']', '{', '}', '*');
    $pass=str_replace($caracteresEspeciales, '', $_POST['password']);
    
    $rfc = strtoupper(str_replace(' ', '', $rfc));
     

    if (!preg_match($regexFisica, $rfc) || strlen($pass) < 8) {
        echo !preg_match($regexFisica, $rfc) ? 0 : 1;
    }
    else{

        $pass = hash('sha256', $pass);

        $customDocumentId =  strtolower($nom).'.'.strtolower($ap).'@example.com';
        $documentData = [
            'ap_p' => $ap,
            'ap_m' => $am,
            'nombre' => $nom,
            'password' => $pass,
            'rfc' => $rfc,
            'rol' => $rol,
            'salario' => $salario,
        ];

        $collectionReference = $firestore->collection('empleados');
        $collectionReference->document($customDocumentId)->set($documentData);

        header('location: ../sistema/');
    }
}
?>
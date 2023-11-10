<?php
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    require_once '../models/conexion.php';

    $rfc=$_POST['rfc'];

    $regexFisica = '/^[A-Z&Ñ]{4}\d{6}[A-Z0-9]{3}$/i';
    
    $rfc = strtoupper(str_replace(' ', '', $rfc));
     
     // Validar formato
     if (!(preg_match($regexFisica, $rfc))) {
        echo 0;
        
    } else{

    $ap=$_POST['ap_p'];
    $am=$_POST['ap_m'];
    $nom=$_POST['nombre'];
    $rol=$_POST['rol']; 
    $salario=$_POST['salario'];
    $pass = hash('sha256', $_POST['password']);


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
<?php
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    require_once '../models/conexion.php';
    $ap=$_POST['ap_p'];
    $am=$_POST['ap_m'];
    $nom=$_POST['nombre'];
    $rol=$_POST['rol'];
    $rfc=$_POST['rfc'];
    $salario=$_POST['salario'];
    $pass = hash('sha256', $_POST['password']);


    $customDocumentId =  strtolower($nom).'.'.strtolower($ap).'@example.com';
    $documentData = [
        'ap_m' => $ap,
        'ap_p' => $am,
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

?>
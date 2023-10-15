<?php
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    require_once '../models/conexion.php';
    
    $customDocumentId = 'user.user@example.com';
    $documentData = [
        'ap_m' => 'ap',
        'ap_p' => 'am',
        'nombre' => 'nom',
        'password' => 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855',
        'rfc' => 'APAN123456PQR',
        'rol' => '2',
        'salario' => '30000',
    ];

    $collectionReference = $firestore->collection('empleados');
    $collectionReference->document($customDocumentId)->set($documentData);

    header('location: ../sistema/');
}

?>
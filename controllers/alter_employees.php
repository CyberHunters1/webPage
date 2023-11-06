<?php 
session_start();
require_once '../models/conexion.php';

if($_SERVER['REQUEST_METHOD']=='POST'){


    $nombre=$_POST['nombre'];
    $ap_p=$_POST['ap_p']; 
    $ap_m=$_POST['ap_m'];
    $rfc=$_POST['rfc'];
    $rol=$_POST['rol'];
    $salario=$_POST['salario'];

    $id=base64_decode($_POST['token']);
    $password=hash('sha256', $_POST['password']);

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






?>
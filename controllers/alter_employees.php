<?php 
session_start();
require_once '../models/conexion.php';

if($_SERVER['REQUEST_METHOD']=='POST'){

    $id=base64_decode($_POST['id']);

    $nuevosDatos = [
        ['path' => 'salario', 'value'=>'35000'], 
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
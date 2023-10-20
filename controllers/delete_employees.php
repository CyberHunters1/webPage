<?php
session_start();


if($_SERVER['REQUEST_METHOD']=='POST'){
    require_once '../models/conexion.php';
    $id=base64_decode($_POST['id']);
    $documentReference = $firestore->collection('empleados')->document($id);

    try {
        $documentReference->delete();
        echo "Documento eliminado exitosamente.";
    } catch (e) {
        echo "Error al eliminar el documento: " . $e->getMessage();
    }

}

?>
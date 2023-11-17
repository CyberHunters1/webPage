<?php
session_start();

if($_SERVER['REQUEST_METHOD']=='POST' && $_SESSION['rol']==1){
    require_once '../models/conexion.php';
    $id=base64_decode($_POST['token']);
    $documentReference = $firestore->collection('empleados')->document($id);

    try {
        $documentReference->delete();
        echo "Documento eliminado exitosamente.";
    } catch (Exception $e) {
        echo "Error al eliminar el documento: " . $e->getMessage();
    }
}

?>
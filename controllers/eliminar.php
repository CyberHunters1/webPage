<?php
session_start();


if($_SERVER['REQUEST_METHOD']=='POST'){
    require_once '../models/conexion.php';
    $id=$_POST['id'];
    //echo "<script>console.log('Debug Objects: " . $id. "' );</script>";
    $documentReference = $firestore->collection('empleados')->document($id);

    try {
        $documentReference->delete();
        echo "Documento eliminado exitosamente.";
        //header('location: ../sistema/');
    } catch (e) {
        echo "Error al eliminar el documento: " . $e->getMessage();
    }

}

?>
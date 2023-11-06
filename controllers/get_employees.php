<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];

    if ($accion == 'obtener_empleados') {
        require "../models/conexion.php";

        $collection = $firestore->collection('empleados');
        $documents = $collection->documents();

        $empleados = array();

        if (!empty($documents)) {
            foreach ($documents as $document) {
                $dato = $document->data();
                $id_doc = $document->name();
                $id_doc = substr($id_doc, strrpos($id_doc, '/') + 1);

                if($_SESSION['rol'] == '1' or $id_doc== $_SESSION['id_usr']){
                    $salario= $dato['salario'];
                }
                else{
                    $salario= 'Privado';
                }
                $salarioFormateado = number_format($salario, 2, '.', ',');
                $empleado = array(
                    'rfc' => $dato['rfc'],
                    'nombre' => mb_convert_encoding($dato['nombre'], "UTF-8", mb_detect_encoding($dato['nombre'])),
                    'ap_p' => mb_convert_encoding($dato['ap_p'], "UTF-8", mb_detect_encoding($dato['ap_p'])),
                    'ap_m' => mb_convert_encoding($dato['ap_m'], "UTF-8", mb_detect_encoding($dato['ap_m'])),
                    'salario' => $salarioFormateado
                );
                $empleados[$id_doc] = $empleado;
            }
        } else {
            echo json_encode(array('mensaje' => 'No se encontraron datos en Firebase.'));
        }

        echo json_encode($empleados, JSON_UNESCAPED_UNICODE);

    } else {
        echo json_encode(array('error' => 'Acción no válida.'));
    }
} else {
    echo json_encode(array('error' => 'No se proporcionó la acción.'));
}


?>
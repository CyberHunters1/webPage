<?php
header('Content-Type: text/html; charset=UTF-8');
require_once "../models/conexion.php";
session_start();

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];

    if ($accion === 'imp_tabla') {
        $users = $_REQUEST['users'];
        $cont = 1;
        $content = '';

        foreach ($users as $id_usr => $user) {
            $content .= '<tr data-id="'.base64_encode($id_usr).'">
                <td>' . $cont . '</td>
                <td>' . $user['rfc'] . '</td>
                <td>' . $user['nombre'] . '</td>
                <td>' . $user['ap_p'] . '</td>
                <td>' . $user['salario'] . '</td>';

            if ($_SESSION['rol'] == 1) {
                $content .= '
                <td>
                    <button class="editar btn btn-success"><i class="fa fa-pencil"></i></button>        
                    <button class="eliminar btn btn-danger"><i class="fa fa-trash"></i></button>
                </td>
                ';
            }

            $content .= '</tr>';
            $content .= '
            <script type="text/javascript" src="../public/js/ajax.js"></script>';
            
            $cont++;
        }

        echo $content;
    }
}
?>
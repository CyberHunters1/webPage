<?php
header('Content-Type: text/html; charset=UTF-8');
require_once "../conexion.php";
session_start();
$_SESSION['rol'] = $_COOKIE['rol'];

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];

    if ($accion === 'imp_tabla') {
        $users = $_REQUEST['users'];
        $cont = 1;
        $content = '';

        foreach ($users as $id_usr => $user) {
            $content .= '<tr>
                <td>' . $cont . '</td>
                <td>' . $user['rfc'] . '</td>
                <td>' . $user['nombre'] . '</td>
                <td>' . $user['ap_p'] . '</td>
                <td>' . $user['salario'] . '</td>';

            if ($_SESSION['rol'] == 1) {
                $content .= '
                <td>
                    <a href="clientes_alter.php?id=' . $id_usr . '" class="btn btn-success"><i class="fa fa-pencil"></i></a>        
                    <form method="post" class="confirmar d-inline">
                        <input type="hidden" name="id" value="' . $id_usr . '">
                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
                ';
            }

            $content .= '</tr>';
            $cont++;
        }

        setcookie("rol", "", time() - 3600, "/");

        echo $content;
    }
}
?>
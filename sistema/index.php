<?php
session_start();
$_SESSION['active'] = $_COOKIE['active'];
$_SESSION['rol'] = $_COOKIE['rol'];
setcookie("active", "", time() - 3600, "/");
setcookie("rol", "", time() - 3600, "/");

require_once "../conexion.php";

if (empty($_SESSION['active'])) {
	header('location: ../');
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Llamar a GET desde HTML</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div>
            <h1>Uusarios</h1>
            <form action="close.php" method="post">
                <button type="submit">
                    Cerrar sesión
                </button>
            </form>
            <button id="get_empleados">Obtener Empleados</button>
        </div>
        <div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>RFC</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Salario</th>
                            <?php if ($_SESSION['rol']==1) { ?>
                            <th>Acciones</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div id="respuesta"></div>

                <script>
                $(document).ready(function() {
                    $('#get_empleados').click(function() {
                        $.ajax({
                            url: 'func.php',
                            method: 'GET',
                            data: {
                                accion: 'obtener_empleados'
                            },
                            success: function(data) {
                                $('#respuesta').html(data);
                            },
                            error: function() {
                                $('#respuesta').html('Error al obtener empleados.');
                            }
                        });
                    });
                });
                </script>
            </div>
        </div>
    </div>

</body>

</html>
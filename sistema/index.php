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

<div class="container-fluid">
    <!-- Page Heading -->
    <div >
        <h1 >Uusarios</h1>
        <form action="close.php" method="post">
            <button  type="submit">
                Cerrar sesión
            </button>
        </form>
    </div>
    <div >
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
                    <?php
                    $collection = $_SESSION['conexion']->collection('empleados');
                    $documents = $collection->documents();
                    if (!empty($documents)) {
                        foreach ($documents as $document) {
                            $dato = $document->data();
                            ?>
                            <tr>
                                <td><?php echo $dato['rfc']; ?></td>
                                <td><?php echo $dato['nombre']; ?></td>
                                <td><?php echo $dato['ap_p']; ?></td>
                                <td><?php echo $dato['salario']; ?></td>
                                <?php if ($_SESSION['rol'] == 1) { ?>
                                <?php } ?>
                            </tr>
                            <?php
                        }
                    } else {
                        // No se encontraron datos en Firebase
                        echo "No se encontraron datos en Firebase.";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
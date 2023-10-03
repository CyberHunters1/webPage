<?php
require 'vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;


$archivoCredenciales = 'json/cyber.json';
$contenidoCredenciales = file_get_contents($archivoCredenciales);
$credenciales = json_decode($contenidoCredenciales, true);

if ($credenciales === null) {
    die("Error al leer el archivo JSON de credenciales.");
}

$firestore = new FirestoreClient([
    'keyFile' => $credenciales
]);


?>
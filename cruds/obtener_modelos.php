<?php

include '../includes/Database.php';
include '../includes/Automovil.php';

$database = new Database();
$db = $database->getConnection();

$automovil = new Automovil($db);

if (isset($_GET['marca_id']) && isset($_GET['tipo_vehiculo_id'])) {
    $marca_id = $_GET['marca_id'];
    $tipo_vehiculo_id = $_GET['tipo_vehiculo_id'];

    $modelos = $automovil->obtenerModelos($marca_id, $tipo_vehiculo_id);
    
    echo json_encode($modelos);
}

?>

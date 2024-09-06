<?php
include_once 'Database.php';
include_once 'automovil.php';

$database = new Database();
$db = $database->getConnection();

$automovil = new Automovil($db);

$automovil->id = $_POST['id'];
$automovil->marca = $_POST['marca'];
$automovil->modelo = $_POST['modelo'];
$automovil->anio = $_POST['anio'];
$automovil->color = $_POST['color'];
$automovil->placa = $_POST['placa'];

if ($automovil->actualizar()) {
    echo "Automóvil actualizado con éxito.";
} else {
    echo "Hubo un error al actualizar el automóvil.";
}
?>

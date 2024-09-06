<?php
include_once 'Database.php';
include_once 'automovil.php';

$database = new Database();
$db = $database->getConnection();

$automovil = new Automovil($db);
$id = $_GET['id']; 

$result = $automovil->buscar($id);

if ($result) {
    echo "Marca: " . $result['marca'] . "<br>";
    echo "Modelo: " . $result['modelo'] . "<br>";
    echo "Año: " . $result['anio'] . "<br>";
    echo "Color: " . $result['color'] . "<br>";
    echo "Placa: " . $result['placa'] . "<br>";
} else {
    echo "No se encontró el automóvil.";
}
?>

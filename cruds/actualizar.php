<?php
include_once '../includes/Database.php';
include_once '../includes/automovil.php';

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
    echo "<script>
                alert('Automóvil actualizado correctamente.');
                window.location.href = '../views/principal_vehiculos.php';
              </script>";
} else {
    echo "<script>
                alert('Error al actualizar el automovil.');
                window.location.href = '../views/principal_vehiculos.php';
              </script>";}
?>

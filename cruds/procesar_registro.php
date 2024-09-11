<?php

include '../includes/Database.php';
include '../includes/Automovil.php';

$database = new Database();
$db = $database->getConnection();

$automovil = new Automovil($db);

// Obtener los datos
$automovil->marca = $_POST['marca'];
$automovil->modelo = $_POST['modelo'];
$automovil->anio = $_POST['anio'];
$automovil->color = $_POST['color'];
$automovil->placa = $_POST['placa'];
$automovil->color = $_POST['numero_motor'];
$automovil->placa = $_POST['numero_chasis'];


if ($automovil->registrar()) {
    echo "<script>
            alert('Registro realizado exitosamente.');
            setTimeout(function(){
                window.location.href = '../views/principal_vehiculos.php';
            }, 5000);
          </script>";
} else {
    echo "<script>
                alert('Error al registrar el automovil.');
                window.location.href = '../views/principal_vehiculos.php';
              </script>";
}

?>

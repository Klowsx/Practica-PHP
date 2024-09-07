<?php
// Incluir archivos de conexión y clase Automovil
include '../includes/Database.php';
include '../includes/Automovil.php';

// Crear una instancia de la clase Database y obtener la conexión
$database = new Database();
$db = $database->getConnection();

// Crear una instancia de la clase Automovil
$automovil = new Automovil($db);

// Obtener los datos del formulario
$automovil->marca = $_POST['marca'];
$automovil->modelo = $_POST['modelo'];
$automovil->anio = $_POST['anio'];
$automovil->color = $_POST['color'];
$automovil->placa = $_POST['placa'];

// Registrar el automóvil
if ($automovil->registrar()) {
    echo "<script>
                alert('Automóvil registrado correctamente.');
                window.location.href = '../views/principal_vehiculos.php';
              </script>";
} else {
    echo "<script>
                alert('Error al registrar el automovil.');
                window.location.href = '../views/principal_vehiculos.php';
              </script>";
}

?>

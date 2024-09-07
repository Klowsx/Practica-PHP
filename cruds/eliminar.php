<?php
include_once '../includes/Database.php';
include_once '../includes/automovil.php';


$database = new Database();
$db = $database->getConnection();


$automovil = new Automovil($db);

if (isset($_GET['id'])) {
    $id = $_GET['id']; 

    if ($automovil->eliminar($id)) {
        echo "<script>
                alert('Automóvil eliminado correctamente.');
                window.location.href = '../views/principal_vehiculos.php';
              </script>";
    } else {
        echo "<script>
                alert('Hubo un error al eliminar el automóvil.');
                window.location.href = '../views/principal_vehiculos.php';
              </script>";
    }}
?>

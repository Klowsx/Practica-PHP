<?php
include_once 'Database.php';
include_once 'automovil.php';

$database = new Database();
$db = $database->getConnection();

$automovil = new Automovil($db);
$id = $_POST['id'];

if ($automovil->eliminar($id)) {
    echo "Automóvil eliminado.";
} else {
    echo "Hubo un error al eliminar el automóvil.";
}
?>

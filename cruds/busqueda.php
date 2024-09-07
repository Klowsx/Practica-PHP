<?php
include_once '../includes/Database.php'; // Incluye la lógica de la base de datos
include_once '../includes/automovil.php'; // Incluye la clase Automovil

// Conectar a la base de datos
$database = new Database();
$db = $database->getConnection();

// Crear una instancia de Automovil
$automovil = new Automovil($db);

// Definir la variable de búsqueda
$searchTerm = isset($_GET['buscar']) ? $_GET['buscar'] : '';

// Preparar la consulta
if (!empty($searchTerm)) {
    $query = "SELECT * FROM automoviles WHERE id LIKE :searchTerm OR placa LIKE :searchTerm";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%'); // Uso de LIKE para búsqueda parcial
} else {
    $query = "SELECT * FROM automoviles";
    $stmt = $db->prepare($query);
}

// Ejecutar la consulta
$stmt->execute();
?>

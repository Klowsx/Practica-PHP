<?php
include_once '../includes/Database.php'; 
include_once '../includes/automovil.php'; 


$database = new Database();
$db = $database->getConnection();

$automovil = new Automovil($db);

$searchTerm = isset($_GET['buscar']) ? $_GET['buscar'] : '';

if (!empty($searchTerm)) {
    $query = "SELECT * FROM automoviles WHERE placa LIKE :searchTerm";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
} else {
    $query = "SELECT * FROM automoviles";
    $stmt = $db->prepare($query);
}


$stmt->execute();
?>

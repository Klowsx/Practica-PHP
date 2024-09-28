<?php
include '../includes/Database.php';
$database = new Database();
$db = $database->getConnection();

$query = "SELECT id, nombre FROM marcas";
$stmt = $db->prepare($query);
$stmt->execute();

$marcas = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($marcas);
?>

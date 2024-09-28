<?php
include '../includes/Database.php';
$database = new Database();
$db = $database->getConnection();

$query = "SELECT id, nombre FROM tipos_vehiculos";
$stmt = $db->prepare($query);
$stmt->execute();

$tipos = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($tipos);
?>

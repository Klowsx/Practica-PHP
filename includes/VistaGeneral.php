<?php
include '../includes/Database.php'; // Clase que contiene la conexión a la base de datos

// Definir la clase Automovil para manejar la consulta de datos
class Automovil {
    private $conn;
    private $table_name = "automoviles";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Obtener todos los automóviles
    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Buscar un automóvil por ID o placa
    public function search($term) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id LIKE ? OR placa LIKE ?";
        $stmt = $this->conn->prepare($query);
        $term = "%{$term}%";
        $stmt->bindParam(1, $term);
        $stmt->bindParam(2, $term);
        $stmt->execute();
        return $stmt;
    }
}

// Crear una instancia de la clase Database y Automovil
$database = new Database();
$db = $database->getConnection();
$automovil = new Automovil($db);

// Si se recibe un término de búsqueda, buscar en la base de datos
if (isset($_GET['buscar'])) {
    $stmt = $automovil->search($_GET['buscar']);
} else {
    // De lo contrario, obtener todos los registros
    $stmt = $automovil->getAll();
}
?>

<?php
class Automovil {
    private $conn; // Conexión a la base de datos
    private $table_name = "automoviles"; // Nombre de la tabla

    // Propiedades de la clase
    public $id;
    public $marca;
    public $modelo;
    public $anio;
    public $color;
    public $placa;
    public $numero_motor;
    public $numero_chasis;
    public $tipo_vehiculo;

    // Constructor que recibe la conexión a la base de datos
    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para registrar un nuevo automóvil
    public function registrar() {
        $query = "INSERT INTO " . $this->table_name . " (marca, modelo, anio, color, placa, numero_motor, numero_chasis) VALUES (:marca, :modelo, :anio, :color, :placa, :numero_motor, :numero_chasis)";
        $stmt = $this->conn->prepare($query);

        // Limpiar los datos
        $this->marca = htmlspecialchars(strip_tags($this->marca));
        $this->modelo = htmlspecialchars(strip_tags($this->modelo));
        $this->anio = htmlspecialchars(strip_tags($this->anio));
        $this->color = htmlspecialchars(strip_tags($this->color));
        $this->placa = htmlspecialchars(strip_tags($this->placa));
        $this->numero_motor = htmlspecialchars(strip_tags($this->numero_motor));
        $this->numero_chasis = htmlspecialchars(strip_tags($this->numero_chasis));

        // Enlazar los parámetros
        $stmt->bindParam(":marca", $this->marca);
        $stmt->bindParam(":modelo", $this->modelo);
        $stmt->bindParam(":anio", $this->anio);
        $stmt->bindParam(":color", $this->color);
        $stmt->bindParam(":placa", $this->placa);
        $stmt->bindParam(":numero_motor", $this->numero_motor);
        $stmt->bindParam(":numero_chasis", $this->numero_chasis);

        return $stmt->execute();
    }

    // Método para eliminar un automóvil por ID
    public function eliminar($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }

    // Método para actualizar un automóvil - SiN TERMINAR
    public function actualizar() {
        $query = "UPDATE " . $this->table_name . " SET marca = :marca, modelo = :modelo, anio = :anio, color = :color, placa = :placa WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->marca = htmlspecialchars(strip_tags($this->marca));
        $this->modelo = htmlspecialchars(strip_tags($this->modelo));
        $this->anio = htmlspecialchars(strip_tags($this->anio));
        $this->color = htmlspecialchars(strip_tags($this->color));
        $this->placa = htmlspecialchars(strip_tags($this->placa));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":marca", $this->marca);
        $stmt->bindParam(":modelo", $this->modelo);
        $stmt->bindParam(":anio", $this->anio);
        $stmt->bindParam(":color", $this->color);
        $stmt->bindParam(":placa", $this->placa);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    //FUNCION PARA OBTENER TODAS LAS MARCAS
    public function obtenerMarcas() {
        $query = "SELECT * FROM marcas";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //FUNCION PARA OBTENER LOS TIPOS DE VEHICULOS
    public function obtenerTiposVehiculos() {
        $query = "SELECT * FROM tipos_vehiculos";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //FUNCION PARA OBTENER LOS MODELOS
    public function obtenerModelos($marca_id, $tipo_vehiculo_id) {
        $query = "SELECT * FROM modelos WHERE marca_id = :marca_id AND tipo_vehiculo_id = :tipo_vehiculo_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":marca_id", $marca_id);
        $stmt->bindParam("tipo_vehiculo_id", $tipo_vehiculo_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>

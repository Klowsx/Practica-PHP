<?php
class Usuario{
    public $conn;
    public $table_name = "propietarios"; 
    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $telefono;
    public $direccion;
    public $tipo_propietario;

        public function __construct($db) {
        $this->conn = $db;
    }

    public function registrarUsuario(){
        $query = "INSERT INTO " . $this->table_name . " (nombre, apellido, telefono, direccion, email, tipo_propietario) 
                  VALUES (:nombre, :apellido, :telefono, :direccion, :email, :tipo_propietario)";
        $stmt = $this->conn->prepare($query);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->apellido = htmlspecialchars(strip_tags($this->apellido));
        $this->telefono = htmlspecialchars(strip_tags($this->telefono));
        $this->direccion = htmlspecialchars(strip_tags($this->direccion));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->tipo_propietario = htmlspecialchars(strip_tags($this->tipo_propietario));

        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':apellido', $this->apellido);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':direccion', $this->direccion);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':tipo_propietario', $this->tipo_propietario);
        return $stmt->execute();
    
    }

}

?>
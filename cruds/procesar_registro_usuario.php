<?php

include '../includes/Database.php';
include '../includes/Usuario.php';

$database = new Database();
$db = $database->getConnection();

$usuario = new Usuario($db);

// Obtener los datos
$usuario->nombre = $_POST['nombre'];
$usuario->apellido = $_POST['apellido'];
$usuario->telefono = $_POST['telefono'];
$usuario->direccion = $_POST['direccion'];
$usuario->email = $_POST['email'];
$usuario->tipo_propietario = $_POST['tipoPropietario'];

if ($usuario->registrarUsuario()) {
    echo "<script>
            alert('Registro realizado exitosamente.');
            setTimeout(function(){
                window.location.href = '../views/principal_vehiculos.php';
            }, 5000);
          </script>";
} else {
    echo "<script>
            alert('Error al registrar el usuario.');
            window.location.href = '../views/principal_vehiculos.php';
          </script>";
}

?>

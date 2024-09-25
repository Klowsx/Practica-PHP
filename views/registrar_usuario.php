<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Propietario</title>
    <link rel="stylesheet" href="../css/registrar_usuario.css">
</head>
<body>
    <div class="contForm">
        <h2>Registrar Propietario</h2>
        <form action="../cruds/procesar_registro_propietario.php" method="post">
            <div class="form-group">
                <label for="tipoPropietario">Tipo de Propietario:</label>
                <select id="tipoPropietario" name="tipoPropietario" required>
                    <option value="">Seleccione</option>
                    <option value="natural">Natural</option>
                    <option value="juridico">Jurídico</option>
                </select>
            </div>
                        <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <textarea id="direccion" name="direccion" rows="3" required></textarea>
            </div>

            <div class="form-group btn-group">
                <input type="button" value="Cancelar" class="btn cancelar" onclick="window.location.href='../views/principal_vehiculos.php';">
            <input type="submit" value="Registrar" class="btn">
                </div>
        </form>
    </div>
</body>
</html>

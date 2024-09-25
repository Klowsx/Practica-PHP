<?php
include '../cruds/busqueda.php'; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Automóviles</title>
    <link rel="stylesheet" href="../css/principal.css">
</head>
<body>
    <main>
        <h2>Lista de Automóviles</h2>
        
        <!-- Formulario de búsqueda -->
        <form method="GET" action="principal_vehiculos.php">
            <input type="text" class="barra" name="buscar" placeholder="Buscar por ID o Placa" value="<?php echo htmlspecialchars($searchTerm); ?>">
            <button type="submit" class="btn">Buscar</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Placa</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Color</th>
                    <th>N° de motor</th>
                    <th>N° de chasis</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($stmt->rowCount() > 0): ?>
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['placa']); ?></td>
                        <td><?php echo htmlspecialchars($row['marca']); ?></td>
                        <td><?php echo htmlspecialchars($row['modelo']); ?></td>
                        <td><?php echo htmlspecialchars($row['anio']); ?></td>
                        <td><?php echo htmlspecialchars($row['color']); ?></td>
                        <td><?php echo htmlspecialchars($row['numero_motor']); ?></td>
                        <td><?php echo htmlspecialchars($row['numero_chasis']); ?></td>
                        
                        <td class="acciones">
                            <!-- Botones de acción -->
                            <a href="../cruds/actualizar.php?id=<?php echo $row['id']; ?>" class="btn actualizar">Actualizar</a>
                            <a href="../cruds/eliminar.php?id=<?php echo $row['id']; ?>" class="btn eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar este automóvil?')">Eliminar</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="9">No se encontraron automóviles.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
    
<div class="contBtn">
    <a href="../views/registrar_automovil.php" class="btn">Registrar Automóvil</a>
      <a href="../views/registrar_usuario.php" class="btn">Registrar Usuario</a>
</div>


    <footer>
        <p>&copy; Javier Hernandez 8-1001-178 1LS131</p>
    </footer>
</body>
</html>

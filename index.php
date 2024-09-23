<?php
include 'conexion.php';  // Conexión a la base de datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Registrar Producto</h1>
    <form action="insertar.php" method="POST">
        <label for="idProd">ID del Producto:</label>
        <input type="number" name="idProd" id="idProd" required>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="precio">Precio:</label>
        <input type="number" step="0.01" name="precio" id="precio" required>

        <label for="existencia">Existencia:</label>
        <input type="number" name="existencia" id="existencia" required>

        <button type="submit">Registrar</button>
    </form>

    <h2>Lista de Productos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Existencia</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Consulta para obtener los productos ingresados
            $sql = "SELECT idProd, nombre, precio, existencia FROM productos";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Mostrar los productos en la tabla
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["idProd"] . "</td>";
                    echo "<td>" . $row["nombre"] . "</td>";
                    echo "<td>$" . number_format($row["precio"], 2) . "</td>";
                    echo "<td>" . $row["existencia"] . "</td>";
                    echo "<td><a href='eliminar.php?idProd=" . $row["idProd"] . "'>Eliminar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No hay productos registrados</td></tr>";
            }

            // Cerrar conexión
            $conn->close();
            ?>
        </tbody>
    </table>
</div>
</body>
</html>

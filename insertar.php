<?php
include 'conexion.php';  // Conexión a la base de datos

// Verifica si si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idProd = $_POST["idProd"];
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $existencia = $_POST["existencia"];

    // Verificar si el idProd ya existe
    $sql_check = "SELECT idProd FROM productos WHERE idProd = '$idProd'";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        // Mostrar mensaje de error en lugar de redirigir
        $error_message = "El ID del producto ya existe. Por favor, elige otro.";
    } else {
        // Inserta los datos en la base de datos
        $sql = "INSERT INTO productos (idProd, nombre, precio, existencia) VALUES ('$idProd', '$nombre', '$precio', '$existencia')";

        if ($conn->query($sql) === TRUE) {
            // Redirigir solo si el producto fue registrado correctamente
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Producto</title>
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

    <!-- Mensaje de error -->
    <?php
    if (!empty($error_message)) {
        echo "<div class='error'>$error_message</div>";
    }
    ?>
</div>
</body>
</html>


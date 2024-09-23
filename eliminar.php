<?php
include 'conexion.php';  // Conexión a la base de datos

// Verifica si se ha recibido un idProd para eliminar
if (isset($_GET["idProd"])) {
    $idProd = $_GET["idProd"];

    // Elimina el producto de la base de datos
    $sql = "DELETE FROM productos WHERE idProd = $idProd";
    
    if ($conn->query($sql) === TRUE) {
        echo "Producto eliminado correctamente.";
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }

    // Redirigir al index.php
    header("Location: index.php");
    exit();
}
?>

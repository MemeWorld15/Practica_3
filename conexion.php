<?php
$host = 'sql108.infinityfree.com';  
$usuario = 'if0_37365067';  
$password = '9CebLwQHZV';  
$base_datos = 'if0_37365067_ventapro'; 

// Crear la conexión
$conn = new mysqli($host, $usuario, $password, $base_datos);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

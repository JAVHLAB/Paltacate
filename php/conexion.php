<?php
// Datos de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "paltacate";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
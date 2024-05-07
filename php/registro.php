<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO usuarios (nombre, email, contrasena, nombre_usuario) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nombre, $email, $contrasena_encriptada, $nombre_usuario);
    $stmt->execute();

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
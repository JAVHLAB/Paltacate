<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "conexion.php";

    $usuario = $_POST['username'];
    $password = $_POST['password'];

    // Encriptar la contraseña para compararla con la almacenada en la base de datos
    $password = hash('sha512', $password);

    // Verificar que el usuario existe en la base de datos
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre_usuario ='$usuario'");

    if (mysqli_num_rows($verificar_usuario) == 0) {
        echo "Usuario no existente, intentalo otra vez";
        exit();
    }

    // Verificar la contraseña
    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre_usuario ='$usuario' AND contrasena='$password'");

    if(mysqli_num_rows($validar_login) > 0){
        echo "Entraste a sesion";
        exit();
    } else {
        echo "Error al entrar sesion";
    }
}
?>


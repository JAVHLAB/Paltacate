<?php

include 'conexion.php';

// Empezamos las sesion
session_start(); 

$usuario = mysqli_real_escape_string($conexion, $_POST['username']);
$password = mysqli_real_escape_string($conexion, $_POST['password']);

// Verificar que el usuario existe en la base de datos
$verificar_usuario = mysqli_query($conexion, "SELECT nombre_usuario FROM usuarios WHERE nombre_usuario = '$usuario'");

if (mysqli_num_rows($verificar_usuario) == 0) {
    echo '
        <script>
            alert("Usuario o contraseña incorrecta, intentrlo de nuevo!");
            window.location = "../login.php";
        </script>';
    exit();
}

// Encriptar la contraseña para compararla con la almacenada en la base de datos
$password = sha1($password);

$validar_login = mysqli_query($conexion, "SELECT ID_usuario FROM usuarios WHERE nombre_usuario ='$usuario' and contrasena='$password'");

if (mysqli_num_rows($validar_login) > 0) {
    $row = mysqli_fetch_assoc($validar_login);
    $_SESSION['ID_usuario'] = $row['ID_usuario'];
    header("location: ../perfil.php");
    exit();
} else {
    echo '
        <script>
            alert("Error al ingresar, favor de intentarlo más tarde!");
            window.location = "../login.php";
        </script>
    ';
    exit();
}

?>

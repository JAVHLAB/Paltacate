<?php

// El rol con número 1 es el rol que a todos los usuarios "normales" se les da
// No olviden poner la consulta el la tabla de roles(si no marca error)   INSERT INTO roles (ID_rol, nombre) VALUES (1, 'normal'), (2, 'moderador'), (3, 'administrador');

include 'conexion.php';

$nombre_completo = $_POST['fullname'];
$email = $_POST['email'];
$usuario = $_POST['username'];
$password = $_POST['password'];

// Validar la longitud del usuario
if (strlen($usuario) < 8 || strlen($usuario) > 20) {
    echo "¡El nombre de usuario debe tener entre 8 y 20 caracteres";
    exit();
}

// Validar la longitud de la contraseña
if (strlen($password) < 8 || strlen($password) > 12) {
    echo "¡La contraseña debe tener entre 8 y 12 caracteres!";
    exit();
}

// Encriptar la contraseña
$password = hash('sha512', $password);

// Verificar que el correo no se repita en la base de datos
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email ='$email'");

if (mysqli_num_rows($verificar_correo) > 0) {
    echo "Correo existente, intentalo otra vez";
    exit();
}

// Verificar que el usuario no se repita en la base de datos
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre_usuario ='$usuario'");

if (mysqli_num_rows($verificar_usuario) > 0) {
    echo "Usuario existente, intentalo otra vez";
    exit();
}

$query = "INSERT INTO usuarios(nombre, email, nombre_usuario, contrasena)
            VALUES('$nombre_completo', '$email', '$usuario', '$password')";

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    // Obtener el ID del usuario recién registrado
    $id_usuario = mysqli_insert_id($conexion);

    // El rol por default será 1
    $id_rol = 1;

    // Insertar en la tabla usuarios_roles
    $query_roles = "INSERT INTO usuarios_roles(ID_usuario, ID_rol) VALUES('$id_usuario', '$id_rol')";
    $ejecutar_roles = mysqli_query($conexion, $query_roles);

    if ($ejecutar_roles) {
        echo "Registrado y rol asignado";
    } else {
        echo "Registrado, pero no se pudo asignar el rol";
    }
} else {
    echo "No Registrado";
}

mysqli_close($conexion);
exit();

?>

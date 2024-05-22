<?php

include 'conexion.php';

$nombre_completo = $_POST['fullname'];
$email = $_POST['email'];
$usuario = $_POST['username'];
$password = $_POST['password'];

// Validar la longitud del usuario
if (strlen($usuario) < 8 || strlen($usuario) > 20) {
    echo '<script>
        alert("¡El nombre de usuario debe tener entre 8 y 20 caracteres");
        window.location = "../login.php";
        </script>';
    exit();
}

// Validar la longitud de la contraseña
if (strlen($password) < 8 || strlen($password) > 12) {
    echo '<script>
        alert("¡La contraseña debe tener entre 8 y 12 caracteres!");
        window.location = "../login.php";
        </script>';
    exit();
}

// Verificar que el correo no se repita en la base de datos
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email ='$email'");
if (mysqli_num_rows($verificar_correo) > 0) {
    echo '<script>
        alert("¡Correo existente, intentalo otra vez!");
        window.location = "../login.php";
        </script>';
    exit();
}

// Verificar que el usuario no se repita en la base de datos
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre_usuario ='$usuario'");
if (mysqli_num_rows($verificar_usuario) > 0) {
    echo '<script>
    alert("¡Usuario existente, intentalo otra vez!");
    window.location = "../login.php";
    </script>';
    exit();
}

// Validar y encriptar la contraseña (omitiendo las validaciones aquí por brevedad)
$password = sha1($password);

// Insertar el usuario en la base de datos con el token de activación
$query = "INSERT INTO usuarios (nombre, email, nombre_usuario, contrasena)
          VALUES ('$nombre_completo', '$email', '$usuario', '$password')";

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
    echo '<script>
        alert("¡Registro exitoso! Por favor, verifica tu correo electrónico para activar tu cuenta.");
        window.location = "../login.php";
        </script>';
} else {
    echo '<script>
        alert("¡Error en el registro, intentalo otra vez!")
        window.location = "../registro.html";
        </script>';
}

mysqli_close($conexion);
exit();

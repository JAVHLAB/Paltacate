<?php

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

// Generar un token único para la activación de la cuenta
//$token = bin2hex(random_bytes(16));

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
    //enviarCorreoActivacion($email, $token); // Enviar correo de activación
    echo '<script>
        alert("¡Registro exitoso! Por favor, verifica tu correo electrónico para activar tu cuenta.");
        window.location = "../login.html";
        </script>';
} else {
    echo '<script>
        alert("¡Error en el registro, intentalo otra vez!")
        window.location = "../registro.html";
        </script>';
}

mysqli_close($conexion);
exit();

/*// Función para enviar el correo de activación usando PHPMailer
function enviarCorreoActivacion($email, $token) {
    global $mail; // Esto permite acceder a la instancia de PHPMailer declarada fuera de la función

    try {
        $mail = new PHPMailer(true);

        $mail->SMTPDebug = 2;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username = 'recetariopaltacate@gmail.com'; 
        $mail->Password = 'paltacate2024Thelma';                //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


        // Destinatarios
        $mail->setFrom('recetariopaltacate@gmail.com', 'Paltacate');
        $mail->addAddress($email);

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Activación de cuenta';
        $mail->Body    = "Hola, por favor haz clic en el siguiente enlace para activar tu cuenta: <a href='http://localhost/paltacate/activar.php?token=$token'>Activar cuenta</a>";
        $mail->AltBody = "Hola, por favor haz clic en el siguiente enlace para activar tu cuenta: http://localhost/paltacate/activar.php?token=$token";
        
        $mail->send();
        echo "Mensaje Enviado con exito";
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}*/
?>

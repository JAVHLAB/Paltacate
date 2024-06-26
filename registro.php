<?php
        session_start();

        if(isset($_SESSION['ID_usuario'])){
            header("location: perfil.php");
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>SignIn</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:wght@100..900&family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <main>
        <div class="login-container sign-container">                
                <h2>Registrarse</h2>
                <form action="php/registro_code.php" method="POST">
                    <input type="text" name="fullname" placeholder="Nombre completo" required>
                    <input type="text" name="username" placeholder="Usuario" required>
                    <input type="email" name="email" placeholder="Correo electrónico" required>
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <button class="boton" type="submit">Crear cuenta</button>
                </form>
                <p>¿Ya estas registrado? <a class="links" href="login.php">Inicia sesión aquí</a></p>
                <p>O vuelve al inicio <a class="links" href="index.php">aquí</a></p>
         </div>
            
    </main>

    <footer class="footer">
        <div class="columna">
            <h3>Perfil</h3>
            <ul>
                <li><a href="login.php">Iniciar Sesión</a></li>
                <li><a href="registro.php">Registrarse</a></li>
            </ul>
        </div>
        <div class="columna">
            <h3>Importante</h3>
            <ul>
                <li><a href="#">Sobre Nosotros</a></li>
                <li><a href="#">Nuevas Recetas</a></li>
            </ul>
        </div>
        <div class="columna">
            <h3>Menú</h3>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Explorar</a></li>
                <li><a href="#">Crear Receta</a></li>
            </ul>
        </div>
        <div class="columna">
            <p>Derechos Reservados PALTACATE.COM 2024</p>
        </div>
    </footer> 
</body>
</html>
<?php
session_start();

if (isset($_SESSION['ID_usuario'])) {
    echo '
    <script>
        alert("¡Ya iniciaste sesion!");
        window.location = "perfil.php";
    </script>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:wght@100..900&family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <main>
        <div class="login-container">
            <div class="iconos">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="100" height="100" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                    <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                    <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                </svg>
            </div>

            <h2>Iniciar sesión</h2>
            <form action="php/login_code.php" method="POST">
                <input type="text" name="username" placeholder="Usuario" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button class="boton" type="submit">Iniciar Sesion</button>
            </form>
            <p>¿Aún no tienes una cuenta? <a class="links" href="registro.php">Regístrate aquí</a></p>
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
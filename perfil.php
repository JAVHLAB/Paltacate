<?php

include("php/conexion.php");

session_start();
if (!isset($_SESSION["ID_usuario"])) {
    echo '
    <script>
        alert("¡Inicia Sesion para crear recetas!");
        window.location = "login.php";
    </script>';
    exit();
}

$iduser = $_SESSION['ID_usuario'];

$iduser = mysqli_real_escape_string($conexion, $iduser);

$query_nombre = "SELECT  nombre_usuario FROM usuarios WHERE ID_usuario = $iduser";
$resultado_nombre = mysqli_query($conexion, $query_nombre);

$query_foto = "SELECT  foto_perfil FROM perfil WHERE ID_usuario = $iduser";
$resultado_foto = mysqli_query($conexion, $query_foto);

if (!$resultado_nombre || !$resultado_foto) {
    die("Query failed: " . mysqli_error($conexion));
}

$row_nombre = mysqli_fetch_assoc($resultado_nombre);
$row_foto = mysqli_fetch_assoc($resultado_foto);

if ($row_nombre && $row_foto) {
    $nombre_usuario = $row_nombre['nombre_usuario'];
    $foto = $row_foto['foto_perfil'];
} else {
    echo "No user found with ID: $iduser";
    exit();
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Paltacate</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0">
    <link rel="preconexionect" href="https://fonts.googleapis.com">
    <link rel="preconexionect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:wght@100..900&family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/perfil.css">
    <link rel="stylesheet" href="css/explorar.css">
</head>

<body>
    </head>

    <body>
        <header>
            <nav id="navbar-paltacate">
                <a href="index.php"><img src="img/paltacate_logo.png" alt="Paltacate_icon" id="paltacate-icon"></a>
                <div class="left-items">
                    <ul class="first">
                        <li><a href="index.php" id="inicio">Inicio</a></li>
                        <li><a href="explorar.php" id="explorar">Explorar</a></li>
                        <li><a href="crearReceta.php" id="Crear">Crear receta</a></li>
                    </ul>
                </div>

                <div class="search">
                    <form method="post" action="busqueda.php">
                        <div class="barra">
                            <div><span class="material-symbols-outlined" id="lupa">search</span></div>
                            <input type="text" placeholder="Buscar" class="finder" name="busqueda">
                        </div>
                    </form>
                </div>

                <div class="right-items">
                    <a href="#" onclick="toggleMenu()">
                        <span class="material-symbols-outlined" id="profile-img">account_circle</span>
                    </a>

                </div>
                <script>
                    window.onload = function() {
                        var profileImg = document.getElementById("profile-img");
                        profileImg.click();
                        profileImg.click();
                    };
                </script>


                <div id="menu" class="menu">
                    <ul>
                        <li><a href="perfil.php">Perfil</a></li>
                        <li><a href="php/cerrar_sesion.php" onclick="cerrarSesion()">Cerrar Sesión</a></li>
                    </ul>
                </div>
            </nav>
        </header>

        <main>
            <div class="contenido-portada">
                <div class="background-image"></div>
                <img src="img/hotdog.jpg" alt="Imagen de contacto" class="contact-image">
                <a class="boton" href="editarPerfil.php">Editar</a>
            </div>

            <div class="contenido-solido">
                <h3><?php echo htmlspecialchars($nombre_usuario); ?></h3>
                <div class="iconos">
                    <a class="icono" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="44" height="44" viewBox="0 0 24 24" stroke-width="2" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                            <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                            <path d="M16.5 7.5l0 .01" />
                        </svg>
                    </a>
                    <a class="icono" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-x" width="44" height="44" viewBox="0 0 24 24" stroke-width="2" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 4l11.733 16h4.267l-11.733 -16z" />
                            <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="container-etiqueta">
                <div class="etiqueta">
                    <h2>Recetas Creadas</h2>
                </div>
            </div>

            <div class="container-crear">
                <a href="crearReceta.php">
                    <p>Nueva Publicación</p>
                </a>
            </div>
            <hr>


            <?php
            // Incluir el archivo de conexión
            include 'php/conexion.php';

            // Suponiendo que tienes una variable $iduser que contiene el ID del usuario actual
            $iduser = $_SESSION['ID_usuario']; // Este es un ejemplo, deberías tener el ID del usuario actual

            // Consulta para obtener las recetas del usuario
            $sql = "SELECT * FROM recetas WHERE id_usuario = ?";
            $stmt = $conexion->prepare($sql);

            $imagen = "SELECT img_uno FROM receta_imagen WHERE id_usuario = ?";

            if ($stmt === false) {
                trigger_error($conexion->error, E_USER_ERROR);
            }

            $stmt->bind_param("i", $iduser);
            $stmt->execute();
            $result = $stmt->get_result();

            // Verificar si hay recetas
            if ($result->num_rows > 0) {
                // Mostrar las recetas
                while ($row = $result->fetch_assoc()) {

                    $imagenSql = "SELECT img_uno FROM receta_imagen WHERE ID_recetas = ?";
                    $imagenStmt = $conexion->prepare($imagenSql);
                    $imagenStmt->bind_param("i", $row['ID_recetas']);
                    $imagenStmt->execute();
                    $imagenResult = $imagenStmt->get_result();
                    $imagenRow = $imagenResult->fetch_assoc();

            ?>
                    <section class="receta-contain">
                        <a href="paltacate/<?php echo $row['url']; ?>">
                            <div class="receta-prev">
                                <div class="thumbnail-row">
                                    <img class="thumbnail" src="paltacate/<?php echo $imagenRow['img_uno']; ?>" alt="" />
                                </div>
                                <div class="receta-data">
                                    <p class="receta-titulo"><?php echo $row['titulo']; ?></p>
                                    <p class="receta-stats"><?php echo $row['calificacion']; ?>/5 calificacion.</p>
                                    <p class="receta-description"><?php echo $row['descripcion']; ?></p>
                                </div>
                            </div>
                        </a>
                    </section>
                <?php
                }
            } else {
                // No hay recetas para mostrar
                ?>
                <div class="receta-data">
                    <p class="receta-titulo">No tienes recetas registradas.</p>
                </div>
            <?php
            }

            // Cerrar la conexión
            $stmt->close();
            $conexion->close();
            ?>


        </main>
    </body>

    <footer class="footer">
        <div class="columna">
            <h3>Perfil</h3>
            <ul>
                <li><a href="login.html">Iniciar Sesión</a></li>
                <li><a href="#">Registrarse</a></li>
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
                <li><a href="index.php">Inicio</a></li>
                <li><a href="explorar.html">Explorar</a></li>
                <li><a href="crearReceta.html">Crear Receta</a></li>
            </ul>
        </div>
        <div class="columna">
            <p>Derechos Reservados PALTACATE.COM 2024</p>
        </div>
    </footer>
    <script src="js/scripts.js"></script>

</html>
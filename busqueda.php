<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorar</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:wght@100..900&family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
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
                        <li><a href="login.php">Iniciar Sesión</a></li>
                        <li><a href="php/cerrar_sesion.php" onclick="cerrarSesion()">Cerrar Sesión</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <main>

            <?php
            // Conectar a la base de datos
            include "php/conexion.php";

            if (isset($_POST['busqueda']) && strlen($_POST['busqueda']) >= 1) {
                $busqueda = mysqli_real_escape_string($conexion, $_POST['busqueda']);

                // Consulta para obtener las recetas del usuario
                $sql = "SELECT recetas.*, usuarios.nombre_usuario 
                FROM recetas 
                LEFT JOIN usuarios ON recetas.ID_usuario = usuarios.ID_usuario
                WHERE recetas.titulo LIKE ? OR usuarios.nombre_usuario LIKE ?";
                $stmt = $conexion->prepare($sql);

                if ($stmt === false) {
                    trigger_error($conexion->error, E_USER_ERROR);
                }

                $param = "%" . $busqueda . "%";
                $stmt->bind_param("ss", $param, $param);
                $stmt->execute();
                $result = $stmt->get_result();

                // Verificar si hay recetas
                if ($result->num_rows > 0) {
                    // Mostrar las recetas
                    while ($row = $result->fetch_assoc()) {
                        // Consulta para obtener la imagen asociada a la receta
                        $imagenSql = "SELECT img_uno FROM receta_imagen WHERE ID_recetas = ?";
                        $imagenStmt = $conexion->prepare($imagenSql);
                        $imagenStmt->bind_param("i", $row['ID_recetas']);
                        $imagenStmt->execute();
                        $imagenResult = $imagenStmt->get_result();
                        $imagenRow = $imagenResult->fetch_assoc();
            ?>
                        <link rel="stylesheet" href="css/explorar.css">
                        <section class="receta-contain">
                            <a href="paltacate/<?php echo htmlspecialchars($row['url']); ?>">
                                <div class="receta-prev">
                                    <div class="thumbnail-row">
                                        <img class="thumbnail" src="paltacate/<?php echo htmlspecialchars($imagenRow['img_uno']); ?>" alt="" />
                                    </div>
                                    <div class="receta-data">
                                        <p class="receta-titulo"><?php echo htmlspecialchars($row['titulo']); ?></p>
                                        <p class="receta-stats"><?php echo htmlspecialchars($row['calificacion']); ?>/5 calificación.</p>
                                        <p class="receta-description"><?php echo htmlspecialchars($row['descripcion']); ?></p>
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
                        <p class="receta-titulo">No se encontraron recetas.</p>
                    </div>
            <?php
                }

                // Cerrar la conexión
                $stmt->close();
                $conexion->close();
            }
            ?>


            <div class="iconos">
                <a class="icono" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="60" height="60" viewBox="0 0 24 24" stroke-width="2.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l14 0" />
                        <path d="M5 12l6 6" />
                        <path d="M5 12l6 -6" />
                    </svg>
                </a>
                <a class="icono" href="">1</a>
                <a class="icono" href="">2</a>
                <a class="icono" href="">3</a>
                <a class="icono" href="">4</a>
                <a class="icono" href="">5</a>
                <a class="icono" href="">6</a>
                <a class="icono" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-right" width="60" height="60" viewBox="0 0 24 24" stroke-width="2.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l14 0" />
                        <path d="M13 18l6 -6" />
                        <path d="M13 6l6 6" />
                    </svg>
                </a>
            </div>
            </section>
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
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="explorar.php">Explorar</a></li>
                    <li><a href="crearReceta.php">Crear Receta</a></li>
                </ul>
            </div>
            <div class="columna">
                <p>Derechos Reservados PALTACATE.COM 2024</p>
            </div>
        </footer>

        <script src="js/scripts.js"></script>
    </body>

</html>
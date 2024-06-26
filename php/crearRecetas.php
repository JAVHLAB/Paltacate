<?php

include 'conexion.php';

session_start();
if (!isset($_SESSION['ID_usuario'])) {
    header('Location: login.php');
    exit;
}

$titulo = $_POST['titulo'];
$tiempo_preparacion =  $_POST['tiempo'];
$categoria =  $_POST['tipos'];
$porciones = $_POST['porciones'];
$descripcion = $_POST['descripcion'];
$preparacion = $_POST['preparacion'];


$iduser = $_SESSION['ID_usuario'];
$direccion = "../recetas/receta-" . urlencode($titulo) . ".php";


$sql = "INSERT INTO recetas (ID_usuario, titulo, tiempo_preparacion, categoria, porciones, descripcion, preparacion, url)
        VALUES('$iduser', '$titulo','$tiempo_preparacion', '$categoria', '$porciones', '$descripcion', '$preparacion', '$direccion')";




if (mysqli_query($conexion, $sql)) {
    $id_receta = mysqli_insert_id($conexion);

    // Obtener la fecha de creación de la receta
    $fecha_sql = "SELECT fecha_publicacion FROM recetas WHERE ID_recetas = '$id_receta'";
    $result = mysqli_query($conexion, $fecha_sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $fecha = $row['fecha_publicacion'];
    } else {
        $fecha = "Fecha no disponible";
    }

    // Obtener el nombre del creador usando el ID_usuario
    $nombre_sql = "SELECT nombre_usuario FROM usuarios WHERE ID_usuario = '$iduser'";
    $result2 = mysqli_query($conexion, $nombre_sql);
    if ($result2 && mysqli_num_rows($result2) > 0) {
        $row2 = mysqli_fetch_assoc($result2);
        $nombre_creador = $row2['nombre_usuario'];
    } else {
        $nombre_creador = "Nombre no disponible";
    }

    // Obtener la calificacion de la receta
    $calificacion_sql = "SELECT calificacion FROM recetas WHERE ID_recetas = '$id_receta'";
    $result3 = mysqli_query($conexion, $calificacion_sql);
    if ($result3 && mysqli_num_rows($result3) > 0) {
        $row3 = mysqli_fetch_assoc($result3);
        $cal = $row3['calificacion'];
        if ($cal == 0 || $cal <= 0) {
            $cal = '0/0';
        }
    } else {
        $cal = "0/0";
    }

    $lista_ingredientes = '';

    // Recorrer los arreglos de ingredientes y hacer las inserciones
    $nombres = $_POST['nombre'];
    $cantidades = $_POST['cantidad'];
    $unidades = $_POST['unidad'];

    for ($i = 0; $i < count($nombres); $i++) {
        $nombre = mysqli_real_escape_string($conexion, $nombres[$i]);
        $cantidad = mysqli_real_escape_string($conexion, $cantidades[$i]);
        $unidad = mysqli_real_escape_string($conexion, $unidades[$i]);

        $ingredientes_sql = "INSERT INTO ingredientes (ID_recetas, nombre, cantidad, unidad)
                             VALUES('$id_receta', '$nombre', '$cantidad', '$unidad')";

        if (mysqli_query($conexion, $ingredientes_sql)) {
            $lista_ingredientes .= "<li>$nombre - $cantidad $unidad</li>";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Directory where files will be stored
        $ruta = "../fotosrecetas/";
    
        // Check if file was uploaded without errors
        if (isset($_FILES['img_uno']) && $_FILES['img_uno']['error'] === UPLOAD_ERR_OK) {
            $fichero = $ruta . basename($_FILES['img_uno']['name']);
    
            // Move the uploaded file to the destination directory
            if (move_uploaded_file($_FILES['img_uno']['tmp_name'], $fichero)) {

                $ingreso_sql = "INSERT INTO receta_imagen (ID_recetas, img_uno) VALUES ('$id_receta', '$fichero')";
    
                // Execute query
                $resultado = mysqli_query($conexion, $ingreso_sql);
                if ($resultado) {
                    echo 'El archivo se movió correctamente y se insertó en la base de datos<br>';
                } else {
                    echo 'Error al mover el archivo o insertar datos en la base de datos: ' . mysqli_error($conexion) . '<br>';
                }

                echo 'Se subió el archivo correctamente<br>';
            } else {
                echo 'Error al mover el archivo<br>';
            }
        } else {
            echo 'Error en la subida del archivo<br>';
        }
    
        // Retrieve and sanitize the ID_receta (assuming it comes from a form input)
        $ID_receta = isset($_POST['id_receta']) ? htmlspecialchars($_POST['id_receta']) : '';
    
        // Ensure the ID_receta is not empty and the file exists
        if (!empty($ID_receta) && file_exists($fichero)) {
            $nombre_archivo = 'receta' . $ID_receta . '.jpg';
            $destino = $ruta . $nombre_archivo;
    
            // Rename the file to the final destination
            if (rename($fichero, $destino)) {
                
    
                // Insert query
                $ingresa_sql = "INSERT INTO receta_imagen (ID_receta, img_uno) VALUES ('$ID_receta', '$destino')";
    
                // Execute query
                $resultado = mysqli_query($conexion, $ingresa_sql);
                if ($resultado) {
                    echo 'El archivo se movió correctamente y se insertó en la base de datos<br>';
                } else {
                    echo 'Error al mover el archivo o insertar datos en la base de datos: ' . mysqli_error($conexion) . '<br>';
                }
    
                // Close connection
                mysqli_close($conexion);
            } else {
                echo 'Error al mover el archivo<br>';
            }
        }
    }
    

    $contenido_receta = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=, initial-scale=1.0'>
        <title>Paltacate</title>
        <link rel='stylesheet' href='../css/normalize.css'>
        <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0'>
        <link rel='preconnect' href='https://fonts.googleapis.com'>
        <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
        <link href='https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:wght@100..900&family=Staatliches&display=swap' rel='stylesheet'>
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        <link rel='stylesheet' href='../css/style.css'>
        <link rel='stylesheet' href='../css/receta.css'>
        <link rel='stylesheet' href='../css/receta_sociales.css'>
    </head>

    <body>
        <header>
            <nav id='navbar-paltacate'>
                <a href='index.php'><img src='../img/paltacate_logo.png' alt='Paltacate_icon' id='paltacate-icon'></a>
                <div class='left-items'>
                    <ul class='first'>
                        <li><a href='../index.php' id='inicio'>Inicio</a></li>
                        <li><a href='../explorar.php' id='explorar'>Explorar</a></li>
                        <li><a href='../crearReceta.php' id='Crear'>Crear receta</a></li>
                    </ul>
                </div>

                <div class='search'>
                <form method='post' action='../busqueda.php'>
                    <div class='barra'>
                        <div><span class='material-symbols-outlined' id='lupa'>search</span></div>
                        <input type='text' placeholder='Buscar' class='finder' name='busqueda'>
                    </div>
                </form>
            </div>

                <div class='right-items'>
                    <a href='#' onclick='toggleMenu()'>
                        <span class='material-symbols-outlined' id='profile-img'>account_circle</span>
                    </a>
                    
                </div>
                <script>
                    window.onload = function() {
                        var profileImg = document.getElementById('profile-img');
                        profileImg.click();
                        profileImg.click();
                    };
                    </script>
                    

                <div id='menu' class='menu'>
                    <ul>
                        <li><a href='../perfil.php'>Perfil</a></li>
                        <li><a href='../login.php'>Iniciar Sesión</a></li>
                        <li><a href='../php/cerrar_sesion.php' onclick='cerrarSesion()'>Cerrar Sesión</a></li>
                    </ul>
                </div>
            </nav>
        </header>    

        <main>
            <h1>$titulo</h1>
            <hr>
            <div class='datos'>
                <p>Fecha de publicacion: $fecha</p>
                <p>Creador: $nombre_creador</p>
            </div>

            <section class='container'>
                <div class='column'>
                    <div class='svg-container'>
                        <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-alarm' width='100' height='100' viewBox='0 0 24 24' stroke-width='1.5' stroke='#a6c620' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                            <path stroke='none' d='M0 0h24v24H0z' fill='none'/>
                            <path d='M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0' />
                            <path d='M12 10l0 3l2 0' />
                            <path d='M7 4l-2.75 2' />
                            <path d='M17 4l2.75 2' />
                        </svg>
                    </div>
                    <div>
                        <h3>Tiempo:</h3>
                        <p>$tiempo_preparacion</p> 
                    </div>
                </div>
                <div class='column'>
                    <div class='svg-container'>
                        <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-user' width='100' height='100' viewBox='0 0 24 24' stroke-width='1.5' stroke='#a6c620' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                            <path stroke='none' d='M0 0h24v24H0z' fill='none'/>
                            <path d='M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0' />
                            <path d='M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2' />
                        </svg>
                    </div>
                    <div>
                        <h3>Personas:</h3>      
                        <p>$porciones</p>
                    </div>
                </div>
                <div class='column'>
                    <div class='svg-container'>
                        <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-star' width='100' height='100' viewBox='0 0 24 24' stroke-width='1.5' stroke='#a6c620' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                            <path stroke='none' d='M0 0h24v24H0z' fill='none'/>
                            <path d='M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z' />
                        </svg>
                    </div>
                    <div>
                        <h3>Calificación:</h3>
                        <p>$cal/5</p>
                    </div>
                </div>
            </section>

            <section>
                <h2>Lista de Ingredientes</h2>
                <div class='ingredient-container'>
                    <ul class='ingredient-list'>
                    $lista_ingredientes
                    </ul>
                </div>
            </section>

            <section class='mainimage'>
                <img class='image' src='$fichero' alt=''>
            </section>

            <section>
                <div class='container-descripcion'>
                    <div class='recipe-description'> 
                        <h2>Descripción</h2>
                        <p>$descripcion
                        </p>
                    </div>
                </div>
            </section'>
                
            <section>
                <div class='image-container'>
                    <img src='' alt=''>
                    <img src='' alt=''>
                    <img src='' alt=''>
                </div>
            </section>

            <section>
                <div class='container-descripcion'>
                    <div class='recipe-description'>
                        <h2>Procedimiento</h2>
                        <p>$preparacion
                        </p>
                    </div>
                </div>
            </section'>
            <hr>
            <div class='wrapper'>
                <h2>Califica esta receta</h2>
                <form action='#'>
                    <div class='rating'>
                        <input type='number' name='rating' hidden>
                        <i class='bx bx-star star' style='--i: 0;'></i>
                        <i class='bx bx-star star' style='--i: 1;'></i>
                        <i class='bx bx-star star' style='--i: 2;'></i>
                        <i class='bx bx-star star' style='--i: 3;'></i>
                        <i class='bx bx-star star' style='--i: 4;'></i>
                    </div>
                    <textarea name='opinion' cols='30' rows='5' placeholder='Añade un comentario'></textarea>
                    <div class='btn-group'>
                        <button type='submit' class='btn submit'>Añadir</button>
                        <button class='btn cancel'>Cancelar</button>
                    </div>
                </form>
            </div>
    
            
        </main>

        <footer class='footer'>
            <div class='columna'>
                <h3>Perfil</h3>
                <ul>
                    <li><a href='../login.php'>Iniciar Sesión</a></li>
                    <li><a href='../registro.php'>Registrarse</a></li>
                </ul>
            </div>
            <div class='columna'>
                <h3>Importante</h3>
                <ul>
                    <li><a href='#'>Sobre Nosotros</a></li>
                    <li><a href='#'>Nuevas Recetas</a></li>
                </ul>
            </div>
            <div class='columna'>
                <h3>Menú</h3>
                <ul>
                    <li><a href='../index.php'>Inicio</a></li>
                    <li><a href='../explorar.php'>Explorar</a></li>
                    <li><a href='../crearReceta.php'>Crear Receta</a></li>
                </ul>
            </div>
            <div class='columna'>
                <p>Derechos Reservados PALTACATE.COM 2024</p>
            </div>
        </footer>    
        <script src='../js/scripts.js'></script>
        <script src='../js/recetascripts.js'></script>
    </body>
    </html>";

    file_put_contents($direccion, $contenido_receta);


    echo '<script>
    alert("¡Receta Guardada!")
    window.location = "../perfil.php";
    </script>';
} else {
    echo '<script>
    alert("¡Receta No Guardada!")
    window.location = "../crearReceta.php";
    </script>';
}

mysqli_close($conexion);

<?php

include("php/conexion.php");

session_start();
if (!isset($_SESSION["ID_usuario"])) {
    header("location: login.html");
}

$iduser = $_SESSION['ID_usuario'];

$sql = "SELECT ID_usuario,nombre_usuario FROM usuarios WHERE ID_usuario = $iduser"; 
$resultado = mysqli_query($conexion, $sql);
$row = $validar_login->fetch_all();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Paltacate</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:wght@100..900&family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
</head>
<body>
  <header>
    <nav id="navbar-paltacate">
        <a href="index.html"><img src="img/paltacate_logo.png" alt="Paltacate_icon" id="paltacate-icon"></a>
        <div class="left-items">
            <ul class="first">
                <li><a href="index.html" id="inicio">Inicio</a></li>
                <li><a href="explorar.html" id="explorar">Explorar</a></li>
                <li><a href="crearReceta.html" id="Crear">Crear receta</a></li>
            </ul>
        </div>

        <div class="search">
            <div class="barra">
                <div><span class="material-symbols-outlined" id="lupa">search</span></div>
                <input type="text" placeholder="Buscar" class="finder">
            </div>
        </div>

        <div class="right-items">
            <a href="#">
                <span class="material-symbols-outlined" id="notifications">notifications</span>
            </a>
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
                <li><a href="perfil.html">Perfil</a></li>
                <li><a href="login.html">Iniciar Sesión</a></li>
                <li><a href="php/cerrar_sesion.php" onclick="cerrarSesion()">Cerrar Sesión</a></li>
            </ul>
        </div>
    </nav>
</header>

    <main>
        <section class="baner">
            <div class="contenido-baner">
                <h1>Crea, comparte y disfruta las mejores recetas.</h1>      
            </div>
        </section>
        
        <h2>Nuevas recetas</h2>
        <section class="receta-container">
            
            <div class="receta-preview">
                <div class="thumbnail-row">
                    <img class="thumbnail" src="img/tacos.jpg" alt=""/>
                </div>
                <div class="receta-info">                 
                    <p class="receta-title">Tacos al pastor</p>
                    <p class="receta-stats">3.8/5 calificacion.</p>  
                    <a class="boton" href="">Ver más</a>
                </div>    
            </div>
                
            </div>

            <div class="receta-preview">
                <div class="thumbnail-row">
                    <img class="thumbnail" src="img/hotdog.jpg" alt=""/>
                </div>
                <div class="receta-info">
                    <p class="receta-title">Hot dogs</p>
                    <p class="receta-stats">4.0/5 calificacion.</p>
                    <a class="boton" href="">Ver más</a>    
                </div>
                
            </div>

            <div class="receta-preview">
                <div class="thumbnail-row">
                    <img class="thumbnail" src="img/pastel.jpg" alt=""/>
                </div>
                <div class="receta-info">
                    <p class="receta-title">Pastel de Chocolate</p>
                    <p class="receta-stats">4.2/5 calificacion.</p> 
                    <a class="boton" href="">Ver más</a>
                </div>
            </div>

            <div class="receta-preview">
                <div class="thumbnail-row">
                    <img class="thumbnail" src="img/gorditas.jpg" alt=""/>
                </div>
                <div class="receta-info">
                    <p class="receta-title">Gorditas de deshebrada</p>
                    <p class="receta-stats">4.2/5 calificacion.</p>  
                    <a class="boton" href="">Ver más</a>
                </div>
            </div> 
        </section>
        <hr>
        <h2>Sobre Nosotros</h2>
        <section class="sobre-nosotros">
            <div class="container-au">
                <div class="content-au">
                    <div class="image">
                        <img src="img/alcohol.jpg" alt="Imagen">
                    </div>
                    <div class="text-au">    
                        <p class="section-description">Paltacate es un proyecto universitario hecho por estudiantes de la carrera 
                            de Ingenieria informatica para la materia de ingenieria de software, es un proyecto en el que se aprendio a hacer
                            una pagina web de acuerdo al proceso seguido en un proyecto ejecutivo encargado por un cliente.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <section class="rs">
            <h2>Redes sociales</h2>
            <div class="iconos">
                <a class="icono" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="68" height="68" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                        <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        <path d="M16.5 7.5l0 .01" />
                      </svg>
                </a>
                <a class="icono" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-x" width="68" height="68" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M4 4l11.733 16h4.267l-11.733 -16z" />
                        <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
                    </svg>
                </a>
            </div>
        </section>
    </main>

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
                <li><a href="index.html">Inicio</a></li>
                <li><a href="explorar.html">Explorar</a></li>
                <li><a href="crearReceta.html">Crear Receta</a></li>
            </ul>
        </div>
        <div class="columna">
            <p>Derechos Reservados PALTACATE.COM 2024</p>
        </div>
    </footer>    
    <script src="js/scripts.js"></script>
</body>
</html>
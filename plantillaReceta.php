<!--

Falta:
-Corregir las rutas de imagenes
-Revisar las consultas
-Probar el bucle
-La calificacion
-Colocar el link a cada receta*
-En las recetas propias falta  boton para editar y eliminar
-->

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
                <a href="#">
                    <span class="material-symbols-outlined" id="profile-img">account_circle</span>
                </a>
                
                
            </div>          
        </nav>
    </header>
    <main>

        <section class="receta-contain">
            <a href="">
                <div class="receta-prev">
                    <div class="thumbnail-row">
                        <img class="thumbnail" src="img/tacos.jpg" alt=""/>
                    </div>
                    <div class="receta-data">                 
                        <p class="receta-titulo">Tacos al pastor</p>
                        <p class="receta-stats">3.8/5 calificacion.</p>
                        <p class="receta-description">Los tacos al pastor son una deliciosa combinacion de sabores intensos 
                            y especias vibrantes. Esta receta te permitirá disfrutar de esta deliciosa especialidad en la 
                            comodidad de tu hogar.</p>        
                    </div>
                </div>
            </a>





            <!-- Receta php plantilla "miniatura" para recetas propias-->

            <?php       //Conexion a BD, Seleccion de todos los campos de recetas
                include("conexion.php");
                $sql="SELECT * FROM recetas WHERE ID_usuario = $_SESSION";
                $result=mysqli_query($conn,$sql);
            ?>
                <!-- Receta php plantilla-->

            <a href="">
                <div class="receta-prev">
                    <div class="thumbnail-row">
                        <img class="thumbnail" src="img/hotdog.jpg" alt=""/>
                    </div>
                    <div class="receta-data">                 
                        <p class="receta-titulo">   <?php echo $filas['titulo'] ?> </p>
                        <p class="receta-stats">    <?php echo $filas['calificacion'] //Falta agregarlo en la BD ?>  </p> 
                        <p class="receta-description">   <?php echo $filas['descripcion'] ?> </p>        
                    </div>
                </div>
            </a>
        
            <?php
                mysqli_close($conn);
            ?>
            

        </section>




        <!-- Bucle para mostrar todas las recetas 'miniaturas'-->

        <?php       //Conexion a BD, Seleccion de todos los campos de recetas
            include("conexion.php");
            $sql="SELECT * FROM recetas";
            $result=mysqli_query($conn,$sql);
        ?>
            <!-- Receta php plantilla-->

        <section class="receta-contain">
            <?php
                while($row=mysqli_fetch_assoc($result)){//Inicio bucle para recetas
            ?>

            <a href="">
                <div class="receta-prev">
                    <div class="thumbnail-row">
                        <img class="thumbnail" src="img/tacos.jpg" alt=""/>
                    </div>
                    <div class="receta-data">                 
                        <p class="receta-titulo">   <?php echo $filas['titulo'] ?> </p>
                        <p class="receta-stats">    <?php echo $filas['calificacion']  //falta agregarlo en la BD ?> /5 calificacion. </p> 
                        <p class="receta-description">   <?php echo $filas['descripcion'] ?> </p>        
                    </div>
                </div>
            </a>

            <?php
                }//Fin de bucle
            ?>
            

        </section>

        <?php
            mysqli_close($conn);
        ?>




        <section>
            <div class="iconos">
                <a class="icono" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="60" height="60" viewBox="0 0 24 24" stroke-width="2.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
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
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
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
                    <li><a href="#">Iniciar Sesión</a></li>
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

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

                <div class="search">
                    <form method="post" action="../busqueda.php">
                        <div class="barra">
                            <div><span class="material-symbols-outlined" id="lupa">search</span></div>
                            <input type="text" placeholder="Buscar" class="finder" name="busqueda">
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
            <h1>Gelatina</h1>
            <hr>
            <div class='datos'>
                <p>Fecha de publicacion: 2024-05-23 07:39:53</p>
                <p>Creador: Panchito21</p>
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
                        <p>30</p> 
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
                        <p>2</p>
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
                        <p>0/5</p>
                    </div>
                </div>
            </section>

            <section>
                <h2>Lista de Ingredientes</h2>
                <div class='ingredient-container'>
                    <ul class='ingredient-list'>
                    <li>Agua - 1 litro</li><li>Gelatina - 1 sobre</li>
                    </ul>
                </div>
            </section>

            <section class='mainimage'>
                <img class='image' src='../fotosrecetas/gelatina.jpg' alt=''>
            </section>

            <section>
                <div class='container-descripcion'>
                    <div class='recipe-description'> 
                        <h2>Descripción</h2>
                        <p>Cómo hacer gelatina
Descubrí esta rica receta de cómo hacer gelatina para disfrutar con toda la familia. Animate a prepararla y sorprendé a todos.
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
                        <p>1.  Colocar el contenido del sobre de la gelatina de frutillas con el agua hirviendo en un bol y mezclar hasta disolver. Dividir en dos partes iguales.
2.  Añadir a una parte 250 cc del agua fría y una vez que la preparación se enfríe, incorporar las frutillas picadas. Colocar en flaneritas, rellenándolas hasta sus ¾ partes, y llevar a la heladera hasta que la preparación esté bien fría y haya tomado consistencia.
3.  Mezclar la otra parte de gelatina con la Leche Condensada Nestlé y el resto del agua fría. Verter esta preparación en cada moldecito hasta llenarlo por completo y llevar nuevamente a la heladera hasta que el postre esté bien frío y haya tomado consistencia. Desmoldar pasando por agua caliente.
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

            <!--Seccion de comentarios---------------------------------->
            <div class='comments-section'>
                <h2>Comentarios</h2>
                <div id='comments-container'></div>
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
    </html>
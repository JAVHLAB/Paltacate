<!--
Remplazo de crearReceta.html

Se requiere de la conexion a la BD

Falta:
-Que las recetas se agreguen al usuario correspondiennte --- Creooooo que ya quedo esto

-Revisar ambos IDs (usuario y receta)
-Completar el comando para agregar los ingredientes a la BD
-Las imagenes aun no estan bien implementadas en el php, y falta separar la imagen "miniatura O principal" de las normales
-Agregar los pasos(preparacion) a la bd y tambien los ingredientes
-Otros campos (calificacion, imagenes, etc)**


-***Revisar que el link de cada receta funcione y no se repita, y agregarlo en una nueva columna en la BD
-Estilos para las recetas
 


Videos usados:
https://www.youtube.com/watch?v=oL0oFH3bo1g&list=PLYxW6dLXNCQ8_7C2Srx4DiIbmN41oElwz&index=13&ab_channel=TUNTORIALESCODIGO
https://www.youtube.com/watch?v=0Xry72Pjres&list=PLGfF3KgbxaiwuXKuWwydK-X_xT1LZ422F&index=8&ab_channel=FredyGeek



a

--> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paltacate</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:wght@100..900&family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/crearReceta.css">
</head>
<body>
  <header>
    <nav id="navbar-paltacate">
        <a href="../index.html"><img src="../img/paltacate_logo.png" alt="Paltacate_icon" id="paltacate-icon"></a>
        <div class="left-items">
            <ul class="first">
                <li><a href="../index.html" id="inicio">Inicio</a></li>
                <li><a href="../explorar.html" id="explorar">Explorar</a></li>
                <li><a href="crearReceta.php" id="Crear">Crear receta</a></li>
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
                <li><a href="#">Perfil</a></li>
                <li><a href="#" onclick="cerrarSesion()">Cerrar Sesión</a></li>
            </ul>
        </div>
    </nav>
</header>



    <main class="form">



        <h1>Crea tu propia receta</h1>
        <form class="formulario" id="miFormulario">
          <fieldset>
            <legend>Llena todos los campos</legend>
            <div class="contenedor-campos">

              <div class="campo">
                <input class="input-text" type="text" id="nombre" name="nombre" placeholder="Nombre del platillo" required/>
              </div>

              <div class="campo">
                <input class="input-text" type="number" id="tiempo" name="tiempo" placeholder="tiempo (minutos)" min="1" required/>
              </div>

              <div class="campo">
                <select id="opciones" class="input-text" name="tipos[]" required>
                  <option value="" disabled selected>Selecciona una opción</option>
                  <option value="opcion1">Postre</option>
                  <option value="opcion2">Plato fuerte</option>
                  <option value="opcion3">Vegetariano</option>
                  <option value="opcion4">Vegano</option>
                  <option value="opcion5">Platillo típico</option>
                  <option value="opcion6">Bebidas alcoholicas</option>
                  <option value="opcion7">Sustancias controladas</option>
                  <!-- Agrega más opciones según sea necesario -->
                </select>
              </div>

              <div class="campo">
                <input class="input-text" type="number" id="porciones" name="porciones" placeholder="Porciones " min="1" max="200" required/>
              </div>

              <div class="campo">
                <textarea class="input-text" id="descripcion" name="descripcion" placeholder="Descripción" required></textarea>
              </div>

              <!--<div class="campo">
                <textarea class="input-text" id="ingredientes" name="ingredientes" placeholder="Ingredientes (Separa cada ingrediente con comas)"></textarea>
              </div>-->

              <div class="campo" id="ingredientes-container">
                <div class="ingredient-row">
                  <input class="input-text" type="text" name="nombre[]" placeholder="Nombre del Ingrediente" required>
                  <input class="input-text" type="number" name="cantidad[]" placeholder="Cantidad" min="1" required>
                  <select class="input-text" name="unidades[]" required>
                    <option value="" disabled selected>Seleccione la unidad</option>
                    <option value="gramos">Gramos (g)</option>
                    <option value="kilogramos">kilogramos (kg)</option>
                    <option value="miligramoas">Miligramos (mg)</option>
                    <option value="onzas">Onzas (oz)</option>
                    <option value="libras">Libras (lb)</option>
                    <option value="mililitros">Mililitros (ml)</option>
                    <option value="litros">Litros (lt)</option>
                    <option value="centimetros-cubicos">Centrimetros cubicos (cm3)</option>
                    <option value="tazas">Tazas (cup)</option>
                    <option value="cucharadas">Cucharadas (tbsp)</option>
                    <option value="cucharadita">Cucharaditas (tsp)</option>
                    <option value="onzas-liquidas">Onzas liquidas (fl oz)</option>
                    <option value="unidades">Unidaes (u)</option>
                    <option value="piezas">Piezas (pz)</option>
                    <option value="rebanadas">Rebanadas (sl)</option>
                    <option value="rodajas">Rodajas (slc)</option>
                    <option value="porciones">Porciones (porc)</option>
                    <option value="bolsas">Bolsas (bag)</option>
                    <option value="botellas">Botellas (btl)</option>

                    <!-- Agrega más opciones según tus necesidades -->
                  </select>
                </div>
              </div>

              <button class="boton campo" type="button" onclick="agregarIngrediente()">Agregar Ingrediente</button>

              


              <div class="campo">
                <textarea class="input-text" id="preparacion" name="preparacion" placeholder="Instrucciones"></textarea>
              </div>

              <div class="fotos campo">
                <div class="col">
                  <label class="input-file">
                    <span class="input-file-label">Seleccionar imagen</span>
                    <input type="file" class="input-file-button" accept="image/*" multiple>
                  </label>

                  <div class="image-preview-container">
                    <img class="image-preview" src="#" alt="Vista previa de la imagen">
                  </div>

                </div>


                <div class="col">
                  <label class="input-file">
                    <span class="input-file-label">Seleccionar imagen</span>
                    <input type="file" class="input-file-button" accept="image/*" multiple>
                  </label>
                  <div class="image-preview-container">
                    <img class="image-preview" src="#" alt="Vista previa de la imagen">
                  </div>
                </div>
                <div class="col">
                  <label class="input-file">
                    <span class="input-file-label">Seleccionar imagen</span>
                    <input type="file" class="input-file-button" accept="image/*" multiple>
                  </label>
                  <div class="image-preview-container">
                    <img class="image-preview" src="#" alt="Vista previa de la imagen">
                  </div>
                </div>
                <div class="col">
                  <label class="input-file">
                    <span class="input-file-label">Seleccionar imagen</span>
                    <input type="file" class="input-file-button" accept="image/*" multiple>
                  </label>
                  <div class="image-preview-container">
                    <img class="image-preview" src="#" alt="Vista previa de la imagen">
                  </div>
                </div>
              </div>  
            </div>
          </fieldset>
            <button type="submit" name="guardar" class="boton" >Guardar</button>
        </form>



        <?php
            if (isset($_POST['guardar']))
            {

                include('conexion.php');

                /*$titulo = $_POST['nombre'];
                $tiempo_preparacion = $_POST['tiempo'];
                $categoria = $_POST['tipos[]'];
                $porciones = $_POST['porciones'];
                $descripcion = $_POST['descripcion'];
                //$a = $_POST['ingredientes'];
                */
                
                $titulo = mysqli_real_escape_string($conexion, $_POST['nombre']);
                $tiempo_preparacion = mysqli_real_escape_string($conexion, $_POST['tiempo']);
                $categoria = mysqli_real_escape_string($conexion, $_POST['tipos']);
                $porciones = mysqli_real_escape_string($conexion, $_POST['porciones']);
                $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);

                $pasos_preparacion = mysqli_real_escape_string($conexion, $_POST['preparacion']);

                

                $publicacion = mysqli_real_escape_string($conexion, $_POST['formulario']); //Puede que esta no sea necesaria :D

                $result = mysqli_query($conexion, "SHOW TABLE STATUS LIKE 'recetas'");
                $data = mysqli_fetch_assoc($result);
                $next_increment = $data['Auto_increment'];

                $alea = substr(strtoupper(md5(microtime(true))), 0, 12);
                $code = $next_increment.$alea;

                $type = 'jpg';
                $rfoto = $_FILES['foto']['tmp_name'];
                $name = $code.".".$type;

                if(is_uploaded_file($rfoto)){
                    $destino = "recetas/".$name;
                    $nombre = $name;
                    copy($rfoto, $destino);
                }
                else{
                    $nombre = '';
                }


                $subir = mysqli_query($conexion, $sql);

                $sql ="INSERT INTO recetas (ID_usuario, titulo, tiempo_preparacion, categoria, porciones,
                    descripcion, imagen, fecha_publicacion)
                values('".$_SESSION['ID_usuario']."', '".$titulo."','".$tiempo_preparacion."', '".$categoria."', 
                    '".$porciones."', '".$descripcion."', '".$nombre."', ,now())";


                    //Archivo de receta
                    if ($stmt = mysqli_prepare($conexion, $sql)) {
                        mysqli_stmt_bind_param($stmt, "isssiss", $_SESSION['ID_usuario'], $titulo, $tiempo_preparacion, $categoria, $porciones, $descripcion, $nombre_imagen);
                
                        if (mysqli_stmt_execute($stmt)) {
                            // Obtener el ID de la receta recién insertada
                            $id_receta = mysqli_insert_id($conexion);
                
                            // Crear el archivo HTML para la receta
                            $html_content = "
                            <!DOCTYPE html>
                            <html lang='en'>
                            <head>
                                <meta charset='UTF-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
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
                            </head
                            <body>
                              <header>
                                <nav id='navbar-paltacate'>
                                  <a href='../index.html'><img src='../img/paltacate_logo.png' alt='Paltacate_icon' id='paltacate-icon'></a>
                                    <div class='left-items'>
                                      <ul class='first'>
                                        <li><a href='../index.html' id='inicio'>Inicio</a></li>
                                         <li><a href='../explorar.html' id='explorar'>Explorar</a></li>
                                        <li><a href='crearReceta.html' id='Crear'>Crear receta</a></li>
                                      </ul>
                                    </div>

                                    <div class='search'>
                                      <div class='barra'>
                                        <div><span class='material-symbols-outlined' id='lupa'>search</span></div>
                                        <input type='text' placeholder='Buscar' class='finder'>
                                      </div>
                                    </div>

                                    <div class='right-items'>
                                      <a href='#'>
                                        <span class='material-symbols-outlined' id='notifications'>notifications</span>
                                      </a>
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
                                        <li><a href='perfil.html'>Perfil</a></li>
                                        <li><a href='login.html'>Iniciar Sesión</a></li>
                                        <li><a href='#' onclick='cerrarSesion()'>Cerrar Sesión</a></li>
                                      </ul>
                                    </div>
                                </nav>

                              </header>


                              <main>
                                <h1>$titulo</h1>
                                <hr>
                                <div class='datos'>
                                    <p>$fecha_publicacion</p>
                                    <p>$ID_usuario</p><!--Cambiar id por nombre-->
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
                                          <p>$calificacion</p>
                                      </div>
                                  </div>
                                </section>

                                <section>
                                  <h2>Lista de Ingredientes</h2>
                                  <div class='ingredient-container'>
                                      <ul class='ingredient-list'><!--Cambiar por $!ingredientes o algo parecido-->
                                          <li>Ingrediente 1 - 100 gramos</li>
                                          <li>Ingrediente 2 - 2 tazas</li>
                                          <li>Ingrediente 3 - 3 cucharadas</li>
                                      </ul>
                                  </div>
                                </section>

                                <section class='mainimage'>
                                    <img class='image' src='img/pizza.jpg' alt=''><!--Cambiar por $!IMAGENPRINCIPAL o algo parecido-->
                                </section>

                                <section>
                                  <div class='container-descripcion'>
                                      <div class='recipe-description'>
                                          <h2>Descripción</h2>
                                          <p>$descripcion</p>
                                      </div>
                                  </div>
                                </section'>
                              
                                <section>
                                    <div class='image-container'>
                                        <img src='img/hamburguesa.jpg' alt=''><!--Cambiar por $!imagenes123 o algo parecido-->
                                        <img src='img/tacos.jpg' alt=''>
                                        <img src='img/hotdog.jpg' alt=''>
                                    </div>
                                </section>

                                <section>
                                    <div class='container-descripcion'>
                                        <div class='recipe-description'>
                                            <h2>Procedimiento</h2>
                                            <p>$pasos_preparacion</p>
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
                                        </div>  <!--Sumar calificaion y anadir comentarios a la receta-->
                                    </form>
                                </div>
                              </main>

                              <footer class='footer'>
                                <div class='columna'>
                                    <h3>Perfil</h3>
                                    <ul>
                                        <li><a href='../login.html'>Iniciar Sesión</a></li>
                                        <li><a href='#'>Registrarse</a></li>
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
                                        <li><a href='../index.html'>Inicio</a></li>
                                        <li><a href='../explorar.html'>Explorar</a></li>
                                        <li><a href='../crearReceta.html'>Crear Receta</a></li>
                                    </ul>
                                </div>
                                <div class='columna'>
                                    <p>Derechos Reservados PALTACATE.COM 2024</p>
                                </div>
                              </footer>    
                              <script src='js/scripts.js'></script>
                              <script src='js/recetascripts.js'></script>


                            </body>
                          </html>";
                
                            // Ruta del archivo HTML
                            $file_path = "../recetas/receta-$id_receta.html";//Modificar el link para que no se repitan
                
                            // Guardar el archivo HTML
                            file_put_contents($file_path, $html_content);
                
                            echo "<script>
                                    alert('La receta se creó correctamente');
                                    window.location.href = '../index.html';
                                  </script>";
                        } else {
                            echo "<script>
                                    alert('ERROR: La receta NO se creó correctamente');
                                    window.location.href = 'crearReceta.php';
                                  </script>";
                        }
                        mysqli_stmt_close($stmt);
                    }

                    
                    /*
                if($subir){
                    echo " <script languaje='Javascript'>
                            alert('La receta se creo correctamente');
                            location.assign('index.html');
                            </script>";
                }else{
                    echo " <script languaje='Javascript'>
                            alert('ERROR: La receta NO se creo correctamente');
                            location.assign('crearReceta.html');
                            </script>";
                }*/
            
                mysqli_close($conexion);

            }
        ?>



      </section>
    </main>

    <script src="js/scripts.js"></script>
</body>
</html>
<?php
            if (isset($_POST['guardar']))
            {

                include 'conexion.php';

                /*$titulo = $_POST['nombre'];
                $tiempo_preparacion = $_POST['tiempo'];
                $categoria = $_POST['tipos[]'];
                $porciones = $_POST['porciones'];
                $descripcion = $_POST['descripcion'];
                //$a = $_POST['ingredientes'];
                */
                
                $titulo = mysqli_real_escape_string($conexion, $_POST['nombre']);
                $tiempo_preparacion = mysqli_real_escape_string($conexion, $_POST['tiempo']);
                $categoria = mysqli_real_escape_string($conexion, $_POST['tipos'][0]);
                $porciones = mysqli_real_escape_string($conexion, $_POST['porciones']);
                $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);


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
                                <title>$titulo</title>
                                <link rel='stylesheet' href='../css/normalize.css'>
                                <link rel='stylesheet' href='../css/style.css'>
                            </head>
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
                                    </nav>
                                </header>
                                <main>
                                    <h1>$titulo</h1>
                                    <p><strong>Tiempo de preparación:</strong> $tiempo_preparacion minutos</p>
                                    <p><strong>Categoría:</strong> $categoria</p>
                                    <p><strong>Porciones:</strong> $porciones</p>
                                    <p><strong>Descripción:</strong> $descripcion</p>
                                    <img src='../recetas/$nombre_imagen' alt='Imagen de la receta'>
                                </main>
                            </body>
                            </html>";
                
                            // Ruta del archivo HTML
                            $file_path = "recetas/receta-$id_receta.html";
                
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
<!--
    
Falta:
-Ingredientes
-Revisar IDs
-Imagenes
-Pagina final actualizada

Video usado:
https://www.youtube.com/watch?v=o-ZPo6tcUc8&list=PLGfF3KgbxaiwuXKuWwydK-X_xT1LZ422F&index=9&ab_channel=FredyGeek
-->

<?php
    include("conexion.php");
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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/crearReceta.css">
</head>
<body>
  <header>
    <nav id="navbar-paltacate">
        <a href="index.html"><img src="../img/paltacate_logo.png" alt="Paltacate_icon" id="paltacate-icon"></a>
        <div class="left-items">
            <ul class="first">
                <li><a href="../index.html" id="inicio">Inicio</a></li>
                <li><a href="../explorar.html" id="explorar">Explorar</a></li>
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
                <li><a href="#">Perfil</a></li>
                <li><a href="#" onclick="cerrarSesion()">Cerrar Sesión</a></li>
            </ul>
        </div>
    </nav>
</header>


    



    <main class="form">
        <h1>Editar receta</h1>

        <?php
            if(isset($_POST["actualizar"])){

            }else{
                $id=$_GET['id'];
                $sql = "SELECT * FROM recetas WHERE id= '".$id."' ";
                $result = mysqli_query($conexion, $sql);

                $fila = mysqli_fetch_assoc($result);

                $titulo = $fila['titulo'];
                $tiempo_preparacion = $fila['tiempo_preparacion'];
                $categoria = $fila['categoria'];
                $porciones = $fila['porciones'];
                $descripcion = $fila['descripcion'];

                mysqli_close($conexion);

        ?>

        <form class="formulario" id="miFormulario" action="<?=$_SERVER['PHP_SELF']?>"   method="post">
          <fieldset>
            <legend>Llena todos los campos</legend>
            <div class="contenedor-campos">

              <div class="campo">
                <input class="input-text" type="text" id="nombre" placeholder="Nombre del platillo" required
                    value="<?php echo $titulo; ?>"/><br>
              </div>

              <div class="campo">
                <input class="input-text" type="number" id="tiempo" name="tiempo" placeholder="tiempo (minutos)" min="1" required
                    value="<?php echo $tiempo_preparacion; ?>"/><br>

              </div>

              <div class="campo">
                <select id="opciones" class="input-text" name="tipos[]" required
                    value="<?php echo $categoria; ?>"><br>
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
                <input class="input-text" type="number" id="porciones" name="porciones" placeholder="Porciones " min="1" max="200" required
                    value="<?php echo $porciones; ?>"/><br>
              </div>

              <div class="campo">
                <textarea class="input-text" id="descripcion" name="descripcion" placeholder="Descripción" required
                    value="<?php echo $descripcion; ?>"><br>
                </textarea>
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
                    <option value="cucharadas">Cucharadas (tbsp)</option>
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
            <button type="submit" class="boton" name="actualizar">Actualizar</button>
            <a href="index.php">Regresar</a>
        </form>

        <?php
            
            }
        ?>

      </section>
    </main>

    <script src="js/scripts.js"></script>
</body>
</html>
<?php
session_start();
if (!isset($_SESSION['ID_usuario'])) {
    header('Location: login.php');
    exit;
}
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
  <link rel="stylesheet" href="css/crearReceta.css">
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
        <div class="barra">
          <div><span class="material-symbols-outlined" id="lupa">search</span></div>
          <input type="text" placeholder="Buscar" class="finder">
        </div>
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
          <<li><a href="php/cerrar_sesion.php" onclick="cerrarSesion()">Cerrar Sesión</a></li>
        </ul>
      </div>
    </nav>
  </header>


  <main class="form">
    <h1>Crea tu propia receta</h1>
    <form class="formulario" id="miFormulario" action="php/crearRecetas.php" method="POST" enctype="multipart/form-data">
      <fieldset>
        <legend>LLena todos los campos</legend>
        <div class="contenedor-campos">

          <div class="campo">
            <input class="input-text" type="text" id="nombre" name="titulo" placeholder="Nombre del platillo" required />
          </div>

          <div class="campo">
            <input class="input-text" type="number" id="tiempo" name="tiempo" placeholder="tiempo (minutos)" min="1" required />
          </div>

          <div class="campo">
            <select id="opciones" class="input-text" name="tipos" required>
              <option value="" disabled selected>Selecciona una opción</option>
              <option value="Postre">Postre</option>
              <option value="Plato fuerte">Plato fuerte</option>
              <option value="Vegetariano">Vegetariano</option>
              <option value="Vegano">Vegano</option>
              <option value="Platillo típico">Platillo típico</option>
              <option value="Bebidas alcoholicas">Bebidas alcoholicas</option>
              <option value="Sustancias controladas">Sustancias controladas</option>
              <!-- Agrega más opciones según sea necesario -->
            </select>
          </div>

          <div class="campo">
            <input class="input-text" type="number" id="porciones" name="porciones" placeholder="Porciones " min="1" max="200" required />
          </div>

          <div class="campo">
            <textarea class="input-text" id="descripcion" name="descripcion" placeholder="Descripción" required></textarea>
          </div>


          <div class="campo" id="ingredientes-container">
            <div class="ingredient-row">
              <input class="input-text" type="text" name="nombre[]" placeholder="Nombre del Ingrediente" required>
              <input class="input-text" type="number" name="cantidad[]" id="select" placeholder="Cantidad" min="1" required>
              <input class="input-text" type="text" name="unidad[]" id="select" placeholder="Unidad" required>
            </div>
          </div>

          <div class="boton-group">
            <button class="boton campo" type="button" onclick="agregarIngrediente()">Agregar Ingrediente</button>
            <button class="boton btn campo" type="button" onclick="eliminarIngrediente()">Eliminar Ingrediente</button>
          </div>

          <div class="campo">
            <textarea class="input-text" id="preparacion" name="preparacion" placeholder="Instrucciones"></textarea>
          </div>

          <div class="fotos campo">
            <div class="col">
              <label class="input-file">
                <span class="input-file-label">Seleccionar imagen</span>
                <input type="file" name="img_uno" class="input-file-button" accept="image/*" multiple>
              </label>
              <div class="image-preview-container">
                <img class="image-preview" src="#" alt="Vista previa de la imagen">
              </div>
            </div>

            <div class="col">
              <label class="input-file">
                <span class="input-file-label">Seleccionar imagen</span>
                <input type="file" name="img_dos" class="input-file-button" accept="image/*" multiple>
              </label>
              <div class="image-preview-container">
                <img class="image-preview" src="#" alt="Vista previa de la imagen">
              </div>
            </div>
            <div class="col">
              <label class="input-file">
                <span class="input-file-label">Seleccionar imagen</span>
                <input type="file" name="img_tres" class="input-file-button" accept="image/*" multiple>
              </label>
              <div class="image-preview-container">
                <img class="image-preview" src="#" alt="Vista previa de la imagen">
              </div>
            </div>
            <div class="col">
              <label class="input-file">
                <span class="input-file-label">Seleccionar imagen</span>
                <input type="file" name="img_cuatro" class="input-file-button" accept="image/*" multiple>
              </label>
              <div class="image-preview-container">
                <img class="image-preview" src="#" alt="Vista previa de la imagen">
              </div>
            </div>
          </div>
        </div>
      </fieldset>
      <button type="submit" class="boton">Guardar</button>
    </form>
    </section>
  </main>

  <script src="js/scripts.js"></script>
</body>

</html>
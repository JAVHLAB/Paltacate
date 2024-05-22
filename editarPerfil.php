<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:wght@100..900&family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/editarPerfil.css">
</head>
<body>
    <main>
        <div class="edit-profile-container">                
            <h2>Editar Perfil</h2>
            <p>Mantén privados tus datos personales. Cualquier persona que pueda ver tu perfil podrá ver la información que agregues aquí.</p>
            <hr>
            <form action="" method="post" enctype="multipart/form-data">
                <!-- Sección de foto de perfil -->
                <div class="profile-section">
                    <h3>Foto de Perfil</h3>
                    <div class="profile-picture">
                        <img src="img/iconoperfil.png" alt="Foto de Perfil" class="profile-img" id="profile-img-preview">
                        <input type="file" name="profile-picture" id="profile-picture-input" accept="image/*" style="display: none;" onchange="previewImage(event, 'profile-img-preview')">
                        <button type="button" class="boton" onclick="document.getElementById('profile-picture-input').click();">Cambiar</button>
                    </div>
                </div>
                <hr>
                <!-- Sección de nombre y apellido -->
                <div class="name-section">
                    <h3>Información Personal</h3>
                    <div class="name-fields">
                        <input class="" type="text" name="nombre" placeholder="Nombre(s)">
                        <input type="text" name="apellido" placeholder="Apellidos">
                    </div>
                </div>
                <hr>
                <!-- Sección de foto de portada -->
                <div class="cover-section">
                    <h3>Foto de Portada</h3>
                    <div class="cover-picture">
                        <img src="img/portada-default.jpg" alt="Foto de Portada" class="cover-img" id="cover-img-preview">
                        <input type="file" name="cover-picture" id="cover-picture-input" accept="image/*" style="display: none;" onchange="previewImage(event, 'cover-img-preview')">
                        <button type="button" class="boton" onclick="document.getElementById('cover-picture-input').click();">Cambiar</button>
                    </div>
                </div>

                <!-- Sección de seguridad -->
                <div class="security-section">
                    <h3>Seguridad</h3>
                    <input type="password" name="current-password" placeholder="Contraseña Actual">
                    <input type="password" name="new-password" placeholder="Nueva Contraseña">
                    <input type="password" name="confirm-password" placeholder="Confirmar Nueva Contraseña">
                </div>

                <button class="boton btn" type="submit">Guardar Cambios</button>
            </form>
            <p>
                <a class="links" href="perfil.html">Cancelar</a>
            </p>
        </div>
    </main>

    <script>
        function previewImage(event, previewElementId) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById(previewElementId);
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
        </script>

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
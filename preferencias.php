<?php

include "php/conexion.php";

session_start();
if (isset($_SESSION["ID_usuario"])) {
    echo '
    <script>
        alert("¡Ya estas registrado, ya tenemos tu gustos, pimpollo!");
        window.location = "perfil.php";
    </script>';
    exit();
}
?>

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
    <link rel="stylesheet" href="css/preferencias.css">
</head>
<body>
    <main>
        <p>¿Qué te gustaría que te recomendaramos?</p>
        <div class="preferencias-container">
            <form id="buttonForm">
                <p>Selecciona 5 opciones</p>
                <div class="button-grid">
                    <button type="button" id="postre">Postres</button>
                    <button type="button" id="plato-fuerte">Plato fuerte</button>
                    <button type="button" id="vegetariano">Vegetariano</button>
                    <button type="button" id="vegano">Vegano</button>
                    <button type="button" id="tipico">Platillo típico</button>
                    <button type="button" id="alcohol">Bebidas alcoholicas</button>
                    <button type="button" id="Sustancias">Sustancias controladas</button>
                    <button type="button" id="exotico">Platillos exoticos</button>
                    <button type="button" id="mariscos">Mariscos</button>
                    <button type="button" id="bebidas">Bebidas sin alcohol</button>
                    <button type="button" id="snacks">Snacks</button>
                    <button type="button" id="picante">Picante</button>
                </div>          
                <div class="enviar">
                    <button type="submit">Enviar</button>
                </div>
                      
            </form>
        </div>
        
        
        <?php
        // Incluir el archivo de conexión
        include 'php/conexion.php';
        
        // Obtener los datos del formulario
        $id_usuario = 57; // Este es un ejemplo, deberías obtener el ID del usuario de una manera segura, por ejemplo, de la sesión
        $preferencias = isset($_POST['selectedButtons']) ? explode(',', $_POST['selectedButtons']) : [];
        
        // Validar los datos
        if (count($preferencias) !== 5 || !is_numeric($id_usuario)) {
            echo json_encode(['success' => false, 'message' => 'Datos inválidos']);
            exit;
        }
        
        // Eliminar las preferencias anteriores del usuario
        $stmt = $conexion->prepare("DELETE FROM preferencias WHERE ID_usuario = ?");
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $stmt->close();
        
        // Insertar las nuevas preferencias
        $stmt = $conexion->prepare("INSERT INTO preferencias (preferencia, ID_usuario) VALUES (?, ?)");
        
        foreach ($preferencias as $preferencia) {
            $stmt->bind_param("si", $preferencia, $id_usuario);
            $stmt->execute();
        }
        
        $stmt->close();
        $conexion->close();
        
        echo json_encode(['success' => true]);
        ?>
            
        
        <script>
        // JavaScript para manejar la selección y el envío
        const buttons = document.querySelectorAll('.button-grid button');
        const form = document.getElementById('buttonForm');
        const hiddenInput = document.getElementById('selectedButtons');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const selectedButtons = document.querySelectorAll('.button-grid .selected');
                if (button.classList.contains('selected')) {
                    // Deselecciona el botón si ya está seleccionado
                    button.classList.toggle('selected');
                } else if (selectedButtons.length < 5) {
                    // Selecciona el botón si no se ha alcanzado el límite
                    button.classList.add('selected');
                } else {
                    alert('Puedes seleccionar un máximo de 5 botones.');
                }
            });
        });

        form.addEventListener('submit', (event) => {
            const selectedButtons = [];
            buttons.forEach(button => {
                if (button.classList.contains('selected')) {
                    selectedButtons.push(button.id);
                }
            });
            hiddenInput.value = selectedButtons.join(','); // Asigna los IDs seleccionados al campo oculto
            // El formulario se enviará normalmente y los datos seleccionados se enviarán con él
        });
    </script>
        
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

<!---echo '<script>
    alert("¡Registro exitoso! Por favor, verifica tu correo electrónico para activar tu cuenta.");
    window.location = "../login.php";
    </script>';-->
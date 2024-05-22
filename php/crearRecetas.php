<?php

include 'conexion.php';

session_start();
if (!isset($_SESSION["ID_usuario"])) {
    header("location: login.php");
    exit();
}

$titulo = $_POST['titulo'];
$tiempo_preparacion =  $_POST['tiempo'];
$categoria =  $_POST['tipos'];
$porciones = $_POST['porciones'];
$descripcion = $_POST['descripcion'];
$preparacion = $_POST['preparacion'];

$iduser = $_SESSION['ID_usuario'];


$sql = "INSERT INTO recetas (ID_usuario, titulo, tiempo_preparacion, categoria, porciones, descripcion, preparacion)
        VALUES('$iduser', '$titulo','$tiempo_preparacion', '$categoria', '$porciones', '$descripcion', '$preparacion')";


if (mysqli_query($conexion, $sql)) {
    $id_receta = mysqli_insert_id($conexion);
    echo "Nueva receta creada con éxito. El ID de la receta es: " . $id_receta;

    // Recorrer los arreglos de ingredientes y hacer las inserciones
    $nombres = $_POST['nombre'];
    $cantidades = $_POST['cantidad'];
    $unidades = $_POST['unidad'];

    echo "Nueva receta creada con éxito. El ID de la receta es: " . count($unidades);

    for ($i = 0; $i < count($nombres); $i++) {
        $nombre = mysqli_real_escape_string($conexion, $nombres[$i]);
        $cantidad = mysqli_real_escape_string($conexion, $cantidades[$i]);
        $unidad = mysqli_real_escape_string($conexion, $unidades[$i]);

        $ingredientes_sql = "INSERT INTO ingredientes (ID_recetas, nombre, cantidad, unidad)
                             VALUES('$id_receta', '$nombre', '$cantidad', '$unidad')";

        if (mysqli_query($conexion, $ingredientes_sql)) {

            // Configuration
            $upload_dir = 'recetas/'; // directory to save the uploaded files
            $allowed_types = array('image/jpeg', 'image/png', 'image/gif'); // allowed image types

            // Loop through each file uploaded
            foreach ($_FILES as $file) {
                // Check if the file is an image
                if (in_array($file['type'], $allowed_types)) {
                    // Generate a unique filename
                    $filename = uniqid() . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);

                    // Move the uploaded file to the upload directory
                    if (move_uploaded_file($file['tmp_name'], $upload_dir . $filename)) {
                        // File uploaded successfully
                        echo "File uploaded successfully: " . $filename . "<br>";
                    } else {
                        // Error uploading file
                        echo "Error uploading file: " . $file['name'] . "<br>";
                    }
                } else {
                    // File type not allowed
                    echo "File type not allowed: " . $file['name'] . "<br>";
                }
            }
        }
    }

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

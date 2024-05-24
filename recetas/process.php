<?php
// start the session
session_start();

// connect to the database
include '../php/conexion.php';

// Get the rating value from the form
$rating = $_POST['rating'];

// Get the cigar ID from the session or URL parameter
$cigar_id = $_SESSION['ID_usuario'] ?? $_GET['ID_usuario'];

// Insert the rating into the database
$sql = "INSERT INTO recetas (ID_usuario, calificacion) VALUES ('$cigar_id', '$rating')";
mysqli_query($conexion, $sql);

// Calculate the average rating
$sql = "SELECT AVG(calificacion) as average_rating FROM recetas WHERE ID_usuario = '$cigar_id'";
$result = mysqli_query($conexion, $sql);
$row = mysqli_fetch_array($result);
$average_rating = $row['average_rating'];

// Update the cigar table with the average rating
$sql = "UPDATE recetas SET calificacion = '$average_rating' WHERE ID_usuario = '$cigar_id'";
mysqli_query($conexion, $sql);

// Close the database conexion
mysqli_close($conexion);
?>
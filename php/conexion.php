<?php

// Crear conexión
$conexion = new mysqli("localhost", "root", "", "paltacate");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

<?php
// Configuración de la conexión a la base de datos
$host = "localhost";  
$usuario = "administrador"; 
$contrasena = "administrador"; 
$base_de_datos = "ModaTextil"; 

// conexión a la base de datos
$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar si hay errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}
?>

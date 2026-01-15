<?php
// Conexión a la base de datos

$servername = "localhost";
$username = "root";
$password = "ferney0801";
$dbname = "san_jose";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Establecer charset a utf8
$conn->set_charset("utf8");
?>

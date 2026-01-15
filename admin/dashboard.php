<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Administrador | San José</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>

<h1>Bienvenido al Panel de Administración</h1>
<p>Usuario: <?php echo $_SESSION['admin']; ?></p>

<ul>
    <li><a href="#">Ver donaciones</a></li>
    <li><a href="#">Donaciones por abuelo</a></li>
    <li><a href="#">Administrar personal</a></li>
    <li><a href="logout.php">Cerrar sesión</a></li>
</ul>

</body>
</html>

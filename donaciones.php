<?php
include("php/conexion.php");

$stmt = $conexion->prepare(
    "INSERT INTO donaciones_abuelo (abuelo_id, nombre_donante, monto)
     VALUES (?, ?, ?)"
);
$stmt->bind_param("isd", $abuelo, $donante, $monto);
$stmt->execute();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Donaciones | San José</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<h2>Donaciones Generales</h2>

<?php if (isset($mensaje)) echo "<p>$mensaje</p>"; ?>

<form method="POST">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="email" name="correo" placeholder="Correo" required>
    <input type="number" name="monto" placeholder="Monto" required>
    <button type="submit">Donar</button>
</form>

</body>
</html>

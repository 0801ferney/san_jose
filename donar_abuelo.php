<?php
include("php/conexion.php");

// traer abuelos
$abuelos = $conexion->query("SELECT * FROM abuelos");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $abuelo = $_POST['abuelo'];
    $donante = $_POST['donante'];
    $monto = $_POST['monto'];

    $sql = "INSERT INTO donaciones_abuelo (abuelo_id, nombre_donante, monto)
            VALUES ('$abuelo', '$donante', '$monto')";
    $conexion->query($sql);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Donar a un Abuelo</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<h2>Donar a un Abuelo</h2>

<form method="POST">
    <select name="abuelo" required>
        <option value="">Seleccione un abuelo</option>
        <?php while($a = $abuelos->fetch_assoc()) { ?>
            <option value="<?php echo $a['id']; ?>">
                <?php echo $a['nombre']; ?>
            </option>
        <?php } ?>
    </select>

    <input type="text" name="donante" placeholder="Nombre del donante" required>
    <input type="number" name="monto" placeholder="Monto" required>
    <button type="submit">Donar</button>
</form>

</body>
</html>

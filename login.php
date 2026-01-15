<?php
session_start();
require_once("php/conexion.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $usuario = trim($_POST['usuario']);
    $contrasena = $_POST['contrasena'];

    if (empty($usuario) || empty($contrasena)) {
        $error = "Todos los campos son obligatorios";
    } else {

        $stmt = $conexion->prepare(
            "SELECT id, usuario, contrasena FROM usuarios WHERE usuario = ?"
        );
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            $fila = $resultado->fetch_assoc();

            if (password_verify($contrasena, $fila['contrasena'])) {
                $_SESSION['admin'] = $fila['usuario'];
                $_SESSION['admin_id'] = $fila['id'];
                header("Location: admin/dashboard.php");
                exit();
            } else {
                $error = "Contraseña incorrecta";
            }
        } else {
            $error = "Usuario no encontrado";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>San José | Iniciar Sesión</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body class="login-body">

    <div class="login-container">
        <h2>Geriátrico San José</h2>
        <p>Panel de Administración</p>

        <?php if (isset($error)) { ?>
            <p style="color:red;"><?php echo $error; ?></p>
        <?php } ?>

        <form method="POST" action="">
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <button type="submit">Ingresar</button>
        </form>
    </div>

</body>
</html>

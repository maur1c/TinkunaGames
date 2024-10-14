<?php
session_start();

if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_id'] != 1) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
</head>
<body>
    <h1>Panel de Administración</h1>
    <ul>
        <li><a href="admin_productos.php">Gestionar Productos</a></li>
        <li><a href="reportes.php">Ver Reportes de Ventas</a></li>
        <li><a href="admin_contactos.php">Ver Mensajes de Contacto</a></li>
        <li><a href="logout.php">Cerrar sesión</a></li>

    </ul>
</body>
</html>

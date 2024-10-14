<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
        }
        a {
            display: inline-block;
            margin: 15px;
            text-decoration: none;
            color: blue;
            font-size: 20px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Dashboard</h1>
    <p>Seleccione una opción:</p>
    <a href="productos.php">Productos</a>
    <a href="contacto.php">Contactos</a>
    <a href="carrito.php">Carrito</a>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>

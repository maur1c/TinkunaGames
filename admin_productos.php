<?php
include 'conexion.php';
session_start();

// Verificar si el usuario está autenticado y es un administrador
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_id'] != 1) { // Suponiendo que el admin es el usuario con id 1
    header('Location: login.php');
    exit();
}

// Obtener todos los productos
$stmt = $conn->query("SELECT * FROM productos");
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Productos</title>
</head>
<body>
    <h1>Administración de Productos</h1>
    <a href="agregar_producto.php">Agregar nuevo producto</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?php echo $producto['id']; ?></td>
                <td><?php echo $producto['nombre']; ?></td>
                <td><?php echo $producto['descripcion']; ?></td>
                <td><?php echo $producto['precio']; ?></td>
                <td>
                    <a href="editar_producto.php?id=<?php echo $producto['id']; ?>">Editar</a> |
                    <a href="eliminar_producto.php?id=<?php echo $producto['id']; ?>">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

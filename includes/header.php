<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tinkuna Games</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Bienvenido a Tinkuna Games</h1>
        <nav>
            <ul>
                <li><a href="php/productos.php">Productos</a></li>
                <?php if (isset($_SESSION['usuario_id'])): ?>
                    <li><a href="php/logout.php">Cerrar sesión</a></li>
                    <li><a href="php/admin.php">Administrar</a></li>
                <?php else: ?>
                    <li><a href="php/login.php">Iniciar sesión</a></li>
                    <li><a href="php/registro.php">Registrarse</a></li>
                    <li><a href="contacto.php">Contacto</a></li>

                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Nuestros Juegos</h2>
        <p>Explora nuestra selección de juegos y disfruta de la mejor experiencia.</p>
        <a href="php/productos.php">Ver Productos</a>
    </main>

    <footer>
        <p>&copy; 2024 Tinkuna Games. Todos los derechos reservados.</p>
    </footer>
</body>
</html>


<?php
include 'conexion.php'; // Conexión a la base de datos
session_start(); // Iniciar la sesión

$error = ''; // Variable para almacenar errores

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    // Verificar si el usuario existe en la base de datos
    $stmt = $conn->prepare("
        SELECT u.*, r.nombre_rol 
        FROM usuarios u
        INNER JOIN roles r ON u.rol_id = r.id
        WHERE u.email = ?
    ");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si la contraseña es correcta
    if ($usuario && password_verify($contraseña, $usuario['contraseña'])) {
        // Guardar información del usuario en la sesión
        $_SESSION['usuario_id'] = $usuario['id']; // Guardar el ID del usuario
        $_SESSION['nombre'] = $usuario['nombre']; // Guardar el nombre del usuario
        $_SESSION['rol_id'] = $usuario['rol_id']; // Guardar el ID del rol
        $_SESSION['correo'] = $usuario['email'];  // Guardar el correo del usuario

        // Redirigir según el rol usando el ID del rol
        if ($usuario['rol_id'] == 1) { // Supongamos que el ID del rol 'admin' es 1
            echo "Redirigiendo al panel de administración...";
            header('Location: admin_dashboard.php'); // Redirigir al panel de admin
        } elseif ($usuario['rol_id'] == 2) { // Supongamos que el ID del rol 'vendedor' es 2
            header('Location: Vendedor_dashboard.php'); // Redirigir al panel de vendedor
        } else {
            header('Location: index.php'); // Redirigir a la página de productos para clientes
        }
        exit();
    } else {
        $error = "Correo o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            text-align: center;
        }
        input {
            margin: 10px;
            padding: 10px;
            width: 300px;
        }
        button {
            padding: 10px 20px;
            cursor: pointer;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    
    <?php if ($error): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="contraseña" placeholder="Contraseña" required>
        <button type="submit">Iniciar Sesión</button>
    </form>

    <p>No tienes una cuenta? <a href="registro.php">Regístrate aquí</a></p>
</body>
</html>

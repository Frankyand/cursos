<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="es">
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <div class="cabecera">
        <img src="logo.jpeg" alt="izquierda" class="logo">
        <span class="titulo_c">CUERPO DE INGENIEROS DEL EJÉRCITO</span>
        <img src="logo.jpeg" alt="derecha" class="logo">
    </div>

    <h1 class="titulo">Inicio de sesión</h1>
    <form method="POST" action="procesar.php">
        <label for="nombre"> Usuario:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="contraseña">Contraseña:</label><br>
        <input type="password" id="contraseña" name="contraseña" required><br><br>

        <input type="submit" value="Ingresar">
    </form>

    <p>¿No tienes cuenta? <a href="formulario.php">Regístrate aquí</a></p>

    <?php
    if (isset($_GET['error'])) {
        echo "<p style='color:red;'>Usuario o contraseña incorrectos</p>";
    }
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSCRIPCIÓN</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <div class="cabecera">
        <img src="logo.jpeg" alt="izquierda" class="logo">
        <span class="titulo_c">CUERPO DE INGENIEROS DEL EJÉRCITO</span>
        <img src="logo.jpeg" alt="derecha" class="logo">
    </div>

    <h1 class= "titulo">INSCRIPCION DE USUARIO</h1>
    <form action="procesar.php" method="Post">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Correo:</label><br>
        <input type="email" name="correo" required><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="contraseña" required><br><br>

        <input type="submit" name="Inscribirse" required><br><br>
    </form>
    <br><a href="listar.php">Ver Inscritos</a>
    <br><a href="login.php">Volver al login</a>
</body>
</html>
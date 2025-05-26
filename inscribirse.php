<?php
    session_start();
    require("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscribirse</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <div class="cabecera">
        <img src="logo.jpeg" alt="izquierda" class="logo">
        <span class="titulo_c">CUERPO DE INGENIEROS DEL EJÉRCITO</span>
        <img src="logo.jpeg" alt="derecha" class="logo">
    </div><BR></BR>
    
    <div>
        <h3>Inscribirse a un curso:</h3>
        <form action="procesar_i.php" method="post">
            <label for="id_curso">Seleccione el curso:</label>
            <select name="id_curso" required>
                <?php
                $resultado = $conexion->query("SELECT id_e, cursos FROM cursos");
                while ($row = $resultado->fetch_assoc()) {
                echo "<option value='{$row['id_e']}'>{$row['cursos']}</option>";
                }
                ?>
            </select>
            <br><br>
            <button type="submit">Guardar Inscripción</button>
        </form>
    </div>

    <p><a href="bienvenida.php">Volver a Bienvenida</a></p>

</body>
</html>
<?php
require 'conexion.php';
$resultado = $conexion -> query("SELECT*FROM usuarios");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de inscritos</title>
    <link rel="stylesheet" href="estilos.css"> 
</head>
<body>

    <div class="cabecera">
        <img src="logo.jpeg" alt="izquierda" class="logo">
        <span class="titulo_c">CUERPO DE INGENIEROS DEL EJÉRCITO</span>
        <img src="logo.jpeg" alt="derecha" class="logo">
    </div>

    <h1 class="titulo">Lista de usuarios</h1>

    <table class="tabla">
        <tr>
            <th>id</th>
            <th>nombre</th>
            <th>correo</th>
            <th>contraseña</th>
            <th>fecha_inscripcion</th>
            <th>acciones</th>
        </tr>

        <?php while($registros = $resultado ->fetch_assoc()) { ?>
            <tr>
                <td><?= $registros['id'] ?></td>
                <td><?= $registros['nombre'] ?></td>
                <td><?= $registros['correo'] ?></td>
                <td><?= $registros['contraseña'] ?></td>
                <td><?= $registros['fecha_inscripcion'] ?></td>
                <td>
                    <a href="editar.php?id=<?= $registros['id'] ?>">ACTUALIZAR</a>
                    <a href="eliminar.php?id=<?= $registros['id'] ?>" onclick="return confirm('Eliminar?')">Eliminar</a>
                </td>
            </tr>

        <?php } ?>

    </table>
    <a href="formulario.php" class="nueva-inscripcion">Nueva inscripción</a>

</body>
</html>
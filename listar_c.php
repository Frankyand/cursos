<?php
require 'conexion.php';

// Consulta que une usuarios, cursos e inscripciones
$consulta = $conexion->query("
    SELECT 
        usuarios.nombre, 
        usuarios.correo,
        cursos.fecha_curso,
        cursos.fecha_creacion,
        cursos.cursos
    FROM inscripciones
    INNER JOIN usuarios ON inscripciones.id_usuario = usuarios.id
    INNER JOIN cursos ON inscripciones.id_curso = cursos.id_e
");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Cursos por Usuario</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <div class="cabecera">
        <img src="logo.jpeg" alt="izquierda" class="logo">
        <span class="titulo_c">CUERPO DE INGENIEROS DEL EJÉRCITO</span>
        <img src="logo.jpeg" alt="derecha" class="logo">
    </div>

    <h2 class="titulo">Listado de Cursos Inscritos por Usuario</h2>
    <table class="tabla">
        <thead>
            <tr>
                <th>Curso</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Fecha del Curso</th>
                <th>Fecha de Inscripción</th>
                
            </tr>
        </thead>
        <tbody>
            <?php while ($fila = $consulta->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $fila['cursos']; ?></td>
                    <td><?php echo $fila['nombre']; ?></td>
                    <td><?php echo $fila['correo']; ?></td>
                    <td><?php echo $fila['fecha_curso']; ?></td>
                    <td><?php echo $fila['fecha_creacion']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <p><a href="bienvenida.php" class="nueva-inscripcion">Volver a Bienvenida</a></p>

    <p><a href='logout.php' class="nueva-inscripcion">Cerrar sesión</a></p>
</body>
</html>
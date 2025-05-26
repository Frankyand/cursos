<?php
    session_start();
    require("conexion.php");
    $id_usuario_creador = $_SESSION['id'];
    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $cursos = $_POST['cursos'];
        $fecha_curso = $_POST['fecha_curso'];
        $fecha_creacion = date("Y-m-d");

        $consulta = $conexion->prepare("INSERT INTO cursos (cursos, fecha_curso, fecha_creacion, id_usuario_creador) VALUES (?, ?, ?, ?)");
        
        $consulta->bind_param("sssi", $cursos, $fecha_curso, $fecha_creacion, $id_usuario_creador);
        
        if ($consulta->execute()) {
            $mensaje = "Inscripción exitosa.";
        }else{
            echo "Error al inscribirse: "  . $consulta->error;
        }

        $consulta->close();
        $conexion->close();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenida</title>
    <link rel="stylesheet" href="estilos.css"> 
</head>
<body>

    <div class="cabecera">
        <img src="logo.jpeg" alt="izquierda" class="logo">
        <span class="titulo_c">CUERPO DE INGENIEROS DEL EJÉRCITO</span>
        <img src="logo.jpeg" alt="derecha" class="logo">
    </div><BR></BR>
    
    <?php
    if(isset($_SESSION['nombre']))
    {
        echo "Hola ".$_SESSION['nombre'];
      
    }
    else
        echo"No estas autenticado";
    ?><br>
    <div>
        <h2>Los cursos disponibles son los siguientes:</h2>
        <ul>
            <li>Equipo pesado                                fecha de inicio: 28/05/2025</li>
            <li>Mantenimiento de vehículos                   fecha de inicio: 24/05/2025</li>
            <li>Soldaduras                                   fecha de inicio: 27/05/2025</li>
            <li>Plataformero                                 fecha de inicio: 26/05/2025</li>
        </ul>
    </div>

    <div>
        <h1 class= "titulo">GENERAR UN CURSO</h1>
        <P> En el siguiente espacio el usuario podra generar un curso segun la disponibilidad de los mismos y seleccionar la fecha en la que se va a dictar dicho curso 
            , se recomienda visualizar la tabla de inscripciones para visulizar las fechas y los cursos en las que los otros usuarios generaron su registro ya que unicamente 
            se dictaran los cursos que tengan mayor cantidad de usuarios. </P>
         
        <form method="Post">
            <label>Curso:</label><br>
            <input type="text" name="cursos" required><br><br>

            <label>Fecha:</label><br>
            <input type="date" name="fecha_curso" required><br><br>

            <input type="submit" value="Guardar Inscripción"><br><br>
        </form>

        <?php
        if (isset($mensaje)) {
            echo "<p style='color: green; font-weight: bold;'>$mensaje</p>";
        }
        ?>
        
    </div>

        <p><a href='listar_c.php'>ver inscripciones</a></p>

        <p><a href='inscribirse.php'>Inscribirse a un curso</a></p>

        <p><a href='logout.php'>Cerrar sesión</a></p>
    

</body>
</html>
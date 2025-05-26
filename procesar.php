<?php
    session_start();
    require    'conexion.php';

    if (isset($_POST['nombre']) && isset($_POST['contraseña']) && !isset($_POST['correo'])) {
        $nombre = $_POST['nombre'];
        $contraseña = $_POST['contraseña'];

        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE nombre = ? AND contraseña = ?");
        $stmt->bind_param("ss", $nombre, $contraseña);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $_SESSION['nombre'] = $nombre;
            $usuario = $resultado->fetch_assoc();
            $_SESSION['id'] = $usuario['id'];
            header("Location: bienvenida.php");
            exit();
        } else {
            header("Location: login.php?error=1");
            exit();
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];

        $consulta = $conexion ->prepare("INSERT INTO usuarios (nombre, correo, contraseña) VALUES (?,?,?)");

        $consulta ->bind_param("sss", $nombre, $correo, $contraseña);
        
        if ($consulta->execute()) {
            header("Location: listar.php");
            exit();
        }else{
            echo "Error al inscribirse: "  . $consulta->error;
        }

        $consulta->close();
        $conexion->close();
    }

    
?>
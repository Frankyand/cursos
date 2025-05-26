<?php
    require 'conexion.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $consulta = $conexion ->prepare("SELECT nombre, correo FROM usuarios WHERE id = ?");
        $consulta ->bind_param("i",$id);
        $consulta->execute();
        $consulta->bind_result($nombre, $correo);
        $consulta->fetch();
        $consulta->close();

    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];

        $consulta = $conexion->prepare("UPDATE usuarios SET nombre = ?, correo = ? WHERE id = ?");
        $consulta->bind_param("ssi", $nombre, $correo, $id);
        $consulta->execute(); 
        header("Location: listar.php");
        
    }

?>

<h2>Editar Inscripción</h2>
<form method="POST">
    <input type="hidden" name="id" value="<?= $id ?>">
    Nombre:<br><input type="text" name="nombre" value="<?= $nombre ?>"><br><br>
    Correo:<br><input type="email" name="correo" value="<?= $correo ?>"><br><br>
    <input type="submit" value="Actualizar">
</form>

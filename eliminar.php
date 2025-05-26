<?php
require 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $consulta = $conexion->prepare("DELETE FROM usuarios WHERE id = ?");
    $consulta->bind_param("i", $id);
    $consulta->execute();
}

header("Location: listar.php");
?>
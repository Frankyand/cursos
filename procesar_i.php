<?php
session_start();
require("conexion.php");

if (isset($_POST['id_curso']) && isset($_SESSION['id'])) {
    $id_usuario = $_SESSION['id'];
    $id_curso = $_POST['id_curso'];
    $fecha_inscripcion = date("Y-m-d");

    $stmt = $conexion->prepare("INSERT INTO inscripciones (id_usuario, id_curso, fecha_inscripcion) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $id_usuario, $id_curso, $fecha_inscripcion);

    if ($stmt->execute()) {
        header("Location: listar_c.php");
        exit();
    } else {
        echo "Error al registrar inscripción: " . $stmt->error;
    }
    $stmt->close();
    $conexion->close();
}
?>
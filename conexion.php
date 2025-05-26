<?php
    $host = "localhost";
    $usuario = "root";
    $contraseña = "";
    $bd = "cursos_cee";

    $conexion = new mysqli($host, $usuario, $contraseña, $bd);

    if($conexion->connect_error){
        die("Conexion fallida: " . $conexion-> connect_error);
    }
?>
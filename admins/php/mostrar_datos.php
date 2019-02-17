<?php
 require('conexion.php');
$conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_name);
if (mysqli_connect_errno()){
        echo "Error de conexion";
        exit();
    }

$consulta = mysqli_query("SELECT * FROM Catalogo");
?>
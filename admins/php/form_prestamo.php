<?php
    session_start();
    $Fecha_retiro = $_POST["Fecha_retiro"];
    $Fecha_devolucion = $_POST["Fecha_devolucion"];
    $idCedula = $_POST["idCedula"];

require('conexion.php');
$conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_name);
if (mysqli_connect_errno()){
        echo "Error de conexion";
        exit();
    }
mysqli_set_charset($conexion, 'utf8');
    $consulta= "INSERT INTO prestamo (Fecha_retiro, Fecha_devolucion, Admin_idAdmin) VALUES ('$Fecha_retiro', '$Fecha_devolucion', '$idCedula')";
$resultado = mysqli_query($conexion, $consulta);
    if ($resultado == false)
    {
        echo "error en la consulta";
    } else {
        echo "registro insertado";
    }
    
?>
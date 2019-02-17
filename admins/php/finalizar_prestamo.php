<?php
    session_start();
    $id= $_REQUEST['id'];
    $_SESSION['id'] = $id;
    echo $idPrestamo= $_SESSION['id'];
    
    require('conexion.php');
    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_name);
    if (mysqli_connect_errno()){
        echo "Error de conexion";
        exit();
    }
    
    mysqli_set_charset($conexion, 'utf8');
    $consulta3 = "SELECT * FROM prestamo WHERE idPrestamo='$idPrestamo'";
    $resultado3 = mysqli_query($conexion,$consulta3);
    $mostrar2 = mysqli_fetch_array($resultado3);
    echo $Carnet = $mostrar2['Carnet'];

    $consulta4 = "SELECT * FROM alumnos WHERE idCarnet = '$Carnet'";
    $sql = mysqli_query($conexion,$consulta4);
    $mostrar4 = mysqli_fetch_array($sql);
    $Prestamo = $mostrar4['Prestamo'];
    $Prestamo = $Prestamo - 1 ;


    $Codigo = $mostrar2['Codigo'];
    $consulta4 = "SELECT * FROM catalogo WHERE Codigo='$Codigo'";
    $resultados4 =mysqli_query($conexion,$consulta4);
    $mostrar3 = mysqli_fetch_array($resultados4);
    $Cantidad = $mostrar3['Cantidad'];
    $Cantidad = $Cantidad + 1;
    $consulta = "DELETE FROM prestamo WHERE idPrestamo='$idPrestamo'";
    $resultados = mysqli_query($conexion, $consulta);
    if($resultados == false){
        echo "error en la consulta";
    }
    else{
        echo"Registro eliminado";
        $consulta2 = "UPDATE catalogo SET Cantidad='$Cantidad' WHERE Codigo='$Codigo'";
        $resltados2 = mysqli_query($conexion,$consulta2);
        $consulta5 = "UPDATE alumnos SET Prestamo = '$Prestamo' WHERE idCarnet = '$Carnet'";
        $resultados5 = mysqli_query($conexion, $consulta5);
        header("Location:../administrar_prestamosmsg.php");
    }
?>
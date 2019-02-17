<?php
    header('Access-Control-Allow-Origin: *');  
	session_start();
	$libro_encontrado = $_REQUEST['Nombre'];
	$Carnet = $_SESSION['user'];
	$Carnet = 2014103;

	require('conexion.php');
    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_name);
    if (mysqli_connect_errno()){
        echo "Error de conexion";
        exit();
    }
    mysqli_set_charset($conexion, 'utf8');

    $consulta = "SELECT * FROM libro_no_encontrado WHERE Nombre = '$libro_encontrado'";
    	$resultados = mysqli_query($conexion, $consulta);
    	$row_cnt = mysqli_num_rows($resultados);
    	$mostrar = mysqli_fetch_array($resultados);
    	$cantidad = $mostrar['contador'] + 1;
    	if ($row_cnt >= 1){
    		$consulta = "UPDATE libro_no_encontrado SET contador = '$cantidad'";
    		$resultados2 = mysqli_query($conexion, $consulta);
    	} else{
    		$consulta = "INSERT INTO libro_no_encontrado (Nombre, contador, Carnet) VALUES ('$libro_encontrado', '1', '$Carnet')";
    		$resultados2 = mysqli_query($conexion, $consulta);
    	}
           if ($resultados2 == false) {
            echo "error en la consulta";

        }
        else {
            header ("Location: ../index.php");
        }

?>
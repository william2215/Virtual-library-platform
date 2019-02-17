<?php
    session_start();
    
    //Realiza la conexion
    require('php/conexion.php');
    $conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_name);
    mysqli_set_charset($conexion, 'utf8');
        $i=0;
        for($i; $i<=6; $i++){
            //Consulta que consigue los prestamos realizados por una generacion
            $consulta = "SELECT * FROM registro WHERE Nivel='$i'";
            $resultados = mysqli_query($conexion,$consulta);
            $row_ctn = mysqli_num_rows($resultados);
            
            //Inserta el numero de prestamos realizados por una generación
            
            $consulta2 = "UPDATE nivel SET Prestamos = '$row_ctn' WHERE idNivel= '$i'";
            $resultados2 = mysqli_query($conexion,$consulta2);
            if ($resultado2 = false){
                echo "error";
            }
            
        }


        header('content-Type: application/json');

        require('php/conexion.php');
        $conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_name);
        mysqli_set_charset($conexion, 'utf8');
    
        if(!$conexion){
            die("Connection failed: " . $conexion->error );
        }

        $consulta2 = sprintf("SELECT Nivel, Prestamos ORDER BY idNivel");

        //ejecutar query
        $result = mysqli_query($conexion, $consulta2)
        
        //loop through the returned data
            $data = array();
foreach ($result as $row){
    $data [] = $row;
}

//free memory associated with result
$result -> close();

//close connection

$conexion -> close();

//print the data
print json_encode($data);
        ?>
<?php
    header('Access-Control-Allow-Origin: *');  
    session_start();
    
    //Realiza la conexion
    require('conexion.php');
    $conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_name);


        header('content-Type: application/json');

        $conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_name);
        mysqli_set_charset($conexion, 'utf8');
    
        if(!$conexion){
            die("Connection failed: " . $conexion->error );
        }

        $consulta2 = sprintf("SELECT Nombre, contador FROM libro_no_encontrado ORDER BY contador DESC LIMIT 5");

        //ejecutar query
        $result = mysqli_query($conexion, $consulta2);
        
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
<?php
header('Access-Control-Allow-Origin: *');  
header('Content-Type: application/json');

require('conexion.php');
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


$sqlQuery = "SELECT * FROM nivel ORDER BY idNivel";

$result = mysqli_query($conexion,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}



print json_encode($data);
?>

<?php
//define el tipo de data
header('Access-Control-Allow-Origin: *');  
header('Content-Type: application/json');


require('conexion.php');
$conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_name);
mysqli_set_charset($conexion, 'utf8');

 //obtiene el id max de la tabla clashificacion

$rowSQL = mysqli_query($conexion, "SELECT MAX(idClasificacion) AS maxid FROM clasificacion"); 
$row = mysqli_fetch_assoc($rowSQL); 
$id = $row['maxid']; 

//rellena la cantidad de registros que posse cada clasificacion
$i = 0;
for($i; $i<=$id; $i++){
    //Consulta que consigue los prestamos realizados por una generacion
            $consulta = "SELECT * FROM registro WHERE Clasificacion='$i'";
            $resultados = mysqli_query($conexion,$consulta);
            $row_ctn = mysqli_num_rows($resultados);
            
            //Inserta el numero de prestamos realizados por una generación
            
            $consulta2 = "UPDATE clasificacion SET Marks = '$row_ctn' WHERE idClasificacion= '$i'";
            $resultados2 = mysqli_query($conexion,$consulta2);
            if ($resultado2 = false){
                echo "error";
            }
            
        }
$sqlQuery = "SELECT * FROM clasificacion ORDER BY idClasificacion";

$result = mysqli_query($conexion,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}



print json_encode($data);
?>
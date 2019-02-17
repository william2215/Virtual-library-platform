
<?php
//define el tipo de data
header('Access-Control-Allow-Origin: *');  
header('Content-Type: application/json');

require('conexion.php');
$conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_name);
mysqli_set_charset($conexion, 'utf8');

 //ORDENA LOS DATOS POR LE # DE PEDIDOS Y OBTIENE LOS 5 MAYORES

            $consulta = "SELECT Codigo, Nombre_articulo, Pedidos FROM catalogo ORDER BY Pedidos DESC LIMIT 5";
            $resultados = mysqli_query($conexion,$consulta);
            
            

$data = array();
foreach ($resultados as $row) {
	$data[] = $row;
}



print json_encode($data);
?>
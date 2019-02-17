<?php
session_start();
    $Cedula = $_SESSION['user'];
    $Activo = FALSE;
    $Ultima_sesion = date("Y-m-d");
    require ("conexion.php");
	$conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_name);
    $Consulta = "UPDATE admin SET Ultima_sesion='$Ultima_sesion', Activo='$Activo' WHERE idAdmin = '$Cedula'";
    $resultados = mysqli_query($conexion, $Consulta);
    if ($resultados == false){
        echo "error en la consulta";
        
    }   else{
    $SESSION = array();
    session_destroy();
        header("Location: ../log_in.html");
    } 
        
?>
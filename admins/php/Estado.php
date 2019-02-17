<?php 
    session_start();
    $Descripcion=$_POST["Descripcion"];
    $Condicion=$_POST["Condicion"];

    require("conexion.php");
	$conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_name);

	if(mysqli_connect_errno()){
		echo "Error en la conexion";
		exit();
	}
	mysqli_set_charset($conexion,"utf8");
	$consulta="INSERT INTO estado (Descripcion, Condicion) VALUES ('$Descripcion', '$Condicion')";
	$resultados=mysqli_query($conexion,$consulta);
	if ($resultados==false){
		echo "error en la consulta";
	}
	else{
		$_SESSION['idEstado']=$idEstado;
        header("Location: ../formulario_clasificacion.html");
	} 

?>
<?php 
    session_start();
    $Descripcion=$_POST["Descripcion"];

    require("conexion.php");
	$conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_name);

	if(mysqli_connect_errno()){
		echo "Error en la conexion";
		exit();
	}
	mysqli_set_charset($conexion,"utf8");
	$consulta="INSERT INTO tipo_archivo (Descripcion) VALUES ('$Descripcion')";
	$resultados=mysqli_query($conexion,$consulta);
    $consulta2 = "SELECT MAX(idTipo_archivo) FROM tipo_archivo";
    $idTipo_archivo = mysqli_query($conexion,$consulta2);
	if ($resultados==false){
		echo "error en la consulta";
	}
	else{
		$_SESSION['idTipo_archivo'] = $idTipo_archivo;
        header("Location: ../formulario_clasificacion.html");
	} 

?>
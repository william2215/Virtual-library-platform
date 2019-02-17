<?php 
    session_start();
	$Nombre_biblioteca=$_POST["Nombre_biblioteca"];
    $Descripcion=$_POST["Descripcion"];

	require("registroinsertado.php");
	$conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);

	if(mysqli_connect_errno()){
		echo "Error en la conexion";
		exit();
	}
	mysqli_set_charset($conexion,"utf8");
	$consulta="INSERT INTO ubicacion (id_ubicacion, Nombre_biblioteca, Descripcion) VALUES ('$id_ubicacion', '$Nombre_biblioteca', '$Descripcion')";
	$resultados=mysqli_query($conexion,$consulta);
    $consulta2 = "SELECT MAX(id_ubicacion) FROM ubicacion";
    $idUbicacion = mysqli_query ($conexion,$consulta2);
	if ($resultados==false){
		echo "error en la consulta";
	}
	else{
		$_SESSION['idUbicacion'] = $idUbicacion;
        header ("Location: ../formulario_clasificacion.html");
	}
?>
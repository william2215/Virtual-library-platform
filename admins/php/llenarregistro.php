<?php  
    session_start();
//obtiene variables
	$idAdmin=$_POST["Cedula"];
	$Nombre=$_POST["Nombre"];
    $Pa=$_POST["Pa"];
    $Sa=$_POST["Sa"];
    $Celular=$_POST["Celular"];
    $Correo=$_POST["Correo"];
    $Password = $_POST["Password"];
    $Activo = TRUE;
    $Ultima_sesion = date("Y-m-d");
    
    //realiza la conexion

	require("conexion.php");
	$conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_name);

	if(mysqli_connect_errno()){
		echo "Error en la conexion";
		exit();
	}

    //realiza la consulta e inserta los datos en la tabla Admin
	mysqli_set_charset($conexion,"utf8");

    $verificar = "SELECT * FROM admin WHERE idAdmin ='$idAdmin'";
    $sql = mysqli_query($conexion, $verificar);
    $row_cnt = mysqli_num_rows($sql);
    if($row_cnt ==1){
        header ("Location: ../index_adminerr.php");
    } else{
	$consulta="INSERT INTO admin (idAdmin, Nombre, Pa, Sa, Celular, Correo, Password, Activo, Ultima_sesion ) VALUES ('$idAdmin', '$Nombre', '$Pa', '$Sa', '$Celular', '$Correo', '$Password', '$Activo', '$Ultima_sesion')";
	$resultados=mysqli_query($conexion,$consulta);
	if ($resultados==false){
		echo "error en la consulta";
	}
	else{
        $_SESSION['user']= $idAdmin;
        header ("Location: ../index_adminmsg.php");
	}
    }
?>
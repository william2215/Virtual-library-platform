<?php
    session_start(); //coockie
    require ("conexion.php");
	$conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_name);
    if (isset($_POST['Cedula'])) { //busca la variable
		if ($_POST['Cedula']!="" && $_POST['Password']!="") { // si encuentra el usuario y contraseña
            $Cedula = $_POST["Cedula"];
            $Password = $_POST["Password"];
            $Ultima_sesion = date("Y-m-d");
            $Consulta1 = "SELECT * FROM admin WHERE idAdmin = '$Cedula' AND Password = '$Password'";
            $resultado1 = mysqli_query($conexion, $Consulta1);
            $countx1 = mysqli_num_rows($resultado1);
                if($countx1 == 1){
                $_SESSION['user']=$Cedula; //define el nombre de la coockie 
                    $Activo = TRUE;
                    $Consulta2 = "UPDATE admin SET Ultima_sesion='$Ultima_sesion', Activo='$Activo' WHERE idADMIN = '$Cedula'";
                    $resultado2 = mysqli_query($conexion, $Consulta2);
                    if ($resultado2 == false){
                        echo "error en la consulta";
                    }
                    else{
                        echo "datos guardados";
                 header("Location:../index_admin.php");//direcciona al inicio
                    }
                }else{
                       header("Location:../log_inmsg.html");
                }
        } 
    }else{
        echo "Por favor, llene todos los datos";
    }
?>
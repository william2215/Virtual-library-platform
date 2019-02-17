<?php
    session_start(); //coockie
	require ("conexion.php");
	$conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_name);
    if (isset($_POST['Carnet'])) { //busca la variable
		if ($_POST['Carnet']!="" && $_POST['Password']!="") { // si encuentra el usuario y contraseña
            $Carnet = $_POST["Carnet"];
            $Password = $_POST["Password"];
            $Consulta = "SELECT * FROM alumnos WHERE idCarnet = '$Carnet' AND Password = '$Password'";
            $resultado = mysqli_query($conexion, $Consulta);
            $countx1 = mysqli_num_rows($resultado);
                if($countx1 == 1){
                $_SESSION["user"]= $Carnet; //define el nombre de la coockie
                   // setcookie("usuario", "$Correo", time() + 84600);
                 header("Location:../Catalogo.php");//direcciona al inicio
                }else{
                    header("Location:../log_inmsg.html"); 
                }
        } 
    }else{
        echo "Por favor, llene todos los datos";
    }
?>
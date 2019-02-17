<?php 
    session_start();
   echo $Carnet = $_POST["Carnet"];
    echo $Nombre = $_POST["Nombre"];
    echo $Pa = $_POST["Pa"];
    echo $Sa = $_POST["Sa"];
    echo $Celular = $_POST["Celular"];
    echo $Nivel = $_POST["Nivel"];
   echo $Seccion = $_POST["Seccion"];
   echo $Especialidad = $_POST["Especialidad"];
   echo $Correo = $_POST["Correo"];
   echo $Password = $_POST["Password"];
   echo $Prestamo = 0;

    if($Nivel == "7"){
       echo $idNivel = 1;
    }else if($Nivel == "8"){
        echo $idNivel = 2;
    } else if($Nivel == "9"){
        echo $idNivel = 3;
    } else if($Nivel == "10"){
        echo $idNivel = 4;
    } else if($Nivel == "11"){
        echo $idNivel = 5;
    } else if($Nivel == "12"){
        echo $idNivel = 6;
    }
    
require('conexion.php');
    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_name);
    if (mysqli_connect_errno()){
        echo "Error de conexion";
        exit();
    }

    $verificar = "SELECT * FROM alumnos WHERE idCarnet ='$Carnet'";
    $sql = mysqli_query($conexion, $verificar);
    $row_cnt = mysqli_num_rows($sql);
    if($row_cnt ==1){
        header ("Location: ../sing_upmsg.php");
    } else{

    mysqli_set_charset($conexion, 'utf8');
    $consulta = "INSERT INTO alumnos(idCarnet, Nombre, Pa, Sa, Celular, Password, Seccion, Especialidad, Correo, Prestamo, Nivel) VALUES ('$Carnet', '$Nombre', '$Pa', '$Sa', '$Celular', '$Password', '$Seccion', '$Especialidad', '$Correo', '$Prestamo', '$idNivel')";
    

    $resultados = mysqli_query($conexion, $consulta);
        if ($resultados == false) {
            echo "error en la consulta";

        }
        else {
            $_SESSION['user']=$Carnet;
            $_SESSION['Nivel']=$Nivel;
            header ("Location: ../catalogo.php");
        }
    }
    ?>3
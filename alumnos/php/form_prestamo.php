<?php
    session_start();
//obtiene valores y variables
    echo $Fecha_retiro = $_POST["Fecha_retiro"];
      $Fecha_devolucion = $_POST["Fecha_devolucion"];
    echo $idCarnet  = $_SESSION['user'];
    echo $id = $_SESSION['id_libro'];

    $idadmin = 101110111;    

//conexion

require('conexion.php');
$conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_name);
if (mysqli_connect_errno()){
        echo "Error de conexion";
        exit();
    }

//obtiene el numero de filas de la consulta

if($result = mysqli_query($conexion, "SELECT Codigo FROM prestamo WHERE Carnet='$idCarnet' AND Codigo='$id'")){ //consulta del resultado
    $row_cnt = mysqli_num_rows($result);
    /*Funcion para igualar la vairable al numero de filas de un resultado*/
}

//Funcion para ver si posee un libro del mismo ejemplar
if($row_cnt >=1){
    header("Location: ../Catalogomsg1.php"); 
}
else{
    
    //Obtiene la informacion del catalogo

mysqli_set_charset($conexion, 'utf8');
    $consulta2 = "SELECT * FROM catalogo where Codigo = '$id'";
    $resultado2 = mysqli_query($conexion, $consulta2);  
    $mostrar = mysqli_fetch_array($resultado2);
    echo $idEstado = $mostrar['Estado'];
    $Cantidad = $mostrar['Cantidad'];
    $Cantidad = $Cantidad - 1;
    $Pedidos = $mostrar['Pedidos'];
    $Pedidos = $Pedidos +1;
    $Nombre = $mostrar['Nombre_articulo'];
    $Clasificacion = $mostrar['Clasificacion'];
    
    //Obtiene la información del estudiante
    // y aumenta la cantidad de libros pedidos en la tabla alumnos
    $consulta3 = "SELECT * From alumnos WHERE idCarnet='$idCarnet'";
    $resultado3 = mysqli_query($conexion,$consulta3);
    $mostrar2 = mysqli_fetch_array($resultado3);
    $Prestamo = $mostrar2['Prestamo'];
    $idNivel = $mostrar2 ['Nivel'];
    $Prestamo = $Prestamo + 1;
    //Se asegura de que el alumno no posea 3 o más libros a su nombre
    if ($mostrar2['Prestamo'] >=3){
        header("Location: ../Catalogomsg2.php"); 
    }
    //llena la tabla prestamo con la informacion de este
    
    else{
        
    $consulta= "INSERT INTO prestamo (Fecha_retiro, Fecha_devolucion, Estado, Admin, Carnet, Codigo) VALUES ('$Fecha_retiro', '$Fecha_devolucion', '$idEstado', '$idadmin', '$idCarnet', '$id')";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado == false)
    {
        echo "error en la consulta";
    } else {
        
        //Actualiza el catalogo
    $consulta2 = "UPDATE catalogo SET Cantidad='$Cantidad', Pedidos='$Pedidos'  WHERE Codigo=$id";
    $resultado2= mysqli_query($conexion, $consulta2);
        //Actualiza el # de prestamos del alumno
    $consulta4 = "UPDATE alumnos SET Prestamo = '$Prestamo'  WHERE idCarnet='$idCarnet'";
    $resultado4 = mysqli_query($conexion,$consulta4);
        //Actualiza el historial de pedidos
    $Consulta5 = "INSERT INTO registro(Nombre_archivo, Fecha_annadir, Estado, Codigo, Carnet, Clasificacion, Nivel) VALUES ('$Nombre', '$Fecha_retiro', '$idEstado', '$id', '$idCarnet', '$Clasificacion', '$idNivel')";
    $resultados5 = mysqli_query($conexion,$Consulta5);
        if($resultados5 = false){
            echo "error en la consulta";
        } else{
             header ("Location: ../codigo_barras.php");
        }
   
    }
}
}
    
?>
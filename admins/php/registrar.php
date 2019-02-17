<?php 
    session_start();
    $Codigo = $_POST["Codigo"];
    $Asignatura = $_POST["Asignatura"];
    $Autor = $_POST["Autor"];
    $Nombre_articulo = $_POST["Nombre_articulo"];
    $Procedencia = $_POST["Procedencia"];
    $Fecha_ingreso = date("Y-m-d");
    $Numero_serie = $_POST["Numero_serie"];
    $Modelo = $_POST["Modelo"];
    $Precio = $_POST["Precio"];
    $Cantidad = $_POST["Cantidad"];
    $idEstado = 1;
    $Tipo_archivo = $_POST["Tipo_archivo"];
    $Ubicacion = $_POST["Ubicacion"];
    $Clasificacion = $_POST["Clasificacion"];
    $Region = $_POST["Region"];
    $imagen=$_FILES['imagen']['name'];
    $ruta = $_FILES['imagen']['tmp_name'];
    $destino = "images/".$imagen;
    copy($ruta, $destino);

//Conecta con la base de datos
    require("conexion.php");
	$conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_name);
mysqli_set_charset($conexion,'utf8');

	if(mysqli_connect_errno()){
		echo "Error en la conexion";
		exit();
	}
    
    //Obtiene los datos en el y determinas los id
    $sql1 = "SELECT * FROM clasificacion WHERE Clasificacion = '$Clasificacion'";
    $query1 = mysqli_query($conexion, $sql1);
    $data1 = mysqli_fetch_array($query1);
    $id_Clasificacion = $data1['idClasificacion'];

 $sql2 = "SELECT * FROM dowi WHERE Dowi = '$Region'";
    $query2 = mysqli_query($conexion, $sql2);
    $data2 = mysqli_fetch_array($query2);
    $id_Region = $data2['idDowi'];


$Pedidos = 0;
    

$sql3 = "SELECT * FROM tipo_archivo WHERE Descripcion = '$Tipo_archivo'";
    $query3 = mysqli_query($conexion, $sql3);
    $data3 = mysqli_fetch_array($query3);
    $idTipo_archivo = $data3['idTipo_archivo'];
    
    if ($Ubicacion == "Colegio Técnico Don Bosco"){
        $idUbicacion = 1;
    }
    else if ($Ubicacion == "Escuela San Juan Bosco"){
        $idUbicacion = 2;
    }  
    

    
	
    //Inserta los datos en el catalogo


	mysqli_set_charset($conexion,"utf8");
//Revisa que no haya ningún registro con el mismo codigo
    $verificar = "SELECT * FROM catalogo WHERE Codigo ='$Codigo'";
    $sql = mysqli_query($conexion, $verificar);
    $row_cnt = mysqli_num_rows($sql);
    if($row_cnt ==1){
        header ("Location: ../index_adminerr.php");
    } else{
    
	$consulta="INSERT INTO catalogo(Codigo, Asignatura, Autor, Nombre_articulo, Procedencia, Cantidad, Fecha_ingreso, Precio, Numero_serie, Modelo, Pedidos, Clasificacion, Dowi, Estado, Tipo_archivo, Ubicacion, Imagen) VALUES ('$Codigo', '$Asignatura', '$Autor', '$Nombre_articulo', '$Procedencia', '$Cantidad', '$Fecha_ingreso', '$Precio', '$Numero_serie', '$Modelo', '$Pedidos', '$id_Clasificacion', '$id_Region', '$idEstado', '$idTipo_archivo', '$idUbicacion', '$destino')";
	$resultados = mysqli_query($conexion,$consulta);

	if ($resultados==false){
		echo "error en la consulta";
	}
	else{
		header("Location: ../index_adminmsg.php");
	}
    }
?>
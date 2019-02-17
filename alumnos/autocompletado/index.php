<?php
header('Access-Control-Allow-Origin: *'); 
?>
<html>
<head>
    <title>Buscador</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="../../vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/creative.min.css" rel="stylesheet">
</head>
<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Valdocco</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="../Catalogo.php">Catalogo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="../Prestamo_realizados.php">Prestamos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="index.php">Buscador</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="../php/log_out.php">Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <section class="bg-light" id="about">


        <div class="container">
            <div class="row-fluid">
                <br>

                <?php 
                            //header('Access-Control-Allow-Origin: *');  
                if (isset($_GET["id"])){
                    $filtro=$_GET["id"];
                }else{
                    $filtro=0;
                    ?>
                    <div class="col-md-12 col-md-offset-2" id="buscador">
                                    <h3 class="text-center">Bienvenido/a al buscador de libros, por favor escriba el nombre del libro que quiere solicitar.</h3>
                                    <br>
                                       <br>
                                       
                        <input type="search" name="autocomplete" class="form-control" placeholder="Nombre del Libro" />
                    </div>
                    <div class="col-md-8 col-md-offset-2" id="busqueda">



                    </div>
                    <?php } ?>
                </div>
            </div>  





            <?php
            //header('Access-Control-Allow-Origin: *');  
            require('conexion.php');
            $conexion = $conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_name);
            mysqli_set_charset($conexion, 'utf8');
            $consulta = "SELECT * from catalogo where Codigo='$filtro'";
            $resultados = mysqli_query($conexion, $consulta);
            
            while($mostrar = mysqli_fetch_array($resultados)){
                ?>
                <div class="container ">
                    <br>
                    

                    <div class="container">
                        <div class="col-xs-12 col-md-12" style="float: right;">
                            <div class="card w-10 ">
                                <div class="card-header">
                                    <p><?php  //header('Access-Control-Allow-Origin: *'); 
                                    echo $mostrar['Nombre_articulo'] ?></p>
                                </div>
                                <td align="center"><?php // header('Access-Control-Allow-Origin: *'); 
                                echo '<img src="../../admins/php/'.$mostrar['Imagen'].'">'?></td>
                                <div class="card-body">
                                    <h3 class="card-title"><?php  //header('Access-Control-Allow-Origin: *');
                                    echo $mostrar['Autor'] ?></h3>
                                    <button data-toggle="collapse" data-target="#demo" class="btn btn-danger">Descripcion</button>
                                    <div id="demo">
                                        <p class="card-text " ><?php // header('Access-Control-Allow-Origin: *');  
                                        echo $mostrar['Asignatura'] ?><br>Cantidad disponible:<?php echo $mostrar['Cantidad'] ?><br>Modelo:<?php echo $mostrar['Modelo'] ?>    </p>
                                    </div>
                                    <br>
                                    <br>

                                    <button class="btn btn-dark"><a href="../Prestamo.php?id=<?php // header('Access-Control-Allow-Origin: *');  
                                    echo $mostrar['Codigo']; ?>" class="btn btn-dark"> Solicitar </a></button>
                                </div>
                                <div class="card-footer">
                                    <p>CEDES DON BOSCO</p>

                                </div>
                            </div>
                        </div>

                    </div>

                    

                </div>

            </div>
            <!-- <div class="container">
                <tr>
                <td align="center"><?php echo $mostrar['Codigo'] ?></td>
                <td align="center"><?php echo $mostrar['Asignatura'] ?></td>
                <td align="center"><?php echo $mostrar['Autor'] ?></td>
                <td align="center"><?php echo $mostrar['Nombre_articulo'] ?></td>
                <td align="center"><?php echo $mostrar['Clasificacion_idClasificacion'] ?></td>
                <td align="center"><?php echo $mostrar['Cantidad'] ?></td>
                <td align="center"><?php echo $mostrar['Modelo'] ?></td>
                <td align="center"><a href="../Prestamo.php?id=<?php echo $mostrar['Codigo']; ?>"> Solicitar </a></td>
            </tr> -->
            <?php
        }
        ?>
    </table>
</div>

</section>

</div>




<!-- Footer -->
<footer id="footer">


</footer>

<!-- Scripts -->
<script src="js/jquery-1.11.1.min.js"></script>

<script src="statics/js/functions.js"></script>

<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../../vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="../../vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Custom scripts for this template -->
<script src="../../js/creative.min.js"></script>

</body>
</html>
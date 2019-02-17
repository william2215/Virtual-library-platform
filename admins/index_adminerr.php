<?php
    require('php/conexion.php');
    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_name);
    mysqli_set_charset($conexion, 'utf8');

    $consulta = mysqli_query($conexion, "SELECT Descripcion FROM tipo_archivo");
    $consulta2 = mysqli_query($conexion, "SELECT Nombre_biblioteca FROM ubicacion");
    $consulta3 = mysqli_query($conexion, "SELECT Clasificacion FROM clasificacion");
    $consulta4 = mysqli_query($conexion, "SELECT Dowi FROM dowi");

?>
<html>
	<head>
		    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Valdocco</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
        <script src="../vendor/jquery/jquery.min.js"></script>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/creative.min.css" rel="stylesheet">

</head>
<style type="text/css">
    #about{
        height: 1100px;
        
       
    }
    .modal-title{
    text-align:center;
}
    </style>
	<body id="page-top">


			 <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top" >Valdocco</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="index_admin.php">Registrar libro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="administrar_prestamos.php">Administrar Prestamos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="datos.html">Datos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="php/log_out.php">Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
        

				 <section class="bg-light" id="about">

        <div class="container text-dark">
            <div class="row">
                <div class="col-lg-8 col-xl-12">
                    <div class="col-lg-10 col-xl-12 mx-auto">
                        <h1 class="text-uppercase text-dark text-center">                        
                            <strong>Registrar Libro</strong>
                        </h1>
                        <hr>
                    </div>          

                    <section>

                        <form name="form1" method="post" action="php/registrar.php" enctype="multipart/form-data">
                            <div class="fields">
                                <div class="field">

                                    <input type="text" class="form-control" name="Codigo" id="Codigo" placeholder="Código" required/>
                                </div>
                                <br>
                                <div class="field">
                                    <input type="text" class="form-control" name="Asignatura" id="Asignatura" placeholder="Asignatura" required/>
                                </div>
                                <br>
                                <div class="field">

                                    <input type="text" class="form-control" name="Autor" id="Autor" placeholder="Autor" required />
                                </div>
                                <br>
                                <div class="field">
                                    <input type="text" class="form-control" name="Nombre_articulo" id="Nombre_articulo" placeholder="Nombre del articulo" required />
                                </div>
                                <br>
                                <div class="field">
                                    <input type="text" class="form-control" name="Procedencia" id="Procedencia" placeholder="Procedencia" required />
                                </div>
                                <br>
                                <div class="field">
                                    <input type="number" class="form-control" name="Numero_serie" id="Numero_serie" placeholder="Numero de serie" required />
                                </div>
                                <br>
                                <div class="field">
                                    <input type="text" class="form-control" name="Modelo" id="Modelo" placeholder="Modelo" required />
                                </div>
                                <br>
                                <div class="field">
                                    <input type="number" class="form-control" name="Precio" id="Precio" placeholder="Precio" required/>
                                </div>
                                <br>
                                <div class="field">
                                    <input type="number" class="form-control" name="Cantidad" id="Cantidad" placeholder="Cantidad" required/>
                                </div>
                                <br>
                                 <div class="field">
                                      <p>Imagen</p><input type="file" class="form-control" name="imagen" id="imagen"/>
                                </div>
                                <br>
                                <div class="field">
                                    <select type="text" class="form-control" name="Tipo_archivo" id="Tipo_archivo" placeholder="Tipo_archivo" required>
                                        <?php 
                                            while ($data = mysqli_fetch_array($consulta)){
                                            ?>
                                            <option><?php echo $data['Descripcion'] ?></option>
                                            <?php
                                              }  
                                            ?>
                                    </select>
                                </div>
                                <br>
                                <div class="field">
                                    <select type="text" class="form-control" name="Ubicacion" id="Ubicacion" placeholder="Ubicación" required>
                                        <?php 
                                            while ($data = mysqli_fetch_array($consulta2)){
                                            ?>
                                            <option><?php echo $data['Nombre_biblioteca'] ?></option>
                                            <?php
                                              }  
                                            ?>
                                    </select>
                                    </div>
                                <br>
                                <div class="field">
                                    <select type="text" class="form-control" name="Clasificacion" id="Clasificacion" placeholder="Clasificación" required>
                                        <?php 
                                            while ($data = mysqli_fetch_array($consulta3)){
                                            ?>
                                            <option><?php echo $data['Clasificacion'] ?></option>
                                            <?php
                                              }  
                                            ?>
                                    </select>
                                    </div> 
                                <br>
                                <div class="field">
                                    <select type="text" class="form-control" name="Region" id="Region" placeholder="Región" required>
                                           <?php 
                                            while ($data = mysqli_fetch_array($consulta4)){
                                            ?>
                                            <option><?php echo $data['Dowi'] ?></option>
                                            <?php
                                              }  
                                            ?>
                                    </select>
                                    </div> 
                                <br>
                                     <br>
                                      

                                    <div class="text-center">

                                        <input type="submit" class="btn btn-dark btn-xl js-scroll-trigger sr-button" value="Registrar"/>
                                        <hr>
                                    </div>

                            </div>
                        </form>
                </section>            
  
</div>
                              <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" >Codigo en uso</h4>
        </div>
          <div class="modal-body">
          <p>Al parecer el código que ud digite lo posee otro libro, por favor verifique</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>   
    



                </div>
            </div>
        </div>
    </section>

<!-- Scripts -->
<!-- Bootstrap core JavaScript -->

<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="../vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Custom scripts for this template -->
<script src="../js/creative.min.js"></script>
    <script>
        $(document).ready(function(){
             $("#myModal").modal();
        });
    </script>

	</body>
</html>
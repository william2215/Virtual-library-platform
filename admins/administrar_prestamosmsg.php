<?php
    require("php/conexion.php");
    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_name);
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
	<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

	<!-- Plugin CSS -->
	<link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="../css/creative.min3.css" rel="stylesheet">

</head>
<style type="text/css">
#about{
	height: 900px;
}
</style>
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
						<a class="nav-link js-scroll-trigger" href="index_admin.php">Registrar Libro</a>
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
							<br>
							<strong>Administrar</strong>

						</h1>
						<hr>
					</div>          
<p class="text-center">Bienvenido Administrador a continucacion se le mostrara una tabla en la cual se mostraran los prestamos vigentes</p>
					<section>	
		<div class="table-responsive">
            <form name="form1" method="post" action="info_prestamo.php">
            <input type="text" placeholder="Filtrar prestamo por id" name="filtro">
            <input class="btn btn-primary btn-xl js-scroll-trigger" style="position:absolute; left: 250px; top: 285px; width: 120px; height:50px; float-right" type="submit" value="Buscar">
            <br>    
            <br>
		<table border="0" class="table table-light table-xl">
			<tr>
				<td align="center">Id prestamo</td>
				<td align="center">Fecha de retiro</td>
                <td align="center">Fecha de devolución</td>
                <td align="center">Carnet del Alumno</td>
                <td align="center">Codigo del libro</td>
                <td align="center" colspan="2">Operaciones</td>
			</tr>
      
            <?php
            mysqli_set_charset($conexion, 'utf8');
                $consulta = "SELECT * from prestamo";
                $resultados = mysqli_query($conexion, $consulta);
            
                while($mostrar = mysqli_fetch_array($resultados)){
                    
            ?>
			<tr>
                <td align="center"><?php echo $mostrar['idPrestamo'] ?></td>
				<td align="center"><?php echo $mostrar['Fecha_retiro'] ?></td>
				<td align="center"><?php echo $mostrar['Fecha_devolucion'] ?></td>
				<td align="center"><?php echo $mostrar['Carnet'] ?></td>
                <td align="center"><?php echo $mostrar['Codigo'] ?></td>
                <td align="center"><a href="php/finalizar_prestamo.php?id=<?php echo $mostrar['idPrestamo']; ?>id_libro=<?php echo $mostrar['Codigo'];?>"> Libro Regresado </a></td>
			</tr>
            <?php
                }
            ?>
		</table>
	</div>
					</section>

			</div>
		</div>
	</div>
</section>


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Prestamo eliminado</h4>
        </div>
        <div class="modal-body">
          <p>Click en el boton para cerrar</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>




<!-- Footer -->
<footer id="footer">


</footer>

<!-- Copyright -->
<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="../vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="../js/creative.min.js"></script>
    <script>
        $(document).ready(function(){
             $("#myModal").modal();
        });
    </script>

</body>
</html>
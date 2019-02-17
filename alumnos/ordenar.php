<?php 
    require('php/conexion.php');
    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_name);
    mysqli_set_charset($conexion, 'utf8');
    
    //obtiene el orden en que se mostrará la tabla
    $order = $_POST['order'];

    if($order == "Codigo"){
        $consulta = "SELECT * FROM catalogo order by Codigo ASC LIMIT 20";
    } else
        if($order == "Más solicitados"){
            $consulta = "SELECT * FROM catalogo order by Pedidos DESC LIMIT 20";
        } else
            if($order == "Género"){
                $consulta = "SELECT * FROM catalogo order by Clasificacion ASC LIMIT 20";
            } else 
                if($order == "Alfabeticamente"){
                    $consulta = "SELECT * FROM catalogo ORDER BY Nombre_articulo ASC LIMIT 20";
                }
    


?>
<html>
	<head>
		<title>Catalogo</title>
		<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
        
        <!-- Bootstrap core CSS -->
	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template -->
	<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

	<!-- Plugin CSS -->
	<link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="../css/creative.min2.css" rel="stylesheet">
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
						<a class="nav-link js-scroll-trigger" href="Catalogo.php">Catalogo</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="Prestamo_realizados.php">Prestamos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="autocompletado/index.php">Buscador</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="php/log_out.php">Salir</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
                
            
                
                
				<!-- Main -->
	<section class="bg-light" id="about">
       
		<div class="container text-dark">
			<div class="row">
				<div class="col-lg-8 col-xl-12">
					<div class="col-lg-10 col-xl-12 mx-auto">
						<h1 class="text-uppercase text-dark text-center">
							<br>
							<strong>Catalogo de libros</strong>
						</h1>
						<hr>
					</div>          
    <form action="ordenar.php" method="post">
        <h5>Ordenar por:</h5>
     <select name="order" onchange="this.form.submit()" value="Ordenar por">
         <option>Codigo</option>
         <option>Más solicitados</option>
         <option>Género</option>
         <option>Alfabeticamente</option>
        </select>
        </form>
					<section>	
		<div class="table-responsive">
            
		<table border="0" class="table table-light table-xl">
			<tr>
				<td align="center">Codigo</td>
                <td align="center">Autor</td>
                <td align="center">Nombre</td>
                <td align="center">Clasificacion</td>
                <td align="center">Cantidad</td>
                <td align="center">Modelo</td>
                <td align="center">Foto</td>
                <td align="center" colspan="2">Operaciones</td>
			</tr>
            
            <?php
                $resultados = mysqli_query($conexion, $consulta);
            
                while($mostrar = mysqli_fetch_array($resultados)){
                    
            ?>
			<tr>
				<td align="center"><?php echo $mostrar['Codigo'] ?></td>
                <td align="center"><?php echo $mostrar['Autor'] ?></td>
				<td align="center"><?php echo $mostrar['Nombre_articulo'] ?></td>
				<td align="center"><?php echo $mostrar['Clasificacion'] ?></td>
                <td align="center"><?php echo $mostrar['Cantidad'] ?></td>
				<td align="center"><?php echo $mostrar['Modelo'] ?></td>
				<td align="center"><?php echo '<img src="../admins/php/'.$mostrar['Imagen'].'" width="100">'?></td>
                <td align="center"><a href="Prestamo.php?id=<?php echo $mostrar['Codigo']; ?>"> Solicitar </a></td>
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
                
<!-- Footer -->
<footer id="footer">


</footer>
		<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="../vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Custom scripts for this template -->
<script src="../js/creative.min.js"></script>
	</body>
</html>
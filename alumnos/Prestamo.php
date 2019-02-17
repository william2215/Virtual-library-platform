<html>
	<head>
		<title>Fecha de los Prestamos</title>
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
            

    <?php
    session_start(); //inicia la sesion en la pagina. debe estar en cada uno de los php
    //date_default_timezone_set('America/Costa_Rica'); consigue la zona horaria de la zona 
    $Fecha_retiro = date ("Y-m-d"); //formato en que obtendra la fecha y hora
    $Fecha_devolucion = date("Y-m-d", strtotime($Fecha_retiro.'+ 2 week'));//operacion para sumar 2 semanas a la fecha de retiro
    $Carnet = $_SESSION['user'];//obtiene la cockie almacenada y la iguala a la variable $Carnet.
    $id = $_REQUEST['id'];
    $_SESSION['id_libro'] = $id;
    ?>
        
	<!-- Main -->
	<section class="bg-light" id="about">

		<div class="container text-dark">
			<div class="row">
				<div class="col-lg-8 col-xl-12">
					<div class="col-lg-10 col-xl-12 mx-auto">
						<h1 class="text-uppercase text-dark text-center">
							<br>
							<strong>Fechas del Prestamo</strong>
						</h1>
						<hr>
					</div>          

					<section>	
       
		<div class="table-responsive">
        <form method="post" action="php/form_prestamo.php">

		<table border="0" class="table table-light table-xl">
			<tr>
                <form action="prestamo2.php" method="post">
				<td align="center">Fecha Retiro</td>
				<td align="center"><input type="text" name="Fecha_retiro" onchange="this.form.submit()" data-date-format="yyyy-mm-dd" id="datepicker" value="<?= $Fecha_retiro ?>"></td>
                </form>
			</tr>
			<tr>
                
				<td align="center">Fecha Devolucion</td>

				<td align="center">La fecha de devolución de su libro sera la siguiente: <br> <br><input type="text" name="Fecha_devolucion" value="<?= $Fecha_devolucion ?>"></td>
                <input type="hidden" name="idCarnet" id="idCarnet" value="<?= $Carnet?>">
            </tr>

			<tr>
				<td align="center"><input type="submit" name="enviar" id="enviar" value="Enviar" class="btn btn-default"></td>
                <td align="center"><input type="button" onclick="location='Catalogo.php'" value="Cancelar" class="btn btn-default"> </td>
			</tr>
		</table>
	</form>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style type="text/css">
        // solution 1:
        .datepicker {
            font-size: 0.875em;
        }
        /* solution 2: the original datepicker use 20px so replace with the following:*/
        
        .datepicker td, .datepicker th {
            width: 1.5em;
            height: 1.5em;
        }
        
    </style>
<script type="text/javascript">
    $('#datepicker').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
    });
 
</script>



<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="../vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Custom scripts for this template -->
<script src="../js/creative.min.js"></script>

	</body>
</html>
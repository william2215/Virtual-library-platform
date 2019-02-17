<!DOCTYPE html>
<html>
<head>
	<title>Autocompletar con php y mysql utilizando bootstrap</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="../../assets/css/main.css" />
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="statics/js/functions.js"></script>
</head>
<body class="is-preload">
	<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<a href="../../index_principal.html" class="logo">Valdocco</a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
                            <li><a href="../index_alumno.html">Inicio</a></li>
							<li><a href="../catalogo.php">Catalogo</a></li>
                            <li><a href="../Prestamo_realizados.php">Prestamos</a></li>
                            <li class="active"><a href="index.php">Buscador</a></li>
                            <li style="position: relative; left: 520px;"><a href= ../php/log_out.php>Salir</a></li>
						</ul>
						<!-- <ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                        </ul> -->
					</nav> 


	<div class="container">
		<div class="row-fluid">
		<br>
		<?php if (isset($_GET["id"])){
		$filtro=$_GET["id"];
		}else{
		$filtro=0;
		 ?>
			<div class="col-md-12 col-md-offset-2" id="buscador">
				<input type="search" name="autocomplete" class="form-control" placeholder="Search" />
			</div>
			<div class="col-md-8 col-md-offset-2" id="busqueda">
				
			</div>
		<?php } ?>
		</div>
	</div>	
		<form method="post" action="php/form_alumno.php">
<div class="container-fluid">

		<table border="0" class="table table-hover table-light">
			<tr>
				<td align="center">Id prestamo</td>
				<td align="center">Fecha de retiro</td>
                <td align="center">Fecha de devolución</td>
                <td align="center">Carnet del Alumno</td>
                <td align="center">Codigo del libro</td>
                <td align="center" colspan="2">Operaciones</td>
			</tr>
      
            
            <?php
            require('conexion.php');
            $conexion = $conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_name);
            mysqli_set_charset($conexion, 'utf8');
                $consulta = "SELECT * from prestamo where idPrestamo='$filtro'";
                $resultados = mysqli_query($conexion, $consulta);
            
                while($mostrar = mysqli_fetch_array($resultados)){
                    
            ?>
	
</div>

           <tr>
				<td align="center"><?php echo $mostrar['idPrestamo'] ?></td>
				<td align="center"><?php echo $mostrar['Fecha_retiro'] ?></td>
				<td align="center"><?php echo $mostrar['Fecha_devolucion'] ?></td>
				<td align="center"><?php echo $mostrar['Carnet'] ?></td>
                <td align="center"><?php echo $mostrar['Codigo'] ?></td>
                <td align="center"><a href="../php/finalizar_prestamo.php?id=<?php echo $mostrar['idPrestamo']; ?>id_libro=<?php echo $mostrar['Codigo'];?>"> Libro Regresado </a></td>
			</tr>
            <?php
                }
            ?>
        </table>
            </div>

	</form>
					<div id="copyright">
						<ul><li>&copy; Valdocco</li><li>Design: <a>William Aguilar, Jeremy Guillén, Karen Hidalgo</a></li></ul>
					</div>

			</div>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
            <script src="../jquery/scroll.js"></script>
			<script src="../assets/js/jquery.scrollex.min.js"></script>
			<script src="../assets/js/jquery.scrolly.min.js"></script>
			<script src="../assets/js/browser.min.js"></script>
			<script src="../assets/js/breakpoints.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>


</html>
	</body>
</body>
</html>
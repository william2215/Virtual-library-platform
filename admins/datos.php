
<html>
	<head>
		<title>Valdocco</title>
		<meta charset="utf-8" />
        <style type="text/css">
            #chart-continer {
                width: 640px;
                height: auto;
            }
        </style>
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<noscript><link rel="stylesheet" href="../assets/css/noscript.css"/></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper" class="fade-in">

				<!-- Intro -->
					<div id="intro">
						<h1>Valdocco</h1>
						<p>Bienvenido/a administrador/a, a continuación podrá ver el estado actual de la biblioteca.</p>
						<ul class="actions">
							<li><a href="#header" class="button icon solo fa-arrow-down scrolly">Continue</a></li>
						</ul>
					</div>

				<!-- Header -->
					<header id="header">
						<a href="../index_principal.html" class="logo">Valdocco</a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li><a href="formulario_admin.html">Registro</a></li>
							<li><a href="administrar_prestamos.php">Pedidos</a></li>
                            <li><a href="formulario_clasificaci%C3%B3n.html">Opciones</a></li>
                            <li class="active"><a href="datos.html">Datos</a></li>
                        </ul>
					</nav>

				<!-- Main -->
					<div id="main">
                        
                 <div id="chart-container">
                <canvas id="mycanvas"></canvas>
                </div>

						
					</div>
				<!-- Footer -->
					<footer id="footer">
						
                       
					</footer>

				<!-- Copyright -->
					<div id="copyright">
						<ul><li>&copy; Valdocco</li><li><ul class="icons alt">
									<li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
								</ul>
                            </li>
                        </ul>
					</div>

			</div> 
<!--Numero de inscripción	
Asignatura	
Autor	
Nombre_articulo	
Procedencia	
Clasificacion	
Numero_serie	
Modelo	
Precio	
Cantidad	
Tipo de archivo	
Ubicacion -->
		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.scrollex.min.js"></script>
			<script src="../assets/js/jquery.scrolly.min.js"></script>
			<script src="../assets/js/browser.min.js"></script>
			<script src="../assets/js/breakpoints.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>
         <script type="text/javascript" src="js/Chart.min.js"></script>
         <script type="text/javascript" src="js/jquery.min.js"></script>
            <script type="text/javascript" src="js/grafico.js"></script>

	</body>
</html>
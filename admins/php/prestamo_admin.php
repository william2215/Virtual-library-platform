<html>
<head>
<meta charset="utf-8">
	<title>Sign Up</title>
</head>
<body>
    <?php
    session_start(); //inicia la sesion en la pagina. debe estar en cada uno de los php
    //date_default_timezone_set('America/Costa_Rica'); consigue la zona horaria de la zona 
    $Fecha_retiro = date ("Y-m-d"); //formato en que obtendra la fecha y hora
    $Fecha_devolucion = date("Y-m.d", strtotime($Fecha_retiro.'+ 2 week'));//operacion para sumar 2 semanas a la fecha de retiro
    $Cedula = $_SESSION['user'];//obtiene la cockie almacenada y la iguala a la variable $Carnet.
    ?>
	<h1 align="center">Prestamo</h1>
	<form method="post" action="php/form_prestamo.php">
		<table border="0" align="center">
			<tr>
				<td>Fecha Retiro</td>
				<td><input type="text" name="Fecha_retiro" id="Fecha_retiro" value="<?= $Fecha_retiro ?>"></td>
			</tr>
			<tr>
				<td>Fecha Devolucion</td>
				<td><input type="text" name="Fecha_devolucion" id="Fecha_devolucion" value="<?= $Fecha_devolucion ?>"></td>
                <input type="hidden" name="idCedula" id="idCedula" value="<?= $Cedula?>">
            </tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center"><input type="submit" name="enviar" id="enviar" value="Enviar"></td>
				<td align="center"><input type="reset" name="Borrar" id="Borrar" value="Borrar"></td>
			</tr>
		</table>
	</form>
	<br>
</body>
</html>
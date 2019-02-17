<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="bombo.css">
	<title>Documento</title>
    <script src="jquery/jquery-3.2.1.min.js"></script>
</head>
<body>
	<h1>Registro de Artículos</h1>
    <div id="container">
        <div id="resulta">
        
        </div>
    </div>
	<form name="form1" method="post" action="php/registrar.php">
		<table border="0" align="center">
			<tr>
				<td>Numero de inscripción</td>
				<td><input type="text" name="Codigo" id="Codigo"></td>
			</tr>
			<tr>
				<td>Asignatura</td>
				<td><input type="text" name="Asignatura" id="Asignatura"></td>
			</tr>
			<tr>
				<td>Autor</td>
				<td><input type="text" name="Autor" id="Autor"></td>
			</tr>
			<tr>
				<td>Nombre_articulo</td>
				<td><input type="text" name="Nombre_articulo" id="Nombre_articulo"></td>
			</tr>
            <tr>
				<td>Procedencia</td>
				<td><input type="text" name="Procedencia" id="Procedencia"></td>
			</tr>
               <tr>
				<td>Numero_serie</td>
				<td><input type="number" name="Numero_serie" id="Numero_serie"></td>
			</tr>
                 <tr>
				<td>Modelo</td>
				<td><input type="text" name="Modelo" id="Modelo"></td>
			</tr>
                 <tr>
				<td>Precio</td>
				<td><input type="text" name="Precio" id="Precio"></td>
			</tr>
            <tr>
				<td>Cantidad</td>
				<td><input type="text" name="Cantidad" id="Cantidad"></td>
            </tr>
            <tr>
                <td>Tipo de archivo</td>
                <td><select type="text" name="Tipo_archivo" id="Tipo_archivo">
                    <option>Libro</option>
                    <option>Revista</option>
                    <option>Articulo de periódico</option>
                    <option>PDF</option>
                    </select></td>
            </tr>
            <tr>
                <td>Ubicacion</td>
                <td><select type="text" name="Ubicacion" id="Ubicacion">
                    <option>Colegio Técnico Don Bosco</option>
                    <option>Escuela San Juan Bosco</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Clasificación</td>
                <td><select type="text" name="Clasificacion">
                    <option>Drama</option>
                    <option>Terror</option>
                    <option>Romance</option>
                    <option>Tragedia</option>
                    </select>
                </td>
            </tr>
            <tr>
            <td>Región</td>
            <td><select type="text" name="Region" id="Region">
                <option>Inglesa</option>
                <option>Anglosajona</option>
                <option>Costarricense</option>
                <option>Hispana</option>
                <option>Española</option>
                </select>
            </td>
            </tr>
                
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center"><input type="submit" name="enviar" id="enviar"></td>
				<td align="center"><input type="reset" name="borrar" id="borrar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
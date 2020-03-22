<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<style>

h1{
	text-align:center;
	color:#00F;
	border-bottom:dotted #0000FF;
	width:50%;
	margin:auto;
	
	
}

table{
	border:1px solid #F00;
	padding:20px 50px;
	margin-top:50px;
}

body{
	background-color:#FFC;
}


</style>
</head>

<body>
<h1>Registro de Paises</h1>
<form name="form1" method="get" action="Insertar_Registros.php">
  <table border="0" align="center">
    <tr>
      <td>Codigo</td>
      <td><label for="codigo"></label>
      <input type="text" name="codigo" id="codigo"></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="nombre"></label>
      <input type="text" name="nombre" id="nombre"></td>
    </tr>
    <tr>
      <td>Continente</td>
      <td><label for="continente"></label>
      <input type="text" name="continente" id="continente"></td>
    </tr>
    <tr>
      <td>Region</td>
      <td><label for="region"></label>
      <input type="text" name="region" id="region"></td>
    </tr>
    <tr>
      <td>Superficie</td>
      <td><label for="superficie"></label>
      <input type="text" name="superficie" id="superficie"></td>
    </tr>
    <tr>
      <td>Poblacion</td>
      <td><label for="poblacion"></label>
      <input type="text" name="poblacion" id="poblacion"></td>
    </tr>
    
      
    <tr>
      <td>&nbsp;</td>a
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><input type="submit" name="enviar" id="enviar" value="Enviar"></td>
      <td align="center"><input type="reset" name="Borrar" id="Borrar" value="Borrar"></td>
    </tr>
  </table>
</form>
</body>
</html>
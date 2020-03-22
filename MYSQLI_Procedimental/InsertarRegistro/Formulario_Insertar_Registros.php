<!doctype html>
<html>
    
    <head>
    
        <meta charset="utf-8">
        <title>Documento sin título</title>
        <style>
			table{
				background-color:#FFC;
				border:1px solid #FF0000;
				margin:auto;
				padding:25px;
			}
		h1{
			width:50%;
			margin:25px auto;
			
			text-align:center;
			margin-bottom:50px;
		}
		
		body{
			background-color:#FC9;
		}
		
		#boton{
			padding-top:25px;
			
		}
		
		</style>
    </head>
    
    <body>
    <h1>Nuevos Paises</h1>
    
        <form action="resultados_insertar_registros.php" method="get">
        <table>
        <tr><td>
            <label>Code:</label></td><td> <input type="text" name="Code"></td></tr>
            <tr><td><label>Name:</label></td><td><input type="text" name="Name"></td></tr>
          <tr><td>  <label>Continent:</label> </td><td><input type="text" name="Continent"></td></tr>
          <tr><td>  <label>Region: </label></td><td><input type="text" name="Region"></td></tr>
           <tr><td> <label>Population: </label></td><td><input type="text" name="Population"></td></tr>
          <tr><td colspan="2" align="center" id="boton">  <input type="submit" name="enviado" value="Siguiente"></td></tr>
        </table>
        </form>
    
    </body>
    
</html>
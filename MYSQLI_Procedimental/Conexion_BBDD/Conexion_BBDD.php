<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
    </head>
    <body>
    	<?php
    		//Llenaremos lo fundamental para que la base de datos funcione
    		$db_host="localhost";
    		$db_nombre="db_pildoras";
    		$db_usuario="root";
    		$db_password="";

    		//Procedimientos para llamar a la base de datos
    		$conexion=mysqli_connect($db_host,$db_usuario,$db_password,$db_nombre);

    		//Generaremos una consulta a la base de datos
    		$query="select * from datospersonales";

    		$resultados=mysqli_query($conexion,$query);//Especie de tabla virtual donde cargamos toda la info de la secuencia sql

			//Visualizamos el contenido de la tabla virtual creada $resultados

			$fila=mysqli_fetch_row($resultados);//Es un array

			//Imprimimos lo que queramos en $fila
			echo $fila[0];

			echo $fila[1];

			echo $fila[2];



    	?>
                                
    

    
    </body>
</html>
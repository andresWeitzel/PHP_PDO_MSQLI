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
			$conexion=mysqli_connect($db_host,$db_usuario,$db_password);
			
			//Sacamos el $db_nombre de la llamada anterior de la base de datos y especificamos en caso de que no haya coexion a la misma
			mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD porque no tenemos el  nombre de la misma");
            
            //En caso de que la base de datos no conecte 
            if(mysqli_connect_errno()){
				echo"<br>-----------------------------------";
				echo "<br>Fallo al conectar la base de datos";
				echo"<br>-----------------------------------";
                exit();
            }

    		//Generaremos una consulta a la base de datos
    		$query="select * from datospersonales";

    		$resultados=mysqli_query($conexion,$query);//Especie de tabla virtual donde cargamos toda la info de la secuencia sql

			// con el while ejecutamos las tablas mientras haya informacion
			//En cuanto en la tabla  no existan los registros se equipara a false entonces sale del while.
			
			while(($fila=mysqli_fetch_row($resultados))==true){
			
			echo $fila[0] . "";

			echo $fila[1] . "";

			echo $fila[2] . "";

			echo $fila[3] . "";

			echo "<br>";

			}

			//Para optimizzar recursos cerramos la conexion a la ddbb una vez usada la misma

			mysqli_close($conexion);

			


    	?>
                                
    

    
    </body>
</html>
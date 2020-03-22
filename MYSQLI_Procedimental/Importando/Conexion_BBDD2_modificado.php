<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        
        <style>
                table{
                    
                    width:80%;
                    border:1px dotted #ff0000;
                    margin:auto;
                    align:center;
                }
        </style>
    </head>
    <body>
    	<?php
        
            //Aca le diremos los datos de la conexion de la BBDD estan en el archivo Datos_Conexion.php
            require("Datos_Conexion.php");

            //  Conectamos la BBDD
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

    		//Generaremos una consulta a la base de datos y añadimos un filtro(WHERE) para la especificidad de lo requerido
    		$query="select * from country where Name='Australia'";

    		$resultados=mysqli_query($conexion,$query);//Especie de tabla virtual donde cargamos toda la info de la secuencia sql

			// con el while ejecutamos las tablas mientras haya informacion
			//En cuanto en la tabla  no existan los registros se equipara a false entonces sale del while.
			
			/*while(($fila=mysqli_fetch_row($resultados))==true){
                
                echo"<table><tr><td>";//Le damos un estilo a la tabla creada para los campos
			
			echo $fila[0] . "</td><td>";

			echo $fila[1] . "</td><td>";

			echo $fila[2] . "</td><td>";

			echo $fila[3] . "</td></tr></table>";

            echo "<br>";
            echo "<br>";

            }*/
            
            //Crearemos un ARRAY ASOCIATIVO para visualizar los diferentes campos de la BBDD
            //En el  segundo parametro(,MYSQL_ASSOC) del siguiente array le indicamos el tipo de cone3xion del array 
            define('MYSQL_ASSOC',1);//El editor nos pide definir la constante
            while($fila=mysqli_fetch_array($resultados, MYSQL_ASSOC)){
               
                echo"<table><tr><td>";//Le damos un estilo a la tabla creada para los campos
			
                echo "--Code: ".$fila['Code'] . "</td><td>";
    
                echo "--Name: ".$fila['Name'] . "</td><td>";

                echo "--Continent: ".$fila['Continent'] . "</td><td>";

                echo "--Population: ".$fila['Population'] . "</td><td>";

                echo "--Capital: ".$fila['Capital'] . "</td><td>";
    
                echo "--Code2: ".$fila['Code2'] . "</td></tr></table>";
    
                echo "<br>";
                echo "<br>";
    

            }

			//Para optimizzar recursos cerramos la conexion a la ddbb una vez usada la misma

			mysqli_close($conexion);

			


    	?>
                                
    

    
    </body>
</html>
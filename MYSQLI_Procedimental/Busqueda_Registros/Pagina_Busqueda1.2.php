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
        
                        
            require("Datos_Conexion.php");

            
            $conexion=mysqli_connect($db_host,$db_usuario,$db_password);


			
			mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD porque no tenemos el  nombre de la misma");
            
            
            if(mysqli_connect_errno()){
                
				echo"<br>-----------------------------------";
				echo "<br>Fallo al conectar la base de datos";
				echo"<br>-----------------------------------";
                exit();
            }

    		//la variable busqueda almacena lo que el usuario digite
    		$query="select * from country where Name LIKE '%$labusqueda%'";//El caracter % lo utilizamos para decirle al programa que puede existir algo parecido o diferente delante Y despues de la palabra del usuario y asi no hacerlo tan Wespecifico. El LIKE lo usamos para indicar la no especificidad de la palabrra y si de los caracteres

    		$resultados=mysqli_query($conexion,$query);

			
            
            
            define('MYSQL_ASSOC',1);
            while($fila=mysqli_fetch_array($resultados, MYSQL_ASSOC)){
               
                echo"<table><tr><td>";
			
                echo "--Code: ".$fila['Code'] . "</td><td>";
    
                echo "--Name: ".$fila['Name'] . "</td><td>";

                echo "--Continent: ".$fila['Continent'] . "</td><td>";

                echo "--Population: ".$fila['Population'] . "</td><td>";

                echo "--Capital: ".$fila['Capital'] . "</td><td>";
    
                echo "--Code2: ".$fila['Code2'] . "</td></tr></table>";
    
                echo "<br>";
                echo "<br>";
    

            }

        

			mysqli_close($conexion);
        
        
        


    	?>


    
    </body>
</html>
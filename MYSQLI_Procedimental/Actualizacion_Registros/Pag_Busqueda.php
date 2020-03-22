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
        
            //Almacenamos en la siguiente variable lo que introduzca el ususario en lacasilla de busqueda de Formulario.php con su atributo "buscar" de la otra pagina FormActualiz.php-->(<label> <input type="text" name="buscar"> </label>)
            $busqueda=$_GET["buscar"];
                    
            require("Base_Conexion.php");

            
            $conexion=mysqli_connect($db_host,$db_usuario,$db_password);


			
			mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD porque no tenemos el  nombre de la misma");
            
            
            if(mysqli_connect_errno()){
                
				echo"<br>-----------------------------------";
				echo "<br>Fallo al conectar la base de datos";
				echo"<br>-----------------------------------";
                exit();
            }

    		//la variable busqueda almacena lo que el usuario digite
    		$query="select * from country where Name LIKE '%$busqueda%'";//El caracter % lo utilizamos para decirle al programa que puede existir algo parecido o diferente delante Y despues de la palabra del usuario y asi no hacerlo tan Wespecifico. El LIKE lo usamos para indicar la no especificidad de la palabrra y si de los caracteres

    		$resultados=mysqli_query($conexion,$query);

			
            
            
            define('MYSQL_ASSOC',1);
            while($fila=mysqli_fetch_array($resultados, MYSQL_ASSOC)){
               
                //Crearemos un formulario para la modificacion de campos en la base de datos
                
                //Cabezera de un formulario
                //echo "<form action='FormBusqueda.php' method='get'>";
                echo "<form action='Pag_Actualizar.php' method='get'>";
                //Primer cuadro de texto que almacenara el codigo de cada country UTILIZANDO un array asociativo ($fila),ATENCION CON COMILLAS
                echo "<input type='text' name='Code' value='". $fila['Code'] ."'><br>";//
                echo "<input type='text' name='Name' value='". $fila['Name'] ."'><br>";
                echo "<input type='text' name='Continent' value='". $fila['Continent'] ."'><br>";
                echo "<input type='text' name='Population' value='". $fila['Population'] ."'><br>";
                echo "<input type='text' name='Capital' value='". $fila['Capital'] ."'><br>";
                echo "<input type='text' name='Code2' value='". $fila['Code2'] ."'><br>";
                //Construimos el boton de envio
                echo "<input type='submit' name='enviar' value='Actualizar'>";
                echo "</form>";
                echo "<br>";
                echo "<br>";
    

            }

        

            mysqli_close($conexion);
            
        
        
        
        


    	?>


    
    </body>
</html>
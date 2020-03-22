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
  
    
        <?php
        //Anexaremos todo el codigo en una carpeta
           function busqueda2($labusqueda){
                        
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
    		$query="select * from country where Name LIKE '%$labusqueda%'";//El caracter % lo utilizamos para decirle al programa que puede existir algo parecido o diferente delante Y despues de la palabra del usuario y asi no hacerlo tan especifico. El LIKE lo usamos para indicar la no especificidad de la palabrra y si de los caracteres

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
        
        }//Cierre de llave de la funcion busqueda2
        


    	?>
                                
    </head>
    <body>

    <?php
        $mibusqueda=$_GET["buscar"];//  Esta variable nos servira para mas adelante llamar a la funcion busqueda2
        $mipagina=$_SERVER["PHP_SELF"];//Le indicamos cual sera la pagina del servidor a la cual debera llamar["PHP_SELF"]-->INDICA QUE LLAMARA A SU MISMA PAGINA.

        /*--------------------------
        ¡LEEER!-->Con el siguiente  if logramos que al cargar la pagina compare $mibusqueda a NULL y pase al ELSE(ocurre ya que el metodo $GET["buscar"] sera vacio ya que no estaba cargado el buscador previamente porque esta al final del programa.), al pasar al ELSE carga el formularrio a la pagina y se producira la peticion, el programa lee nuevamente el codigo y ya la variable $mibusqueda sera diferente a NULL($mibusqueda!=NULL), entonces se ejecutará la funcion busqueda2( function busqueda2($labusqueda){}) y mandara las peticiones correspondientes a la BBDD y esta respondera con lo que le pedidamos :)
            ---------------------------  */

        if($mibusqueda!=NULL){//En teoria como local host salta error siempre
            busqueda2($mibusqueda);
        }else{
            echo(" <form action='".$mipagina."' method='get'>
            <label>Buscar: <input type='text' name='buscar'></label>
                             <input type='submit' name='enviando' value='Enviar'>
                             <label>(Coloque el nombre de un pais con la inicial en mayuscula(En Inglés))</label>
  
        </form>
        ");
        }
    
    
    ?>
   
        




    </body>

    
    </body>
</html>
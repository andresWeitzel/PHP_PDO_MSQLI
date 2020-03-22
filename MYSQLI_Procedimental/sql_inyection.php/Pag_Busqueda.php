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
         
            require("Base_Conexion.php");

            
            $conexion=mysqli_connect($db_host,$db_usuario,$db_password);

            //====Vulnerable a sql inyection====
           // $name=$_GET["name"];
            //$code=$_GET["code"];

            //====Seguro a sql inyection===
            $name=mysqli_real_escape_string($conexion, $_GET["name"]);//No admite caracteres extraños en el buscador de consultas
            $code=mysqli_real_escape_string($conexion, $_GET["code"]);
           
			
			mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD porque no tenemos el  nombre de la misma");
            
            
            if(mysqli_connect_errno()){
                
				echo"<br>-----------------------------------";
				echo "<br>Fallo al conectar la base de datos";
				echo"<br>-----------------------------------";
                exit();
            }

    		//la variable busqueda almacena lo que el usuario digite
             //El caracter % lo utilizamos para decirle al programa que puede existir algo parecido o diferente delante Y despues de la palabra del usuario y asi no hacerlo tan Wespecifico. El LIKE lo usamos para indicar la no especificidad de la palabrra y si de los caracteres

             //$query="select * from country where Name LIKE '%$busqueda%'";
             $query="select * from country where Name='$name' and Code='$code'";

             echo "ESTA ES UNA CONSULTA SQL>>$query <br><br>";



            $resultados=mysqli_query($conexion,$query);
    
            define('MYSQL_ASSOC',1);
            while($fila=mysqli_fetch_array($resultados, MYSQL_ASSOC)){
               
                echo "========Bienvenido a $name =========<br><br>Datos Solicitados:<br>";

                echo"<table><td><td>";

                echo "|Codigo|: ".$fila['Code']."</td><td>";
                echo "|Nombre|: ".$fila['Name']."</td><td>";
                echo "|Continente|: ".$fila['Continent']."</td><td>";
                echo"|Capital|:".$fila['Capital']."</td><td>";
                echo "|Poblacion|: ".$fila['Population']."</td><td>";
                echo "|Region|: ".$fila['Region']."</td><td></tr></table>";
                

                echo"<br>";
                echo"<br>";

            }

        

            mysqli_close($conexion);
            
        
        
        
        


    	?>


    
    </body>
</html>
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
            //utilizaremos el get para tomar los datos que ingresara el usuario en esta pagina
            //Al get le paso como parametro el nombree del cuadro en el cual se ingresan los datos en esta pagina.
            $cod=$_GET["codigo"];
            $nom=$_GET["nombre"];
            $cont=$_GET["continente"];
            $reg=$_GET["region"];
            $sup=$_GET["superficie"];
            $pob=$_GET["poblacion"];
            //COMPROBAR LA CONEXION CON LOS NOMBRES CORRECTOS DE LA BBDD  

            

            require("Datos_Conexion.php");

            
            $conexion=mysqli_connect($db_host,$db_usuario,$db_password);


			
			mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD porque no tenemos el  nombre de la misma");
            
            
            if(mysqli_connect_errno()){
                
				echo"<br>-----------------------------------";
				echo "<br>Fallo al conectar la base de datos";
				echo"<br>-----------------------------------";
                exit();
            }

            $query="INSERT INTO country(Codigo,Nombre,Continente,Region,Superficie,Poblacion) values('$cod','$nom','$cont','$reg','$sup','$pob')";
            

            $resultados=mysqli_query($conexion,$query);
            
            //el siguiente if es para verificar si se se insertaron correctamente los registros que el usuario digito

            if($resultados==false){
                echo"ERROR EN LA CONSULTA<br>";
                echo"ERROR EN EL AGREGADO DE REGISTROS<br>";

            }else{
                echo"REGISTRO GUARDADO";
            }


			mysqli_close($conexion);
        
        
        


    	?>


    
    </body>
</html>
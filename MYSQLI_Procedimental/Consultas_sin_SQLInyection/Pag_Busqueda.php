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

            $Continent= $_GET["continent"];
         
            require("Base_Conexion.php");

            
            $conexion=mysqli_connect($db_host,$db_usuario,$db_password);

           
           
			
			mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD porque no tenemos el  nombre de la misma");
            
            
            if(mysqli_connect_errno()){
                
				echo"<br>-----------------------------------";
				echo "<br>Fallo al conectar la base de datos";
				echo"<br>-----------------------------------";
                exit();
            }

            //Secuencia SQL con su interrogante
            $sql="SELECT Code, Name, Continent, Region, Population FROM country where Continent=?";
            
            //Preparar la consulta utilizando la funcion myqsl_prepare() para que nos devuelva el objeto clave de todo este proceso
            $resultado=mysqli_prepare($conexion,$sql);
            
            //Unir los parametros que el usuario escribio en el cuadro a las sentencia sql
            //La siguiente funcion nos devuelve true or false en base a si tiene exito la consulta
            $ok=mysqli_stmt_bind_param($resultado,"s",$Continent);//El segundo paramtro indica que el argumento de la consulta sql es un string(en este caso Continent)
        
            //Escribimos lo que tenemos almacenado en $ok(True or False)
            $ok=mysqli_stmt_execute($resultado);
            //Comparamos si es False hace tal cosa y si es TRUE hace lo que queremos
            if ($ok==false){
                echo "Error al ejecutar la consulta";

            }else{

                //Mostramos los resultados
                //Crearemos las variables de los campos Continent,Code,Name,etc
                $ok=mysqli_stmt_bind_result($resultado, $Code, $Name, $Continent, $Region, $Population);

                //Leer la consulta,los valores 
                echo "Informacion de los Continentes encontrados: <br><br>";

                //Para recorrer los resultados
                while(mysqli_stmt_fetch($resultado)){
                    echo "|Code: ".$Code." |Name: ".$Name." |Continent: ".$Continent." |Region:  ".$Region." |Population: ".$Population."<br><br>";
                }
                //Cerraremos el objeto que nos creo la funcion prepare
                mysqli_stmt_close($resultado);

            }
        
        
        
        
        ?>


    
    </body>
</html>
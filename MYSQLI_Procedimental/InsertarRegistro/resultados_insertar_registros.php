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

            $Code= $_GET["Code"];
            $Name= $_GET["Name"];
            $Continent= $_GET["Continent"];
            $Region= $_GET["Region"];
            $Population= $_GET["Population"];
         
            require("Base_Conexion.php");

            
            $conexion=mysqli_connect($db_host,$db_usuario,$db_password);

           
           
			
			mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD porque no tenemos el  nombre de la misma");
            
            
            if(mysqli_connect_errno()){
                
				echo"<br>-----------------------------------";
				echo "<br>Fallo al conectar la base de datos";
				echo"<br>-----------------------------------";
                exit();
            }

            //Sentencia SQL insert into,los values con ? indican que no sabemos el valor de los campos sino que dependemos de lo que digite el ususario
            $sql="INSERT INTO country(Code,Name,Continent,Region,Population) VALUES(?,?,?,?,?)";
            
            //Preparar la consulta utilizando la funcion myqsl_prepare() para que nos devuelva el objeto clave de todo este proceso
            $resultado=mysqli_prepare($conexion,$sql);
            
            //Unir los parametros que el usuario escribio en el cuadro a las sentencia sql
            //La siguiente funcion nos devuelve true or false en base a si tiene exito la consulta
            $ok=mysqli_stmt_bind_param($resultado,"bbbbi",$Code,$Name,$Continent,$Region,$Population);//El segundo paramtro indica que tipos de datos son las variables que coloco respectivamente sin comas ni espacio-->"s"=String,"i"=Int
        
            //Escribimos lo que tenemos almacenado en $ok(True or False)
            $ok=mysqli_stmt_execute($resultado);
            //Comparamos si es False hace tal cosa y si es TRUE hace lo que queremos
            if ($ok==false){
                echo "Error al ejecutar la consulta(Hay un problema con el tipo de datos de la funcion mysqli_stmt_bind_param)";

            }else{

               

                
                echo "Se ha agregado un nuevo registro a la base de datos <br><br>";

               

            }
        
        
        
        
        ?>


    
    </body>
</html>
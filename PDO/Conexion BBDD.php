<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        //El try(intenta),catch(captura el objeto del error) y finally(se ejecuta de todas formas, sirve para limpiar la memoria(ej)) lo utilizo para excepciones y legitimidad de codigo futuros(fallos de conexion,etc).
        try{

        $base=new PDO('mysql:host=localhost;dbname=db_pruebas2', 'root', '');
        echo '===Conexion Establecida===';
        
        }catch(Exception $e){

            die('Error: '.$e->getMessage());//Mata el Error y captura el mensaje del mismo


        }finally{
            
            $base=null;//Limpio Memoria
        }
        
        ?>
    
    </body>
</html>
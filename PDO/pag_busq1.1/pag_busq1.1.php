<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php
        //Buscamos el valor del formulario
        $formulario=$_GET["buscar"];
    try{

        $base=new PDO('mysql:host=localhost;dbname=db_pruebas2', 'root', '');
        
        //Expecificamos el tipo de caracteres por el metodo exec
        $base->exec("SET CHARACTER SET utf8");

        //Crearemos la consulta(instruccion SQL).
        $sql="SELECT Code, Name, Continent, Region, Population FROM country WHERE Code=?";
        
        //Para el objeto Statement(Sentencia)
        $resultado=$base->prepare($sql);//El objeto base llama al metodo prepare que recib epor parametro la instruccion sql y este metodo devuelve un objeto de tipo Statement
        
        //Ejecutar la Sentencia(Objeto Statement)
        $resultado->execute(array($formulario));

        //El bucle while va a recorrer registro a registro lo que tengamos dentro del PDO Statament //La funcion fetch nos devuelve la siguiente fila asociados a un conjunto de resultados
        //Con FETCH_ASSOC asociamos dentro del array(pdo statement), los campos con los nombres de la sentencia sql
        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){

            echo "|Code: ".  $registro['Code']. " |Name: ". $registro['Name']. " |Continent: ". $registro['Continent']. " |Region: ". $registro['Region']. " |Population: ". $registro['Population']. "<br>";


        }
        //Cerramos el cursor para no consumir tantos recursos en memoria 
        $resultado->closeCursor();

    }catch(Exception $e){
            //Mata el Error y captura el mensaje del mismo
            die('Error: '.$e->getMessage());


        }finally{
            
            $base=null;//Limpio Memoria
        }
    
    
    ?>
    </body>
</html>
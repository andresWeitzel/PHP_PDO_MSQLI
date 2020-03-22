<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php
        //Constructor de conexion a nuestra ddbb
        $conexion=new mysqli("localhost","root","","db_pruebas2");

        //En caso de error de conexion
        if($conexion->connect_errno){
            echo "Fallo de conexion ".$conexion->connect_errno;//Concatenamos con la variable para que en caso de que falle nos salda el error en concreto

        }

        $sql="SELECT * FROM country";//Variable para que nos muestre todos los campos de la tabla
        
        $resultados=$conexion->query($sql);
        
        //En caso de que la consulta de la variable $resultados falle
        if($conexion->errno){
            die($conexion->errno);//Par que mate el error

        }

        while($fila=$resultados->fetch_assoc()){
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
        
        $conexion->close();
    
    ?>
    </body>
</html>
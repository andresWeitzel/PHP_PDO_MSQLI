<?php
    require "Consulta.php";
    //Necesitanos crar una instancia para que se ejecute el cinstructor de estas clase
    $country= new ConsultaPaises();
    $array_country=$country->get_country();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        
        foreach($array_country as $elemento) {
            echo "<table><tr><td>";
            echo $elemento['Code'] . "</td><td>";
            echo $elemento['Name'] . "</td><td>";
            echo $elemento['Continent'] . "</td><td>";
            echo $elemento['Region'] . "</td><td>";
            echo $elemento['Population'] . "</td><tr></tr></table>";

            echo "<br>";
            echo "<br>";


        }
    ?>
    
    </body>
</html>
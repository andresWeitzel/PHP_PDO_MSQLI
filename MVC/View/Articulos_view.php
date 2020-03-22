<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        td {
            border:1px dotted red;
        }
    </style>
</head>
<body>
        <!--------FRONTEND------>
    <table>
     <tr>
      <td>Descripcion del Articulo</td>
    
    <?php
        foreach($array_articulos as $registro){

            echo "<tr><td>" . $registro["descripcion"] . "</td></td>";
        }
    
    ?>
     </tr>
    </table>



</body>
</html>
  




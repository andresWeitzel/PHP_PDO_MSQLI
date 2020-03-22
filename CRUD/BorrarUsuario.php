<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <title>Document</title>
</head>
<body>
<?php
    include("Conexion.php");
    //utilizaremos el id del usuario que capturaremos por la url
    $id=$_GET["id"];
    
    //Hacemos una query a nuestra db y borramos los registros con el id correspondiente  de nuestra tabla
    $base->query("DELETE FROM datos_clientes WHERE id='$id' ");
    //Redirijimos a la pagina principal
    header("Location:index.php");
?>
    
</body>
</html>
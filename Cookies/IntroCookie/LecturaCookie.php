<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
//Si tenemos la cookie creada la leemos(devuelve True en caso de que lo este o False en caso contrario).
if(isset($_COOKIE["prueba"])){
//leeremos y escribimos  nuestra cookie creada usando variable superglobal($_COOKIE).
echo $_COOKIE["prueba"];
}else{
    echo "La cookie no se ha creado";
}
?>
</body>
</html>
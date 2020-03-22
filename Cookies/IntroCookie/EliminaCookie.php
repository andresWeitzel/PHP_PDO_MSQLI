<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
    //Para borrar la cookie establecemos un valor negativo al 3er parametro
    setcookie("prueba","Esta es la informacion de cookie creada",time()-1);
    echo "La cookie ha sido eliminada exitosamente";
    

?>    
</body>
</html>
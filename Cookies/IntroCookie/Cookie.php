<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
    //Creamos nuesra primra coookie--> 1er parametro:Nombre de la cookie,2do parametro:El contenido de la misma,3er parametro:La duracion de laq cookie(segundos), la funcion time() nos la crea en el momento que creamos la cookie(utiliza la hora del sistema) y si le colocamos + numero, este numero sera la duracion extra de vida de la cookie

    setcookie("prueba","Esta es la informacion de cookie creada",time()+10);
    echo "La cookie ha sido creada";
    

?>    
</body>
</html>
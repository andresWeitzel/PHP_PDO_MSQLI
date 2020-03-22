<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    //TReederigido el parametro idioma esta pagina hacfe la funcion logica e dependiendo  la bandera seleccionada
    //-->Si es que no se creo la cookie idioma le redirigimos a la pagina principal para crearlo, en caso de que la cookie este creada y el valor del argumento idioma sea "es" la redirigimos a la pagina en español
    if( ! $_COOKIE["idioma"]){

        header("Location:Principal.php");

    }else if($_COOKIE["idioma"] == "es" ){

        header("Location:español.html");

    }else if($_COOKIE["idioma"] == "us" ){

        header("Location:unitedstate.html");
    }

?>
</body>
</html>
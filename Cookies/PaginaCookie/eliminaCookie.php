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
    //Recordar que colocandole un tiempo negativo lo que hacemos es eliminarla
    setcookie("idioma","es",time()-1);
    echo "Se ha eliminado la cookie en español!!";

    setcookie("idioma","us",time()-1);
    echo "<br>Se ha eliminado la cookie en ingles!!";
    
    
    
    ?>
</body>
</html>
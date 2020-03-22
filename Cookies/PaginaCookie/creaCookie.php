
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
    //rescataremos de lo que venga de la url con el parametro idioma enviada desde un link de l apagina Principal usando la superglobal $_GET 
    setcookie("idioma",$_GET["idioma"],time()+40000000);

    //Una vez obtenido el valor del parametro llamado idioma de la url lo rederigimos a otra pagina con el header
    header("Location:verCookie.php");

?>
    
</body>
</html>
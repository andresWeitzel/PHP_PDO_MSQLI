<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
</head>

<body>
    <!--Usaremos un sistema de filtro de php para los usuarios-->
    <?
        //Reanudaremos la sesion creada y e caso de que no haya sido creada  
        session_start();
        //Hacemos la comprobacion de la session del usuauriio
        if(!isset ($_SESSION["usuario"])){
            //Si esto es falso lordirigimos la login
            header("Location:Login2.html");


        }

    
       
    ?>
    <h1>Registro Principal</h1>
    <?php
       
            session_start();
            echo "Bienvenido/a " .$_SESSION["usuario"] . " al registro principal " 
        
    ?>
    <p>Informacion solo para usuarios registrados</p></p>


</body>

</html>
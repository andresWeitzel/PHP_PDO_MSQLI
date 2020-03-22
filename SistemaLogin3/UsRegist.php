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
            header("Location:Login3.html");


        }

    
       
    ?>
    <h1>Registro Principal</h1>
    <?php
       
            session_start();
            echo "Bienvenido/a " .$_SESSION["usuario"] . " al registro principal " 
        
    ?>
    <p>Informacion solo para usuarios registrados</p>
    
    <a href="Pag1.php" class="btn btn-success">Ir a Cuenta</a><br>
    <a href="Pag2.php" class="btn btn-success">Ir a Transaccion</a><br>
    <a href="CerrarSesion.php" class="btn btn-success">Cerrar la Sesion Actual</a>
    


</body>

</html>
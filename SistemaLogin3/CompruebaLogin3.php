<?php

try{
    //Nos conectamos a la base de datos
    $base=new PDO("mysql: host=localhost; dbname=db_clientes", "root", "");
    //establecemos lñas propiedades de esta conexion
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Preparamos nuestra sentencia sql para comprobar si el usuario existe o no
    $sql= " SELECT * FROM clientes WHERE Nombre= :login AND NIF= :password";
    //Crearemos una consulta prparada con marcadores
    $resultado=$base->prepare($sql);
    //Rescatamos el login y el passw del formulaio
    //La funcion htmlentities conviert cualquier simbolo en html
    //El parametro pasado a la anterior funcion nos permite escapar de sqlinyector(simbolos extraños)
    $login=htmlentities(addslashes($_POST["login"]));
    //Rescatamos lo que el usuario coloco en el passw
    $password=htmlentities(addslashes($_POST["password"]));
    //Relacionaremos los amrcadores creados en la variable $sql y lo que el usuario ingreso
    $resultado->bindValue(":login",$login);
    $resultado->bindValue(":password",$password);
    //Ejecutamos la funcion SQL
    $resultado->execute();
    //la funcio rowCount() nos dice el numero de resgistro  que devueñve una consulta(existe:uno, no existe:0)
    $numeroRegistro=$resultado->rowCount();
    //Evaluamos si la variable $numeroRegistro tiene almacenado algun valor o no(0 o 1);
    if($numeroRegistro != 0){
         //Utilizaremos las sesiones para que un usuario no copio kla url del archivo y se auto logee a kla pagina de inicio
        //crearemos una session para poder rediccionar a un usuario de una forma segura y de forma ed que unn usuario no registradio no pueda acceder con este sistema de seguridad
        //Par esto deberemo utilizar las funciones d ephp y deberemos crear una nueva variable para poder almacenar el valor
        //Levantamos la sesion para el usuario que se acaba de logear
        session_start();
        //Almacenaremos en la variable SESSION el identificador de la misma que llamaremos usuario, que a su vez posteara lo que tengamos en login(Nombre del usuario).
        $_SESSION["usuario"]=$_POST["login"];        
        
        //Con la funcion header redirigimos a la pagina que deseamos
        header("Location:UsRegist.php");
        
    }else{
        //Utilizamos el atributo header de php para redirijir a la pagina que queremos
        //header("location:Login.html");
        echo"<h2>Usuario o Contraseña Invalida!!</h2>";
    }

}catch(Exception $e){
    die("Error: " . $e ->getMessage());

}


?>
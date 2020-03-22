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
        //En caso de que sea correcto el Login, lo redirijimos a la pagina  de Registros
        echo"<h2>Bienvenido!!</h2>";

    }else{
        //Utilizamos el atributo header de php para redirijir a la pagina que queremos
        //header("location:Login.html");
        echo"<h2>Usuario o Contraseña Invalida!!</h2>";
    }

}catch(Exception $e){
    die("Error: " . $e ->getMessage());

}


?>
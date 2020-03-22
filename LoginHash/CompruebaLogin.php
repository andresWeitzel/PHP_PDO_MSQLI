<?php

try{
    $contador=0;


    //Nos conectamos a la base de datos
    $base=new PDO("mysql: host=localhost; dbname=db_clientes", "root", "");
    //establecemos lñas propiedades de esta conexion
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Preparamos nuestra sentencia sql para comprobar si el usuario existe o no
    $sql= " SELECT * FROM clientes WHERE Nombre= :login AND NIF= :password";
    
    //Rescatamos el login y el passw del formulaio
    //La funcion htmlentities conviert cualquier simbolo en html
    //El parametro pasado a la anterior funcion nos permite escapar de sqlinyector(simbolos extraños)
    $login=htmlentities(addslashes($_POST["login"]));
    //Rescatamos lo que el usuario coloco en el passw
    $password=htmlentities(addslashes($_POST["password"]));
    //Relacionaremos los amrcadores creados en la variable $sql y lo que el usuario ingreso
    $resultado->bindValue(":login",$login);
    $resultado->bindValue(":password",$password);

    //Crearemos una consulta prparada con marcadores
    $resultado=$base->prepare($sql);
    //Ejecutamos la funcion SQL
    $resultado->execute(array(":login"=>$login));

    while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){

        //Utilizaremos la funcion verify para compaarar el nif encriptado ya registrado
    	//y el nuevo nif, en el primer parametro sera el nif ingresado y el segundo el nuevo

        if(password_verify( $Nif , $registro['NIF'] )){
            //Devuelve true en caso de que ambas sean iguales
            //Entra al if e imcrementa a 1 el contador
            $contador++;
        }
         
    }


    if($contador > 0){
        //En caso de que se haya comparado al menos un usuario que coincida contraseña registrada con la actual nos imprime..
        echo "Usuario Registrado";
    }else{
        echo "Usuario no Registrado";
    }
  

    
}catch(Exception $e){
    die("Error: " . $e ->getMessage());

}


?>
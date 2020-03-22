<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
try{

$base=new PDO("mysql:host=localhost; dbname=db_pruebas2","root","");

$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$base->exec("SET CHARACTER SET utf8");


//Cantidad de Registros por pagina
$cantidad_registros_por_pagina=3;

//El bloque dentro del siguiente if se ejecutara siempre y cuando se le haya pasado el parametro "pagina" por la url.
if(isset($_GET["pagina"])){
      //Si el valor pasado a la url llamada pagina es igual a 1 nos redirige a la misma pagina, en caso contrario que guarde el numero en la variable $pagina
      if($_GET["pagina"]==1){
        header("Location:index.php");
    }else{
        $pagina=$_GET["pagina"];
    }

}
  
     







//La pagina en la que estamos situados
$pagina_referencia=1;
//Me almacena el registro desde el cual me empezara a mostrar los resultados
$empezar_desde=($pagina_referencia - 1) * $cantidad_registros_por_pagina;

$sql_total="SELECT ID ,Name, CountryCode, District, Population FROM city WHERE CountryCode='DZA'";


$resultado=$base->prepare($sql_total);

$resultado->execute(array());

//Cuantos registros nos evuelve la consulta sql
$num_filas=$resultado->rowCount();
//una forma de saber el total de paginas, ya que teniendo la cantidad de registros que nos devuelve la consulta sql($num_filas) y los registros que utilizaremos por pagina(3)
//Con el ceil redondeamos la cantidad de paginas porque la operacion nos da tpo double
$total_paginas=ceil($num_filas/$cantidad_registros_por_pagina);

$resultado->closeCursor();





//A tener en consideracion->Para poder paginar los resultados obtenido de nuestra consulta con la clausula limit limitamos la cantidad de registros deseados.
$sql_limite="SELECT ID ,Name, CountryCode, District, Population FROM city WHERE CountryCode='DZA' LIMIT $empezar_desde , $cantidad_registros_por_pagina";

$resultado=$base->prepare($sql_limite);

$resultado->execute(array());
//Usaremos un array asociativo dentro del bucle para escribir la informacion
while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){

    echo  " <br>|ID: ". $registro["ID"] . " |Nombre: ". $registro["Name"]  . " |Codigo del Pais: ".$registro["CountryCode"] . " |Distito: " . $registro["District"] . " |Poblacion: " . $registro["Population"] . "<br>";
}





}catch(Exception $e){

    echo "Linea del Error: ". $e->getLine();

}

//------------------PAGINACION-------------

for($i=1; $i <= $total_paginas; $i++){
    //La siguiente instruccion la hacemos para pasarle a laurl el numero de paginacion 
    echo "<a href='?pagina= " . $i  . "'>". $i ."</a> ";

}
?>    
</body>
</html>
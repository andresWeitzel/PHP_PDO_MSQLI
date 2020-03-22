<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>

<h1>ACTUALIZAR</h1>

<?php

include("Conexion.php");

//Si no se ha pulsado el boton de actualizar entonces me ejucutas estas operaciones
if(!isset($_POST["boton_actualizar"])){
  //Rescatamos el valor que se le pasa por la url enm index.php
  $id=$_GET["id"];
  $nom=$_GET["nom"];
  $ape=$_GET["ape"];
  $dir=$_GET["dir"];
}else{
  //Si es que se pulso el boton submit de esta pagina entonces lo que el usuario haya modificado y lo que no, se sobreescribe en la tabla datos_clientes.
  $id=$_POST["id"];
  $nom=$_POST["nom"];
  $ape=$_POST["ape"];
  $dir=$_POST["dir"];

  //Usamos marcadores para tener una instruccion sql preparada para evitar la inyeccion sql
  $update=" UPDATE datos_clientes SET nombre=:minom, apellido=:miape, direccion=:midir WHERE id=:miid";

  //Guardaremos en nuestra varibale el valor de nuestra consulta
  $resultado=$base->prepare($update);

  //Creamos un array para nuestros registros con nuestros marcadores
  $arrayregistros=array(':miid'=>$id,':minom'=>$nom,':miape'=>$ape,':midir'=>$dir);
  //Ejecutamos un array de nuesra consulta relacionando los valores obtenidos con los valores de los marcadores creados dentro de la variable $update.
  $resultado->execute($arrayregistros);

  //Rederijimos  al index al usuario
  header("Location:index.php");

}

 

?>

<p>
 
</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <table width="25%" border="0" align="center">
    <tr>
      <td></td>
      <td><label for="id"></label>
      <input type="hidden" name="id" id="id" value="<?php echo $id ?>"></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="nom"></label>
      <input type="text" name="nom" id="nom" value="<?php echo $nom ?>"></td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td><label for="ape"></label>
      <input type="text" name="ape" id="ape" value="<?php echo $ape ?>"></td>
    </tr>
    <tr>
      <td>Dirección</td>
      <td><label for="dir"></label>
      <input type="text" name="dir" id="dir" value="<?php echo $dir ?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="boton _actualizar" id="boton_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>
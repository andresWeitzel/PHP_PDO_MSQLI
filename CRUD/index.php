<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>
<link rel="stylesheet" type="text/css" href="hoja.css">


</head>

<body>
<?php
include("Conexion.php");
//ejecutamos una funcion que nos devuelva todos los campos que hay en la tabla datos_cleientes
$conexion=$base->query("SELECT * FROM datos_clientes");
//Creamos un array de objetos para el futuro uso del mismo
$registros=$conexion->fetchAll(PDO::FETCH_OBJ);

?>

<h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>

  <table width="50%" border="0" align="center">
    <tr >
      <td class="primera_fila">Id</td>
      <td class="primera_fila">Nombre</td>
      <td class="primera_fila">Apellido</td>
      <td class="primera_fila">Dirección</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
    </tr> 
   
    <?php
    //Por cada cliente que haya se repetira el codifo del foreach
      foreach($registros as $cliente):?>
     
     <tr>
      <td><?php echo $cliente->id?> </td> 
      <td><?php echo $cliente->nombre?></td>
      <td><?php echo $cliente->apellido?></td> 
      <td><?php echo $cliente->direccion?></td>
        
      
      <td class="bot"><a href="BorrarUsuario.php?id= <?php echo $cliente->id?>"> <input type='button' name='del' id='del' value='Borrar'></a></td>

      <td class="bot"><a href="ActualizarUsuario.php?id= <?php echo $cliente->id?> & nom= <?php echo $cliente->nombre?> & ape= <?php echo $cliente->apellido?> &  dir= <?php echo $cliente->direccion?>"> <input type='button' name='up' id='up' value='Actualizar'></a></td>
    </tr>     
    
    <?php 
      //Aca termina el foreach, todo lo que este en este bucle sra repetido
      endforeach;?>
	<tr>
	<td></td>
      <td><input type='text' name='Nom' size='10' class='centrado'></td>
      <td><input type='text' name='Ape' size='10' class='centrado'></td>
      <td><input type='text' name=' Dir' size='10' class='centrado'></td>
      <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td></tr>    
  </table>

<p>&nbsp;</p>
</body>
</html>
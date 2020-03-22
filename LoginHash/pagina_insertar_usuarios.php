<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

<?php

	$Usuario= $_POST["usu"];
	$Nif= $_POST["nif"];

	//Encriptaremos el Nif del usuario registrado
	//Con el  tercer argume4nto aumentamos o disminuimos el peso del nif 
	$NifCifrado=password_hash( $Nif , PASSWORD_DEFAULT , array("cost"=>12));
	
	try{

		$base=new PDO("mysql: host=localhost; dbname=db_clientes", "root", "");
		
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$base->exec("SET CHARACTER SET utf8");		
		
		
		$sql="INSERT INTO clientes (NOMBRE, NIF) VALUES (:usu, :nif)";
		
		$resultado=$base->prepare($sql);		
		
		
		$resultado->execute(array(":usu"=>$Usuario, ":nif"=>$NifCifrado));	
		
		echo "Registro insertado";
		
		$resultado->closeCursor();


	}catch(Exception $e){			
		
		
		echo "Línea del error: " . $e->getLine();
		
	}finally{
		
		$base=null;
		
		
	}

?>
</body>
</html>
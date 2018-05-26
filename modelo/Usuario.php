<?php 

class Usuario extends Conexion {


function lista(){

try {
	
$conexion  = $this->get_conexion();
$query     = "SELECT * FROM usuario";
$statement = $conexion->prepare($query);
$statement->execute();
$result    = $statement->fetchAll(PDO::FETCH_ASSOC);
return $result;



} catch (Exception $e) {

echo "Error: ".$e->getMessage();	

}

}



}


 ?>
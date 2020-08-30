<?php   
if(!isset($_POST["codigo"])) return;
$codigo = $_POST["codigo"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM clientes WHERE Nit = ? LIMIT 1;");
$sentencia->execute([$codigo]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if($producto){
	session_start();
	$indice = false;
	if($indice === FALSE){
		array_push($_SESSION["cliente"], $producto);
		
	}else{

	}
	header("Location: ./venderInicio.php");
}else header("Location: ./venderInicio.php?status=4");
?>
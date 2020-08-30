<?php 
include_once "encabezado.php";
session_start();
?>



<?php
if(!isset($_POST["nitcliente"])) return;
$codigo = $_POST["nitcliente"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM clientes WHERE nit = ? LIMIT 1;");
$sentencia->execute([$codigo]);
$clientes = $sentencia->fetch(PDO::FETCH_OBJ);

if($clientes){

	session_start();
	$indice = false;
	for ($i=0; $i < count($_SESSION["carrito"]); $i++) { 
		if($_SESSION["carrito"][$i]->codigo === $codigo){
			$indice = $i;
			break;
		}
	}
	header("Location: ./vender.php");
}else header("Location: ./vender.php?status=4");
?>



<?php include_once "pie.php" ?>
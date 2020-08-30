<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["codigo"]) || 
	!isset($_POST["descripcion"]) || 
	!isset($_POST["id"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id = $_POST["id"];
$codigo = $_POST["codigo"];
$descripcion = $_POST["descripcion"];
$precionVenta = $_POST["precioVenta"];
$precionCompra = $_POST["precioCompra"];
$existencia = $_POST["existencia"];


$sentencia = $base_de_datos->prepare("UPDATE productos SET codigo = ?, descripcion = ?,precioVenta=?,precioCompra=?,existencia=?  WHERE id = ?;");
$resultado = $sentencia->execute([$codigo, $descripcion,$precionVenta,$precionCompra,$existencia, $id]);

if($resultado === TRUE){
	header("Location: ./Producto.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>
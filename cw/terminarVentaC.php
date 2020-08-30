<?php
if(!isset($_POST["total"])) exit;
if(!isset($_SESSION["nombrecliente"])) $_SESSION["nombrecliente"] = [];
$NombreClienteGuardar=$_SESSION["nombrecliente"];
session_start();


$total = $_POST["total"];
$NombreClienteGuardar = $_POST["total2"];
$Pago = $_POST["Pago"];
$Saldo = $_POST["Saldo"];
include_once "base_de_datos.php";


$ahora = date("Y-m-d H:i:s");


$sentencia = $base_de_datos->prepare("INSERT INTO ventas1(cliente,fecha, total,Pago,Saldo) VALUES (?,?, ?,?,?);");
$sentencia->execute([$NombreClienteGuardar,$ahora, $total,$Pago,$Saldo]);

$sentencia = $base_de_datos->prepare("SELECT id FROM ventas1 ORDER BY id DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

$idVenta = $resultado === false ? 1 : $resultado->id;

$base_de_datos->beginTransaction();
$sentencia = $base_de_datos->prepare("INSERT INTO productos_vendidos1(id_producto, id_venta, cantidad) VALUES (?, ?, ?);");
$sentenciaExistencia = $base_de_datos->prepare("UPDATE productos SET existencia = existencia - ? WHERE id = ?;");
foreach ($_SESSION["carritoC"] as $producto) {
	$total += $producto->total;
	$sentencia->execute([$producto->id, $idVenta, $producto->cantidad]);
	$sentenciaExistencia->execute([$producto->cantidad, $producto->id]);
}
$base_de_datos->commit();
unset($_SESSION["carritoC"]);
$_SESSION["carritoC"] = [];
header("Location: ./vender1.php?status=1");
?>
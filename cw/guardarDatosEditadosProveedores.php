<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["nombre"]) || 
	!isset($_POST["direccion"]) || 
	!isset($_POST["telefono"]) || 
	!isset($_POST["nit"]) || 
	!isset($_POST["nombre_representante"]) || 
	!isset($_POST["id"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$nit = $_POST["nit"];
$nombre_representante = $_POST["nombre_representante"];

$sentencia = $base_de_datos->prepare("UPDATE proveedores SET nombre = ?, direccion = ?, telefono = ?, nit = ?,nombre_representante = ? WHERE id = ?;");
$resultado = $sentencia->execute([$nombre, $direccion, $telefono, $nit, $nombre_representante, $id]);

if($resultado === TRUE){
	header("Location: ./proveedores.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>
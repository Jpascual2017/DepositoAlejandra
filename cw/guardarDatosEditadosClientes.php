<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["nombre"]) || 
	!isset($_POST["direccion"]) || 
	!isset($_POST["telefono"]) || 
	!isset($_POST["nit"]) || 
	!isset($_POST["id"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$nit = $_POST["nit"];

$v1 = $_POST['variable2'];

$sentencia = $base_de_datos->prepare("UPDATE clientes SET Nombre = ?, Direccion = ?, Telefono = ?, Nit = ? WHERE id = ?;");
$resultado = $sentencia->execute([$nombre, $direccion, $telefono, $nit, $id]);

if($resultado === TRUE){
	header("Location: ./clientes.php?pagina=$v1");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>
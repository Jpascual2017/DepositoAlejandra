<?php include_once "encabezado.php" ?>
<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["nombre"]) || !isset($_POST["direccion"]) || !isset($_POST["telefono"]) || !isset($_POST["telefono"]) || !isset($_POST["nit"]) || !isset($_POST["nombre_representante"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$nombre = $_POST["nombre"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$nit = $_POST["nit"];
$nombre_representante = $_POST["nombre_representante"];

$sentencia = $base_de_datos->prepare("INSERT INTO proveedores(nombre, direccion, telefono, nit, nombre_representante) VALUES (?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$nombre, $direccion, $telefono, $nit, $nombre_representante]);

if($resultado === TRUE){
	header("Location: ./proveedores.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>
<?php include_once "encabezado.php" ?>
<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["nombre"]) || !isset($_POST["direccion"]) || !isset($_POST["telefono"]) || !isset($_POST["telefono"]) || !isset($_POST["nit"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
include_once 'conec.php';                               //Incluye la clase conecccion
$sql = 'SELECT * FROM clientes order by id asc';        //Query a la tabla clientes
$sentencia = $pdo->prepare($sql);
$sentencia->execute();
$resultado = $sentencia->fetchAll();                     //Cantidad de registros por pagina
$totaldatos = $sentencia->rowCount();                    //Total de registros de la tabla

$nombre = $_POST["nombre"];				          		//Recepcion de variables por metodo POST
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$nit = $_POST["nit"];
$v1 = $_POST['variable2'];

if ($totaldatos==0){
	$v1='1';
}

$sentencia = $base_de_datos->prepare("INSERT INTO clientes(Nombre, Direccion, Telefono, Nit) VALUES (?, ?, ?, ?);");
$resultado = $sentencia->execute([$nombre, $direccion, $telefono, $nit]);

if($resultado === TRUE){
	header("Location: ./clientes.php?pagina=$v1");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>
<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM clientes WHERE id = ?;");
$sentencia->execute([$id]);
$cliente = $sentencia->fetch(PDO::FETCH_OBJ);
if($cliente === FALSE){
	echo "¡No existe algún cliente con ese ID!";
	exit();
}

?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar Cliente: <?php echo $cliente->Nombre; ?></h1>
		<h1>Id: <?php echo $cliente->id; ?></h1>
		<form method="post" action="guardarDatosEditadosClientes.php">
			<input type="hidden" name="id" value="<?php echo $cliente->id; ?>">
	
			<label for="codigo">Nombre del Cliente:</label>
			<input value="<?php echo $cliente->Nombre ?>" class="form-control" name="nombre" required type="text" id="nombre" placeholder="Escribe el Nombre del clientes">

			<label for="direccion">Direccion:</label>
			<textarea required id="direccion" name="direccion" cols="30" rows="5" class="form-control"><?php echo $cliente->Direccion ?></textarea>

			<label for="telefono">Telefono:</label>
			<input value="<?php echo $cliente->Telefono ?>" class="form-control" name="telefono" required type="number" id="telefono" placeholder="Telefono del Cliente">

			<label for="nit">Nit del cliente:</label>
			<input value="<?php echo $cliente->Nit ?>" class="form-control" name="nit" id="nit" placeholder="Nit del cliente">

			<input type="hidden" name="variable2" value="<?php echo $_GET['pagina']?>" />

			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./Clientes.php?pagina=<?php echo $_GET['pagina']?>">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>

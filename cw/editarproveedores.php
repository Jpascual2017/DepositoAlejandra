<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM proveedores WHERE id = ?;");
$sentencia->execute([$id]);
$proveedores = $sentencia->fetch(PDO::FETCH_OBJ);
if($proveedores === FALSE){
	echo "¡No existe algún proveedores con ese ID!";
	exit();
}

?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar proveedor: <?php echo $proveedores->nombre; ?></h1>
		<form method="post" action="guardarDatosEditadosProveedores.php">
			<input type="hidden" name="id" value="<?php echo $proveedores->id; ?>">
	
			<label for="nombre">Nombre del proveedores:</label>
			<input value="<?php echo $proveedores->nombre ?>" class="form-control" name="nombre" required type="text" id="nombre" placeholder="Escribe el Nombre del proveedor">

			<label for="direccion">Direccion:</label>
			<textarea required id="direccion" name="direccion" cols="30" rows="5" class="form-control"><?php echo $proveedores->direccion ?></textarea>

			<label for="telefono">Telefono:</label>
			<input value="<?php echo $proveedores->telefono ?>" class="form-control" name="telefono" required type="number" id="telefono" placeholder="Telefono del proveedor">

			<label for="nit">Nit del proveedores:</label>
			<input value="<?php echo $proveedores->nit ?>" class="form-control" name="nit" id="nit" placeholder="Nit del proveedor">

            <label for="nombre_representante">Nombre del Representante:</label>
			<input value="<?php echo $proveedores->nombre_representante ?>" class="form-control" name="nombre_representante" id="nombre_representante" placeholder="Nombre del representante">
			
            <br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./proveedores.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>

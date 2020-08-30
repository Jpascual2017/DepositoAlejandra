<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo cliente</h1>
	<form method="post" action="nuevocliente.php">   
		<label for="nombre">Nombre del Cliente:</label>
		<input class="form-control" name="nombre" required type="text" id="nombre" placeholder="Escribe el nombre del clientes">

		<label for="direccion">Direccion:</label>
		<textarea required id="direccion" name="direccion" cols="30" rows="5" class="form-control"></textarea>

		<label for="telefono">Telefono:</label>
		<input class="form-control" name="telefono" required type="number" id="telefono" placeholder="Numero de telefono">

		<label for="nit">Nit:</label>
		<input class="form-control" name="nit" required type="number" id="nit" placeholder="Nit cliente">
		<input type="hidden" name="variable2" value="<?php echo $_GET['pagina']?>" />
		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>
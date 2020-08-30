<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo producto</h1>
	<form method="post" action="NuevoProducto.php">
		<label for="codigo">Código:</label>
		<input class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">

		<label for="descripcion">Descripción:</label>
		<textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"></textarea>	
		
		<label for="precioVenta">Precio Venta:</label>
		<input class="form-control" name="precioVenta" required type="text" id="precioVenta" placeholder="Escribe el precio Venta">

		<label for="precioCompra">Precio Compra:</label>
		<input class="form-control" name="precioCompra" required type="text" id="precioCompra" placeholder="Escribe el precio Compra">

		<label for="existencia">Existencia:</label>
		<input class="form-control" name="existencia" required type="text" id="existencia" placeholder="Escribe la existencia">

		
		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>
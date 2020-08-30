<?php 
include_once "encabezado.php";
session_start();
if(!isset($_SESSION["carritoC"])) $_SESSION["carritoC"] = [];
if(!isset($_SESSION["nombrecliente"])) $_SESSION["nombrecliente"] = [];
$granTotal = 0;
?>

	<div class="col-xs-12">
		<h1>Nueva Venta al Credito</h1>
<br>Cliente Seleccionado:
		<?php			
			echo $_SESSION["nombrecliente"];
		?>
<br/>


		<?php
			if(isset($_GET["status"])){
				if($_GET["status"] === "1"){
					?>
						<div class="alert alert-success">
							<strong>¡Correcto!</strong> Venta realizada correctamente
						</div>
					<?php
				}else if($_GET["status"] === "2"){
					?>
					<div class="alert alert-info">
							<strong>Venta cancelada</strong>
						</div>
					<?php
				}else if($_GET["status"] === "3"){
					?>
					<div class="alert alert-info">
							<strong>Ok</strong> Producto quitado de la lista
						</div>
					<?php
				}else if($_GET["status"] === "4"){
					?>
					<div class="alert alert-warning">
							<strong>Error:</strong> El producto que buscas no existe
						</div>
					<?php
				}else if($_GET["status"] === "5"){
					?>
					<div class="alert alert-danger">
							<strong>Error: </strong>El producto está agotado
						</div>
					<?php
				}else{
					?>
					<div class="alert alert-danger">
							<strong>Error:</strong> Algo salió mal mientras se realizaba la venta
						</div>
					<?php
				}
			}
		?>
		<br>
		<form method="post" action="agregarAlCarritoC.php">
			<label for="codigo">Codigo Producto:</label>
			<input autocomplete="on" autofocus class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">
		</form>

		<br><br>
		<table class="table table-bordered"> 
			<thead>
				<tr>
					<th>ID</th>
					<th>Código</th>
					<th>Descripción</th>
					<th>Precio de venta</th>
					<th>Cantidad</th>
					<th>Total</th>
					<th>Quitar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($_SESSION["carritoC"] as $indice => $producto){ 
						$granTotal += $producto->total;
					?>
				<tr>
					<td><?php echo $producto->id ?></td>
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->descripcion ?></td>
					<td><?php echo $producto->precioVenta ?></td>
					<td><?php echo $producto->cantidad ?></td>
					<td><?php echo $producto->total ?></td>
					<td><a class="btn btn-danger" href="<?php echo "quitarDelCarritoC.php?indice=" . $indice?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<h3>Total: <?php echo $granTotal; ?></h3>
		<form action="./terminarVentaC.php" method="POST">
			<input name="total" type="hidden" value="<?php echo $granTotal;?>">
			<input name="total2" type="hidden" value="<?php echo $_SESSION["nombrecliente"];?>">
			<label for="Pago">Pago</label>
			<input type="text" id="Pago" name="Pago"><br>
			<label for="Saldo">Saldo</label>
			<input type="text" id="Saldo" name="Saldo"><br>
			<button type="submit" class="btn btn-success">Terminar venta</button>
			<a href="./cancelarVentaC.php" class="btn btn-danger">Cancelar venta</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
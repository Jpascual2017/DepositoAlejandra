<?php 
include_once "encabezado.php";
session_start();
if(!isset($_SESSION["cliente"])) $_SESSION["cliente"] = [];
if(!isset($_SESSION["nombrecliente"])) $_SESSION["nombrecliente"] = [];
$granTotal = 0;
?>

	<div class="col-xs-12">
		<h1>Nueva Venta al Credito</h1>
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
							<strong>Ok</strong> Cliente quitado de la lista
						</div>
					<?php
				}else if($_GET["status"] === "4"){
					?>
					<div class="alert alert-warning">
							<strong>Error:</strong> El Cliente que buscas no existe
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
		<form method="post" action="agregarAlCarrito2.php">
			<label for="codigo">Escriba el Nit del cliente:</label>
			<input autocomplete="off" autofocus class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el Nit del cliente">
		</form>

		<br><br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Dirección</th>
					<th>Teléfono</th>
					<th>Nit</th>
					<th>Quitar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($_SESSION["cliente"] as $indice => $cliente){ 
					?>
				<tr>
					<td><?php echo $cliente->id ?></td>
					<td><?php echo $cliente->Nombre ?></td>
					<td><?php echo $cliente->Direccion ?></td>
					<td><?php echo $cliente->Telefono ?></td>
					<td><?php echo $cliente->Nit ?></td>
					<td><a class="btn btn-danger" href="<?php echo "quitarDelCarrito2.php?indice=" . $indice?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<form action="./vender1.php" method="POST">
			<p>Cliente Seleccionado: <input type="text" name="nombre" value ="<?php $valor= $cliente->Nombre; echo $_SESSION["nombrecliente"]=$valor;?>" /></p>		
			<input name="total" type="hidden" value="<?php echo $granTotal;?>">
			<button type="submit" class="btn btn-success">Agregar Productos</button>
			<a href="./cancelarVenta2.php" class="btn btn-danger">Cancelar venta</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
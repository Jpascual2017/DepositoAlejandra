<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT ventas1.total, ventas1.cliente,ventas1.Pago,ventas1.Saldo, ventas1.fecha, ventas1.id, GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos_vendidos1.cantidad SEPARATOR '__') AS productos FROM ventas1 INNER JOIN productos_vendidos1 ON productos_vendidos1.id_venta = ventas1.id INNER JOIN productos ON productos.id = productos_vendidos1.id_producto GROUP BY ventas1.id ORDER BY ventas1.id;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Ventas de Contado</h1>
		<div>
			<a class="btn btn-success" href="./venderinicio.php">Nueva Venta <i class="fa fa-plus"></i></a>
		</div>
		<h1></h1>
		<div>
			<a class="btn btn-success" href="./VerVentasCredito.php">Historial <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Número</th>
                    <th>Cliente</th>
					<th>Fecha</th>
					<th>Productos vendidos</th>
					<th>Total</th>
					<th>Pago</th>
					<th>Saldo</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ventas as $venta){ ?>
				<tr>
					<td><?php echo $venta->id ?></td>
                    <td><?php echo $venta->cliente ?></td>
					<td><?php echo $venta->fecha ?></td>
					<td>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Código</th>
									<th>Descripción</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $venta->productos) as $productosConcatenados){ 
								$producto = explode("..", $productosConcatenados)
								?>
								<tr>
									<td><?php echo $producto[0] ?></td>
									<td><?php echo $producto[1] ?></td>
									<td><?php echo $producto[2] ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
					<td><?php echo $venta->total ?></td>
					<td><?php echo $venta->Pago ?></td>
					<td><?php echo $venta->Saldo ?></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminarVentaCredito.php?id=" . $venta->id?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>
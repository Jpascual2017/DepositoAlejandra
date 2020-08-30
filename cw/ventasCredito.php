<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT ventas.total, ventas.fecha, ventas.id, GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos_vendidos.cantidad SEPARATOR '__') AS productos FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id INNER JOIN productos ON productos.id = productos_vendidos.id_producto GROUP BY ventas.id ORDER BY ventas.id;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Ventas al credito</h1>
		<div>
			<a class="btn btn-success" href="./venderinicio.php">Nueva Venta credito<i class="fa fa-plus"></i></a>
		</div>
		<h1></h1>
		<div>
			<a class="btn btn-success" href="./VerVentasCredito.php">Historial <i class="fa fa-plus"></i></a>
		</div>
				
	</div>
<?php include_once "pie.php" ?>
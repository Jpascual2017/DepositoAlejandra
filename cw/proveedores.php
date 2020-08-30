<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM proveedores ORDER BY id ASC;");
$proveedores = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Proveedores</h1>
		<div>
			<a class="btn btn-success" href="./formularioproveedores.php">Nuevo proveedor <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nombre</th>
					<th>Dirección</th>
					<th>Teléfono</th>
					<th>Nit</th>
                    <th>Nombre del representante</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($proveedores as $proveedores){ ?>
				<tr>
					<td><?php echo $proveedores->id ?></td>
					<td><?php echo $proveedores->nombre ?></td>
					<td><?php echo $proveedores->direccion ?></td>
                    <td><?php echo $proveedores->telefono ?></td>
					<td><?php echo $proveedores->nit ?></td>
                    <td><?php echo $proveedores->nombre_representante ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editarproveedores.php?id=" . $proveedores->id?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminarproveedores.php?id=" . $proveedores->id?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>
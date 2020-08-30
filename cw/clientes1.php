<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM clientes ORDER BY id ASC;");
$clientes = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<div class="container my-5">
	<div class="col-xs-12">
		<h1>Clientes</h1>
		<div>
			<a class="btn btn-success" href="./formularioclientes.php">Nuevo cliente <i class="fa fa-plus"></i></a>
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
                    <th>Editar</th>
                    <th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($clientes as $clientes){ ?>
				<tr>
				    <td><?php echo $clientes->id ?> </td> 
					<td><?php echo $clientes->Nombre ?></td>
					<td><?php echo $clientes->Direccion ?></td>
                    <td><?php echo $clientes->Telefono ?></td>
					<td><?php echo $clientes->Nit ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editarclientes.php?id=" . $clientes->id?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminarclientes.php?id=" . $clientes->id?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	</div>
<?php include_once "pie.php" ?>
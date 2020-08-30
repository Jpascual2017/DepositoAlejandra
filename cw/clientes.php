<?php 
include_once "encabezado.php";                          //Incluye el encabezado de la pagina
include_once 'conec.php';                               //Incluye la clase conecccion
$sql = 'SELECT * FROM clientes order by id asc';        //Query a la tabla clientes
$sentencia = $pdo->prepare($sql);
$sentencia->execute();
$resultado = $sentencia->fetchAll();
$articulos=3;                                            //Cantidad de registros por pagina
$totaldatos = $sentencia->rowCount();                    //Total de registros de la tabla
$paginas = $totaldatos/$articulos;                       //Cant. de paginas a mostrar
$paginas =ceil($paginas);                                //Redondea el numeor de paginas a entero
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Clientes!</title>
  </head>
  <body>
    <div class="container my-5">
    <h1 class="mb-5">Clientes</h1>
    <div>
			<h2><a class="btn btn-success" href="./formularioclientes.php?pagina=<?php echo $_GET['pagina']?>">Nuevo cliente <i class="fa fa-plus"></i></a></h2>
	</div>
    <?php
    if (!$_GET){                                    //Predeternima la pagina 1 a mostrar.
      header('location:Clientes.php?pagina=1');
    }

    if ($_GET['pagina']>$paginas || $_GET['pagina']<=0){  
      header('location:Clientes.php?pagina=1');
    }

    if ($totaldatos==0){                            //Si no hay registros en la tabla le pedira que ingrese uno.
      header('location:formularioclientes.php');
    }

    $iniciar =($_GET['pagina']-1)*$articulos;             //Bloque de codigo para la paginacion 
    $sql_datos = 'SELECT * FROM clientes LIMIT :inicar,:narticulos';
    $sentencia_datos = $pdo ->prepare($sql_datos);
    $sentencia_datos ->bindParam(':inicar',$iniciar,PDO::PARAM_INT);
    $sentencia_datos ->bindParam(':narticulos',$articulos,PDO::PARAM_INT);
    $sentencia_datos->execute();
    $resultado_datos =$sentencia_datos->fetchAll();
    ?>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Codigo</th>
      <th scope="col">Nombre</th>
      <th scope="col">Direccion</th>
      <th scope="col">Telefono</th>
      <th scope="col">Nit</th>
      <th>Editar</th>
      <th>Eliminar</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($resultado_datos as $datos): ?>
    <tr>
      <th scope="row"><?php  echo $datos['id']  ?></th>
      <td><?php  echo $datos['Nombre'] ?></td>
      <td><?php  echo $datos['Direccion']  ?></td>
      <td><?php  echo $datos['Telefono']  ?></td>
      <td><?php  echo $datos['Nit']  ?></td>
      <td><a class="btn btn-warning" href="editarclientes.php?id=<?php echo $datos['id']?>&pagina=<?php echo $_GET['pagina']?>"><i class="fa fa-edit"></i></a></td>
      <td><a class="btn btn-danger" href="eliminarclientes.php?id=<?php echo $datos['id'] ?>&pagina=<?php echo $_GET['pagina']?>"><i class="fa fa-trash"></i></a></td>
    </tr>
    <?php endforeach ?>  
  </tbody>
</table>
    <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item <?php echo $_GET['pagina']<=1 ? 'disabled': ''?>"><a class="page-link" href="Clientes.php?pagina=<?php echo $_GET['pagina']-1 ?>"> Anterior</a></li>
    <?php for($i=0; $i<$paginas;$i++):  ?>
    <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active': ''?>"><a class="page-link" href="Clientes.php?pagina=<?php echo $i+1 ?>"><?php echo $i+1 ?></a></li>
    <?php endfor  ?>
    <li class="page-item <?php echo $_GET['pagina']>=$paginas ? 'disabled': ''?>"><a class="page-link" href="Clientes.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguientes</a></li>
  </ul>
</nav>
    </div>
  </body>
</html>
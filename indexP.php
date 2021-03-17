<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM producto ORDER BY IdProducto');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM producto WHERE Nombre LIKE :campo OR marca LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<link rel="stylesheet" href="estiloFerretera.css">
</head>
<body>
	<div class="contenedor">
		<h2>Productos de ferreteria</h2>
		<a href="CerrarSesion.php">CerrarSesion</a>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="&#128269;Buscar nombre o marca" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="&#128269;Buscar">
				<a href="insertP.php" class="btn btn__nuevo">&#128100;Nuevo</a>
				
			</form>
		</div>
		<table>
			<tr class="head">
				<td>&#128100;IdProducto</td>
				<td>&#128100;Nombre del Producto</td>
				<td>&#128100;Marca</td>
                <td>&#127991;Precio</td>
                <td>&#8470;Stock</td>
			
				
				<td colspan="2">Opciones</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['IdProducto']; ?></td>
					<td><?php echo $fila['Nombre']; ?></td>
					<td><?php echo $fila['marca']; ?></td>
                    <td><?php echo $fila['precio']; ?></td>
                    <td><?php echo $fila['stock']; ?></td>
					
					
					<td><a href="updateP.php?IdProducto=<?php echo $fila['IdProducto']; ?>"  class="btn__update" >&#9935;Editar</a></td>
					<td><a href="deleteP.php?IdProducto=<?php echo $fila['IdProducto']; ?>" class="btn__delete">&#9986;Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>
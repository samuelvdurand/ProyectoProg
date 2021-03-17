<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM empleados ORDER BY idEmp');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM empleados WHERE Nombre LIKE :campo OR Apellido LIKE :campo;'
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
	<title>Empleados</title>
	<link rel="stylesheet" href="estiloFerretera.css">
</head>
<body>
	<div class="contenedor">
		<h2>Empleados de ferreteria</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="&#128269;Buscar nombre o apellido" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="&#128269;Buscar">
				<a href="insert.php" class="btn btn__nuevo">&#128100;Nuevo</a>
				
			</form>
		</div>
		<table>
			<tr class="head">
				<td>&#128100;IdEmpleado</td>
				<td>&#128100;Nombre</td>
				<td>&#128100;Apellido</td>
				<td>&#128231;Correo</td>
				<td>&#128100;Puesto</td>
				
				<td colspan="2">Opciones</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['IdEmp']; ?></td>
					<td><?php echo $fila['Nombre']; ?></td>
					<td><?php echo $fila['Apellido']; ?></td>
					<td><?php echo $fila['correo']; ?></td>
					<td><?php echo $fila['Puesto']; ?></td>
					
					<td><a href="update.php?IdEmp=<?php echo $fila['IdEmp']; ?>"  class="btn__update" >&#9935;Editar</a></td>
					<td><a href="delete.php?IdEmp=<?php echo $fila['IdEmp']; ?>" class="btn__delete">&#9986;Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>
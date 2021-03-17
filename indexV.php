<?php
	include_once 'conexion.php';


  	$sentencia_select=$con->prepare('SELECT *FROM ventas ORDER BY idventas');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM ventas WHERE Nombre LIKE :campo;'
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
		<h2>Ventas de ferreteria</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="&#128269;Buscar por nombre de empleado" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="&#128269;Buscar">
				<a href="insertV.php" class="btn btn__nuevo">&#128100;Nuevo</a>
				
			</form>
		</div>
		<table>
			<tr class="head">
				<td>&#128100;ID de Venta</td>
				<td>&#127991;Total</td>
                <td>&#128100;ID de Empleado</td>
                <td>&#128100;Nombre</td>
				
				<td colspan="2">Opciones</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['idventas']; ?></td>
					<td><?php echo $fila['Total']; ?></td>
                    <td><?php echo $fila['IdEmp']; ?></td>
                    <td><?php echo $fila['Nombre']; ?></td>
					
					
					<td><a href="updateV.php?idventas=<?php echo $fila['idventas']; ?>"  class="btn__update" >&#9935;Editar</a></td>
					<td><a href="deleteV.php?idventas=<?php echo $fila['idventas']; ?>" class="btn__delete">&#9986;Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>
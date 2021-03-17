<?php
	include_once 'conexion.php';

	if(isset($_GET['IdEmp'])){
		$id=(int) $_GET['IdEmp'];

		$buscar_id=$con->prepare('SELECT * FROM empleados WHERE IdEmp=:IdEmp LIMIT 1');
		$buscar_id->execute(array(
			':IdEmp'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: index.php');
	}


	if(isset($_POST['guardar'])){
		$nombre=$_POST['Nombre'];
		$apellido=$_POST['Apellido'];
		$correo=$_POST['correo'];
		$puesto=$_POST['Puesto'];
		$id=(int) $_GET['IdEmp'];

		if(!empty($nombre) && !empty($apellido)&& !empty($correo) && !empty($puesto) ){
			if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_update=$con->prepare(' UPDATE empleados SET  
					Nombre=:nombre,
					Apellido=:apellido,
					correo=:correo,
					Puesto=:puesto
					
					WHERE IdEmp=:IdEmp;'
				);
				$consulta_update->execute(array(
					':nombre' =>$nombre,
					':apellido' =>$apellido,
					':correo' =>$correo,
					':puesto' =>$puesto,
					':IdEmp' =>$id
				));
				header('Location: index.php');
			}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Empleado</title>
	<link rel="stylesheet" href="estiloFerretera.css">
</head>
<body>
	<div class="contenedor">
		<h2>Modificar Datos</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="Nombre" value="<?php if($resultado) echo $resultado['Nombre']; ?>" class="input__text">
				<input type="text" name="Apellido" value="<?php if($resultado) echo $resultado['Apellido']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="correo" value="<?php if($resultado) echo $resultado['correo']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="Puesto" value="<?php if($resultado) echo $resultado['Puesto']; ?>" class="input__text">
			</div>
			
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>

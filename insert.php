<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$nombre=$_POST['Nombre'];
		$apellido=$_POST['Apellido'];
		$correo=$_POST['correo'];
		$puesto=$_POST['Puesto'];
		
	

		if(!empty($nombre) && !empty($apellido)&& !empty($correo) && !empty($puesto) ){
			if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_insert=$con->prepare('INSERT INTO empleados(Nombre,Apellido,correo,Puesto) VALUES (:nombre,:apellido,:correo,:puesto)');
				$consulta_insert->execute(array(
					':nombre' =>$nombre,
					':apellido' =>$apellido,
					':correo' =>$correo,
					':puesto' =>$puesto
					
					
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
	<title>Nuevo Empleado</title>
	<link rel="stylesheet" href="estiloFerretera.css">
</head>
<body>
	<div class="contenedor">
		<h2>Empleados</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="Nombre" placeholder="&#128100;Nombre" class="input__text">
				<input type="text" name="Apellido" placeholder="&#128100;Apellidos" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="correo" placeholder="&#128231;Correo electrónico" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="Puesto" placeholder="&#128100;puesto" class="input__text">
				
			</div>
			
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>

<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$Total=$_POST['Total'];
        $IdEmpleado=$_POST['IdEmp'];
        $nombre=$_POST['Nombre'];

		
		
	

		if(!empty($Total) && !empty($IdEmpleado)&& !empty($nombre)){
			$consulta_insert=$con->prepare('INSERT INTO ventas(Total,IdEmp,Nombre) VALUES (:total,:idemp,:nombre)');
				$consulta_insert->execute(array(
					':total' =>$Total,
                    ':idemp' =>$IdEmpleado,
                    ':nombre' =>$nombre
                    
				
					
					
				));
				header('Location: indexV.php');
			}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Ventas</title>
	<link rel="stylesheet" href="estiloFerretera.css">
</head>
<body>
	<div class="contenedor">
		<h2>Ventas</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="Total" placeholder="&#128100;Total" class="input__text">
                <input type="text" name="IdEmp" placeholder="&#128100;Identificacion de empleado" class="input__text">
                <input type="text" name="Nombre" placeholder="&#128100;Nombre de empleado " class="input__text">
			</div>
			<div class="btn__group">
				<a href="indexV.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>

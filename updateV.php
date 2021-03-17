<?php
	include_once 'conexion.php';

	if(isset($_GET['idventas'])){
		$id=(int) $_GET['idventas'];

		$buscar_id=$con->prepare('SELECT * FROM ventas WHERE idventas=:idventas LIMIT 1');
		$buscar_id->execute(array(
			':idventas'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: indexV.php');
	}


	if(isset($_POST['guardar'])){
        $Total=$_POST['Total'];
		$IdEmpleado=$_POST['IdEmp'];
		$nombre=$_POST['Nombre'];
		$id=(int) $_GET['idventas'];

		if( !empty($Total)&& !empty($IdEmpleado)&& !empty($nombre)){
			$consulta_update=$con->prepare(' UPDATE ventas SET  
					Total=:total,
                    IdEmp=:idemp,
					Nombre=:nombre
					
					WHERE idventas=:idventas;'
				);
				$consulta_update->execute(array(
					
					':total' =>$Total,
                    ':idemp' =>$IdEmpleado,
                    ':nombre' =>$nombre,
					':idventas' =>$id
				));
				header('Location: indexV.php');
			
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Ventas </title>
	<link rel="stylesheet" href="estiloFerretera.css">
</head>
<body>
	<div class="contenedor">
		<h2>Modificar Datos</h2>
		<form action="" method="post">
			<div class="form-group">
            <input type="text" name="Total" value="<?php if($resultado) echo $resultado['Total']; ?>" class="input__text">
            <input type="text" name="IdEmp" value="<?php if($resultado) echo $resultado['IdEmp']; ?>" class="input__text">
		  <input type="text" name="Nombre" value="<?php if($resultado) echo $resultado['Nombre']; ?>" class="input__text">
				</div>	
			<div class="btn__group">
				<a href="indexV.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>

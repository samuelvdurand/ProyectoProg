<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$nombre=$_POST['Nombre'];
		$marca=$_POST['marca'];
        $precio=$_POST['precio'];
        $stock=$_POST['stock'];
        
		
	

		if(!empty($nombre) && !empty($marca)&& !empty($precio)&& !empty($stock)){
			
				$consulta_insert=$con->prepare('INSERT INTO producto(Nombre,marca,precio,stock) VALUES (:nombre,:marca,:precio,:stock)');
				$consulta_insert->execute(array(
					':nombre' =>$nombre,
					':marca' =>$marca,
                    ':precio' =>$precio,
                    ':stock'=>$stock
					
					
					
				));
				header('Location: indexP.php');
			
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Producto</title>
	<link rel="stylesheet" href="estiloFerretera.css">
</head>
<body>
	<div class="contenedor">
		<h2>Nuevo Producto</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="Nombre" placeholder="&#128100;Nombre" class="input__text">
				<input type="text" name="marca" placeholder="&#128100;marca" class="input__text">
			</div>
			<div class="form-group">
                <input type="text" name="precio" placeholder="&#127991;precio" class="input__text">
                <input type="text" name="stock" placeholder="&#8470;stock" class="input__text">
			</div>
			
			
			<div class="btn__group">
				<a href="indexP.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>

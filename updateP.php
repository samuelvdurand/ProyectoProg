<?php
	include_once 'conexion.php';

	if(isset($_GET['IdProducto'])){
		$id=(int) $_GET['IdProducto'];

		$buscar_id=$con->prepare('SELECT * FROM producto WHERE IdProducto=:IdProducto LIMIT 1');
		$buscar_id->execute(array(
			':IdProducto'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: indexP.php');
	}


	if(isset($_POST['guardar'])){
		$nombre=$_POST['Nombre'];
		$marca=$_POST['marca'];
        $precio=$_POST['precio'];
        $stock=$_POST['stock'];
		$id=(int) $_GET['IdProducto'];

		if(!empty($nombre) && !empty($marca)&& !empty($precio)&& !empty($stock)){
			$consulta_update=$con->prepare(' UPDATE producto SET  
					Nombre=:nombre,
					marca=:marca,
					precio=:precio,
                    stock=:stock,
			
					
					WHERE IdProducto=:IdProducto;'
				);
				$consulta_update->execute(array(
					':nombre' =>$nombre,
					':marca' =>$marca,
                    ':precio' =>$precio,
                    ':stock'=>$stock,
					':IdProducto' =>$id
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
	<title>Editar Producto</title>
	<link rel="stylesheet" href="estiloFerretera.css">
</head>
<body>
	<div class="contenedor">
		<h2>Modificar Datos</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="Nombre" value="<?php if($resultado) echo $resultado['Nombre']; ?>" class="input__text">
                <input type="text" name="marca" value="<?php if($resultado) echo $resultado['marca']; ?>" class="input__text">
                <input type="text" name="precio" value="<?php if($resultado) echo $resultado['precio']; ?>" class="input__text">
                <input type="text" name="stock" value="<?php if($resultado) echo $resultado['stock']; ?>" class="input__text">
			</div>
	        <div class="btn__group">
				<a href="indexP.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>

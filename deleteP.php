<?php 

	include_once 'conexion.php';
	if(isset($_GET['IdProducto'])){
		$id=(int) $_GET['IdProducto'];
		$delete=$con->prepare('DELETE FROM producto WHERE IdProducto=:IdProducto');
		$delete->execute(array(
			':IdProducto'=>$id
		));
		header('Location: indexP.php');
	}else{
		header('Location: indexP.php');
	}
 ?>
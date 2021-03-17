<?php 

	include_once 'conexion.php';
	if(isset($_GET['idventas'])){
		$id=(int) $_GET['idventas'];
		$delete=$con->prepare('DELETE FROM ventas WHERE idventas=:idventas');
		$delete->execute(array(
			':idventas'=>$id
		));
		header('Location: indexV.php');
	}else{
		header('Location: indexV.php');
	}
 ?>
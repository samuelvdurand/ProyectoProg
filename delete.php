<?php 

	include_once 'conexion.php';
	if(isset($_GET['IdEmp'])){
		$id=(int) $_GET['IdEmp'];
		$delete=$con->prepare('DELETE FROM empleados WHERE IdEmp=:IdEmp');
		$delete->execute(array(
			':IdEmp'=>$id
		));
		header('Location: index.php');
	}else{
		header('Location: index.php');
	}
 ?>
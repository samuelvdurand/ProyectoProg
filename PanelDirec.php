<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilLog.css">
    <title>Panel de direccion</title>
</head>

<body>
  
        <form action="#"method="POST" >
            <h1>Hola Administrador </h1>
            <a href="CerrarSesion.php">CerrarSesion</a>
            <input type="submit" name= "btn1" value="Empleados">
            <input type="submit"name= "btn2" value="Productos">
          <input type="submit"name= "btn3" value="Ventas">
        </form>
          
    </div>
</body>

</html>
<?php
$btn1="";
$btn2="";
$btn3="";


if(isset($_POST['btn1']))$btn1=$_POST['btn1'];
if(isset($_POST['btn2']))$btn2=$_POST['btn2'];
if(isset($_POST['btn3']))$btn3=$_POST['btn3'];

  if ($btn1) {
      header('location:index.php');
  }
  if($btn2){
    header('location:indexP.php');
  }
  if($btn3){
    header('location:indexV.php');
  } 
 
?>
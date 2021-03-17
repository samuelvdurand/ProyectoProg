<?php
    include_once 'conexion.php';
    session_start();
    if(isset($_GET['cerrar_sesion'])){
       session_unset();
        session_destroy();
    }
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location:index.php');
            break;
            case 2:
                header('location:indexP.php');
            break;
            
            default:
        }
    }
    if(isset($_POST['usuario']) && isset($_POST['clave'])){
        $usuario=$_POST['usuario'];
        $clave=$_POST['clave'];
        
        $query=$con->prepare('SELECT*FROM usuarios Where usuario =:usuario AND clave = :clave');
        $query->execute(['usuario'=>$usuario,'clave'=>$clave]);
        $row=$query->fetch(PDO::FETCH_NUM);
        if($row==true){
          $rol=$row[3];
           $_SESSION['rol']=$rol;
           switch($_SESSION['rol']){
            case 1:
                header('location:PanelDirec.php');
            break;
           case 2:
            header('location:indexP.php');
           break;
            
            default:
           }
        }else{
            echo "el usuario no se encontro";
        }

    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilLog.css">
    <title>LOGIN</title>
</head>

<body>
  
        <form action="#"method="POST" >
            <h1>Login</h1>
          <input type="text"placeholder= "&#9919; Usuario"name="usuario">
          <input type="password"placeholder= "&#9919; Password"name="clave">
          <input type="submit" value="Ingresar">
        </form>
    </div>
</body>

</html>
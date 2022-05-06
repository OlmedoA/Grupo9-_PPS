<?php

session_start();

$dbhost="localhost";
  $dbuser="root";
  $dbpass="";
  $dbname="users";
  
  $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
  if(!$conn)
  {
    die("No hay conexión: ".mysqli_connect_error());
  }


if(isset($_SESSION['nombredelusuario']))
{
  $nom = $_SESSION['nombredelusuario'];
  $pass = $_SESSION['contrausuario'];
}
else
{
  header('location: login.php');
}

if(isset($_POST['btncerrar']))
{
  session_destroy();
  header('location: login.php');
  $query=mysqli_query($conn,"UPDATE login SET access = 0 where usuario = '".$nom."' and password = '".$pass."'");

}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JACE-SERVICIOS INFORMÁTICOS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="image/png" href="./img/logoicon.png"> 
    <script src="https://kit.fontawesome.com/9d17348d99.js" crossorigin="anonymous"></script>
</head>
<body>
    <!--contiene el logo y el incio de sesion del usuario-->
    <div class="container-fluid">
        <div class="row justify-content-center align-content-center">
            <div class="col-8 barra">
                <img src="img/logo.png" alt="" width="90" height="90"> JACE-SI
                <!--<h4 class="text-light" style="padding-right: 5px;">JACE-SI</h4>-->
            </div>
            <div class="col-4 text-right barra">
                <ul class="navbar-nav mr-auto">
                    <li>
                        <a href="#" class="px-3 text-light perfil dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle user"></i></a>

                        <div class="dropdown-menu" aria-labelledby="navbar-dropdown">
                            <form method="POST">
                            <button class="dropdown-item menuperfil cerrar" type="submit" name="btncerrar"><i class="fas fa-sign-out-alt m-1"></i>Salir
                            </button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php

session_start();

$dbhost="localhost";
  $dbuser="root";
  $dbpass="";
  $dbname="budgetsys";
  
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
  header('location: index.php');
  $query=mysqli_query($conn,"UPDATE login SET access = 0 where usuario = '".$nom."' and password = '".$pass."'");

}
?>
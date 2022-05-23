<?php

session_start();

				$dbhost="localhost";
				$dbuser="root";
				$dbpass="";
				$dbname="jacesi";
  
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
  echo "<script>window.location= './login.php'; </script>";
}

if(isset($_POST['btncerrar']))
{
  session_destroy();
  $query=mysqli_query($conn,"UPDATE login SET access = 0 where usuario = '".$nom."' and password = '".$pass."'");
  echo "<script>window.location= './index.php'; </script>";
}
?>


<?php

session_start();
if(isset($_SESSION['nombredelusuario']))
{
	header('location: menu.php');
}

if(isset($_POST['btningresar']))
{
	
	$dbhost="localhost";
	$dbuser="javi02";
	$dbpass="Jace2010";
	$dbname="javi02_budgetsys";
	
	$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	if(!$conn)
	{
		die("No hay conexión: ".mysqli_connect_error());
	}
	
	$nombre=$_POST['txtusuario'];
	$pass=$_POST['txtpassword'];
	
	$queryusuario= mysqli_query($conn, "SELECT * FROM login WHERE usuario ='" . $nombre . "'");
	$nr          = mysqli_num_rows($queryusuario);
	
	//llamada a la contraseña
	$buscarpass  = mysqli_fetch_array($queryusuario);
	$var = $buscarpass['password'];

	//desencriptar contraseña
	if(($nr== 1)&& (password_verify($pass,$buscarpass['password'])))
	{
		
		if(!isset($_SESSION['nombredelusuario']))
		{
			
			if($nr == 1)
			{
				$sql= mysqli_query($conn, "SELECT access FROM login WHERE usuario = '".$nombre."' and password = '".$buscarpass['password']."' and access = 0");
				$result = mysqli_num_rows($sql);
				

				

				if($result == 0){

					echo "<script>alert('Usuario en uso'); window.location= './login.php'; </script>";
				}
				else if ($result == 1){
					$_SESSION['nombredelusuario'] = $nombre;
					$_SESSION['contrausuario'] = $buscarpass['password'];
				
					$query=mysqli_query($conn,"UPDATE login SET access = 1 where usuario = '".$nombre."' and password = '".$buscarpass['password']."'");
					echo "<script>window.location= './menu.php'; </script>";
				}
			}
			else if ($nr == 0)
			{
				echo "<script>alert('Usuario no existe'); window.location= './login.php'; </script>";
			}
		
		}
	}
}
?>
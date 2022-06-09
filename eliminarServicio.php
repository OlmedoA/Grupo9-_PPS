<?php
//conecto con la base de datos
$conexion = new mysqli("localhost","root","","jacesi");
$descrip = $_GET['Descrip'];
//elimino el usuario
$eliminar = "DELETE FROM servicios WHERE Descrip = '$descrip' ";
$eliminar = $conexion->query($eliminar);
header("Location: bajaServicios.php");
$conexion->close();
?>
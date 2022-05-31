<?php
//conecto con la base de datos
$conexion = new mysqli("localhost","root","","users");
$usuario = $_GET['usuario'];
//elimino el usuario
$eliminar = "DELETE FROM login WHERE usuario = '$usuario' ";
$eliminar = $conexion->query($eliminar);
header("Location: bajaEmpleado.php");
$conexion->close();
?>
<?php

$conexion = new mysqli("localhost","root","","users");
$usuario = $_GET['usuario'];
$eliminar = "DELETE FROM login WHERE usuario = '$usuario' ";
$eliminar = $conexion->query($eliminar);
header("Location: bajaEmpleado.php");
$conexion->close();
?>
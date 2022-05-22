<?php
$servername = "localhost";
$database = "budgetsys";
$username = "root";
$password = "";
// crear conexion
$conn = mysqli_connect($servername, $username, $password, $database);
// revisar conexion
if (!$conn) {
    die("Coneccion fallida: " . mysqli_connect_error());
}
echo "coneccion correcto";

$consulta1 = "SELECT * FROM `proyecto` WHERE 1";
$resultado1= mysqli_query($conn, $consulta1);
$a = mysqli_fetch_assoc($resultado1);
mysqli_close($conn);
Echo "   ";
ECHO $a['Fecha'];
?>

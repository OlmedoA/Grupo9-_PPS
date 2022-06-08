<?php 
$servername = "localhost";
$database = "jacesi";
$username = "root";
$password = "";
// crear conexion
$conn = mysqli_connect($servername, $username, $password, $database);

//Recupero los valores del formulario

$Descrip = $_POST['Descrip'];
$Precio = $_POST['Precio'];

//verifico cuantas veces esta cargado el usuario en la BDD

$consulta = "select count(distinct Descrip) as nuevo from servicios where Descrip = '$Descrip'";

$resultado = mysqli_query($conn,$consulta);

while($a =mysqli_fetch_assoc($resultado)){
    $existe = $a['nuevo'];
}

// Estructura de decision
if($existe==1){
    header("Location: altaServicios.php?mensaje=uno");
}else{
    $alta = "insert into servicios values ('','$Descrip','$Precio')";
    $resultado_alta = mysqli_query($conn,$alta);

    header("Location: bajaServicios.php");                           
}

//cierro el formulario y recargo la pagina anterior

echo "<script languaje='javascript' type='text/javascript'>
window.opener.document.location.reload();self.close();
</script>";

echo "<script languaje='javascript' type='text/javascript'>
window.close();
</script>"

?>
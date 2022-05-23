<?php 

//archivo de conexion
include('session.php');

//Recupero los valores del formulario

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$mail = $_POST['mail'];
$fechaalta = $_POST['fechaalta'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];

//verifico cuantas veces esta cargado el usuario en la BDD

$consulta = "select count(distinct usuario) as nuevo from login where usuario = '$usuario'";

$resultado = mysqli_query($conn,$consulta);

while($a =mysqli_fetch_assoc($resultado)){
    $existe = $a['nuevo'];
}

// Estructura de decision
if($existe==1){
    header("Location: altaEmpleado.php?mensaje=uno");
}else{
    $alta = "insert into login values ('','$usuario','$password','$nombre','$apellido','$telefono','$mail','$fechaalta','')";
    $resultado_alta = mysqli_query($conn,$alta);

    header("Location: bajaEmpleado.php");                           
}

//cierro el formulario y recargo la pagina anterior

echo "<script languaje='javascript' type='text/javascript'>
window.opener.document.location.reload();self.close();
</script>";

echo "<script languaje='javascript' type='text/javascript'>
window.close();
</script>"

?>

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
$password = $_POST['contraseña'];
$password1 = $_POST['contraseña1'];

//las contraseñas con coinciden
if(!($password==$password1)){
    header("Location: miPerfil.php?mensaje=Las contraseña no coinciden");
                       
}




// Estructura de decision

    $encriptacion= password_hash($password,PASSWORD_DEFAULT);
    $modificacion = "UPDATE login set `usuario`='$usuario',`password`='$encriptacion',`nombre`='$nombre',`apellido`='$apellido',`telefono`='$telefono',`mail`='$mail',`fechaalta`='$fechaalta' where usuario='$usuario'";
    $resultado_alta = mysqli_query($conn,$modificacion);

    header("Location: miPerfil.php");                           


//cierro el formulario y recargo la pagina anterior

echo "<script languaje='javascript' type='text/javascript'>
window.opener.document.location.reload();self.close();
</script>";

echo "<script languaje='javascript' type='text/javascript'>
window.close();
</script>"

?>
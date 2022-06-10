<?php
//conecto con la base de datos
$servername = "localhost";
$database = "jacesi";
$username = "root";
$password = "";
// crear conexion
$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
   die("No hay conexión: ".mysqli_connect_error());
}

//traigo los datos del formulario
$id = $_POST['id'];
$descrip = $_POST['descrip'];
$precio = $_POST['precio'];
$boton = $_POST['boton'];

if($boton==0){ // si da este resultado no me efectua ningun cambio en la BD.
    header("Location: listaDeServicios.php");
   
}
else{ // si pasa por aca  efectua la query en la BD, modifica exitosamente la tabla y  me devuele a la seccion de lista de servicios 
    $editar = "update servicios set ID_Proced='$id', Descrip='$descrip',
     Precio='$precio' where ID_Proced ='$id'";
    
 $resultado_editar = mysqli_query($conn,$editar);
 

 header("Location: listaDeServicios.php");
}
?>
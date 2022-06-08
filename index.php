<?php
session_start();

// Detecta el envio de formulario
if(isset($_POST['btnconsulta'])){ 

    // Verifica si el captcha es correcto
    if(isset($_POST['captcha_challenge']) && $_POST['captcha_challenge'] == $_SESSION['captcha_text']){ 

        //Conexion con la base de datos

        $dbhost="localhost";
        $dbuser="root";
        $dbpass="";
        $dbname="jacesi";
  
        $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
        if(!$conn)
        {
           die("No hay conexión: ".mysqli_connect_error());
        }

        //Recupero los valores del formulario

        $nombre = $_POST['nombre'];
        $consulta = $_POST['consulta'];
        $telefono = $_POST['celular'];

        $alta = "INSERT INTO `consultas` (nombre, consulta, telefono) VALUES ('$nombre', '$consulta', '$telefono')";

        //verificacion en pantalla

        if(mysqli_query($conn,$alta))
        {
        //salio bien
        echo"<script>alert('Gracias por su consulta, $nombre, lo contactaremos a la brevedad');</script>";
        }else
        {
        //salio mal
        echo"Error: ".$alta."<br>".mysqli_error($conn);
        }                       
    }
    //Si el captcha es incorrecto
    else {
        echo"<script>alert('El captcha es incorrecto. Recuerde que es en MAYÚSCULAS');</script>";
    }

}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Jace-SI</title>
    <link rel="icon" type="image/png" href="./img/logoicon.png"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mesadeayuda.css">
    <script src="https://kit.fontawesome.com/9d17348d99.js" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <!--contiene el logo y el incio de sesion del usuario-->
    <div class="barrita container-fluid ">
        <?php require_once "superior.php" ?>
        
        </div>
        
        <!--formulario mesa de ayuda-->
        <form action=""  method="POST" class="row g-3 formStyle mx-auto py-4 px-4 form mesayuda">
            
            <div class="form">
            <!--logo-->
            <div class="col-12 jace" align="center">
                <img src="img/logo.png" alt="" class="imagen"> JACE-SI
            </div>
             <h1 class="titulito">Mesa de ayuda</h1>
            <div class="col-12">
                 <!--nombre, type text-->
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required="required" placeholder="Escriba su nombre">
            </div>
            <div class="col-12">
                 <!--celular, type tel-->
                <label for="celular" class="form-label">Número de Celular (sin espacios)</label>
                <input type="tel" class="form-control"  id="celular" name="celular" size="14" required="required" placeholder="Código de area sin 0 + celular sin prefijo 15"> <!-- pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}"--> 
            </div>  
            <!-- <div class="col-12">
             e-mail <label for="mail" class="form-label">Correo Electronico</label>
                <input type="email" class="form-control"  id="mail" name="mail" placeholder="Escriba correo valido"><br>
            </div> -->
            <div class="col-12">
                 <!--consulta, textarea-->
                <label for="consulta" class="form-label">Consulta</label>
                <textarea name="consulta" id="consulta" class="w-100"rows="4" required="required" placeholder="Escriba su consulta"></textarea><br><br>
            </div>                
           <!-- <div class="g-recaptcha" data-sitekey="site key"></div>   crear recaptcha y copiar la llave -->   
            <div class="col-12"  align="center">
                <label for="captcha" class="form-label">Resuelva el captcha para continuar</label><br>
                <img src="captcha.php" alt="CAPTCHA" class="captcha-image"><i class="fas fa-redo refresh-captcha"></i><br><br>
                <input type="text" id="captcha" name="captcha_challenge" required>
            </div>
            <!--boton para enviar a consultas.php-->
            <button class="btn btn-primary" name ="btnconsulta" type="submit">Enviar</button>
            </div>
        </form>
    </div>

     <!--importes para la  -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    
</body>
<footer>
    <div class="container-fluid">
        <div class="row justify-content-center align-content-center">
            <!--Copyright-->
            <div class="col-6">
                <div>
            &nbsp&nbsp &copy; Copyright <strong><span>Jace-SI</span></strong>
            </div>
            <!--links redes sociales-->
            </div>
            <div class="col-6 text-right">
                <div>
                <a class="link" href="https://api.whatsapp.com/send?phone=541166500636" target="_blank">
                    &nbsp&nbsp<i class="fab fa-whatsapp fa-2x" aria-hidden="true"></i>
                </a> 
                <a class="link" href="https://www.instagram.com/jace.si/" target="_blank">
                    &nbsp&nbsp<i class="fab fa-instagram fa-2x" aria-hidden="true"></i>
                </a> 
                <a class="link" href="https://www.facebook.com/jaceTutoriales" target="_blank">
                    &nbsp&nbsp<i class="fab fa-facebook fa-2x" aria-hidden="true"></i>
                </a> 
                <a class="link" href="https://twitter.com/JaceSI_" target="_blank">
                    &nbsp&nbsp<i class="fab fa-twitter fa-2x" aria-hidden="true" ></i>
                </a> 
                <a class="link" href="https://www.youtube.com/channel/UCIuEephCWSjFomnJONNnhsw" target="_blank">
                    &nbsp&nbsp<i class="fa fa-youtube fa-2x" aria-hidden="true"></i>&nbsp&nbsp
                </a> 
            </div>
            </div>
        </div>
    </div>        
</footer> 
<script type="text/javascript">   
    var refreshButton = document.querySelector(".refresh-captcha");
    refreshButton.onclick = function() {
    document.querySelector(".captcha-image").src = 'captcha.php?' + Date.now();
}
</script>

</html>
<?php
$secretkey = "secret key";
$nombre = "";
$telefono = "";
$mail= "";
$consulta = "";
if (isset($_POST["submit"])){
    $nombre = $_POST["nombre"];
    //$mail = $_POST["mail"];
    $telefono = $_POST["celular"];
    $consulta = $_POST["consulta"];
    $recaptchaResponse = $_POST["g-recaptcha-response"];

    $resp = "https://www.google.com/recaptcha/api/siteverify?secret={$secretkey}&response={$recaptchaResponse}";
    $content = file_get_contents($resp);
    $json = json_decode($content);
    
    if ($json-> success == "true"){
        $msj = "Hola {$nombre}, Ya enviamos su consulta";
    } else {
        $msj = "Reintente enviarlo de nuevo";
      
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
        <form action=""  method="POST" class="row g-3 formStyle mx-auto py-4 px-4 form">
            
            <div class="form">
            <div class="col-12 jace" align="center">
                <img src="img/logo.png" alt="" class="imagen"> JACE-SI
            </div>
             <h1>Mesa de ayuda</h1>
            <div class="col-12">
                 <!--nombre, type text-->
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required="required" placeholder="Escriba su nombre"><br>
            </div>
            <div class="col-12">
                 <!--celular, type tel-->
                <label for="celular" class="form-label">Número de Celular</label>
                <input type="tel" class="form-control"  id="celular" name="celular" size="14" required="required" placeholder="Escriba su número de celular xxx-xxxx-xxxx" pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}"><br>
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
             <!--boton-->
            <button class="btn btn-primary" name ="submit" type="submit">Enviar</button>
            </div>
        </form>
    </div>

    <footer>
        <div>
            <div>
            &nbsp&nbsp &copy; Copyright <strong><span>Jace-SI</span></strong>
            </div>
    <!--links redes sociales-->
            <div align="right">
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
    </footer> 
     <!--importes para la  -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    
</body>

</html>

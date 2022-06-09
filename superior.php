
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JACE-SERVICIOS INFORMÁTICOS</title>
    <script src="js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">    
    <link rel="icon" type="image/png" href="./img/logoicon.png"> 
    <script src="js/animacion.js" crossorigin="anonymous"></script> 
    <script src="https://kit.fontawesome.com/9d17348d99.js" crossorigin="anonymous"></script>  
</head>
<body>
    <!--contiene el logo y el incio de sesion del usuario-->
    <div class="container-fluid">
        <div class="row justify-content-center align-content-center">
            <div class="col-10 barra log">
                <img src="img/logo.png" alt="" class="imagen"> JACE-SI
                <!--<h4 class="text-light" style="padding-right: 5px;">JACE-SI</h4>-->
            </div>
            <div class="col-2 text-right barra">
                <ul class="navbar-nav mr-auto">
                    <li>
                        <a href="#" class="px-3 text-light perfil " id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle user"></i></a>

                        <!--opciones del usuario-->
                        <div class="dropdown-menu" aria-labelledby="navbar-dropdown">
                            <form method="POST">
                            <!--Ingresar-->
                            <a class="dropdown-item menuperfil entrar" href="login.php"><i class="fas fa-sign-in-alt m-1"></i>Ingresar
                            </a>
                            <!--Mi perfil-->
                            <?php
                                if($_SESSION['nombredelusuario'] != "Admin"){
                                    echo"<a class='dropdown-item menuperfil miperfil' href='miPerfil.php'><i class='fas fa-sign-in-alt m-1'></i>Mi perfil</a>";
                                }
                            ?>
							
                            <!--Registrar-->
                            <a class="dropdown-item menuperfil entrar" href="registrar.php"><i class="fas fa-sign-in-alt m-1"></i>Registrar
                            </a>
                            <!--boton para salir-->
                            <button class="dropdown-item menuperfil cerrar" type="submit" name="btncerrar"><i class="fas fa-sign-out-alt m-1"></i>Salir
                            </button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
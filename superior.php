<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JACE-SERVICIOS INFORMÁTICOS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://kit.fontawesome.com/9d17348d99.js" crossorigin="anonymous"></script>
</head>
<body>
    <!--contiene el logo y el incio de sesion del usuario-->
    <div class="container-fluid">
        <div class="row justify-content-center align-content-center">
            <div class="col-8 barra">
                <img src="img/logo.png" alt="" width="90" height="90"> JACE-SI
                <!--<h4 class="text-light" style="padding-right: 5px;">JACE-SI</h4>-->
            </div>
            <div class="col-4 text-right barra">
                <ul class="navbar-nav mr-auto">
                    <li>
                        <a href="#" class="px-3 text-light perfil dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle user"></i></a>

                        <div class="dropdown-menu" aria-labelledby="navbar-dropdown">
                            <a class="dropdown-item menuperfil cerrar" href="#"><i class="fas fa-sign-out-alt m-1"></i>Salir
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--barra lateral con las opciones-->
    <div class="container-fluid">
        <div class="row">
            <div class="barra-lateral col-12 col-sm-auto">
                
                <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
                    <a href="menu.php"><i class="fa-solid fa-house iconos"></i></i><span> Inicio</span></a> 
                    <a href="formPresupuesto.php"><i class="fa-solid fa-plus iconos"></i><span>Generar Presupuesto</span></a>
                    <a href=""><i class="fa-regular fa-file iconos"></i><span>Historial de Presupuestos</span></a>                   
                    <a href="mesaDeAyuda.html"><i class="fa-solid fa-table iconos"></i><span>Mesa de Ayuda</span></a>
                </nav>
            </div>
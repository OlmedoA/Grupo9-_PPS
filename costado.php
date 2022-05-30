<?php require_once "session.php" ?>
<!--barra lateral con las opciones-->

<div class="container-fluid">
    <div class="row">
        <div class="barra-lateral col-12 col-sm-auto">
            <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
                <a href="menu.php"><i class="fas fa-home"></i><span> Inicio</span></a>                    
                <li><a href="#" class="desplegarU"><i class="fa-solid fa-user-plus"></i></i><span> Usuarios <i class="fa-solid fa-chevron-down"></i></span></a>
                    <ul id="datos-usuario">
                        <li><a href="altaEmpleado.php"><span>Alta de Usuario</span></a></li>
                        <li><a href="bajaEmpleado.php"><span>Baja de Usuario</span></a></li>
                    </ul>
                    </li>
                    <a href="GenerarPresupuesto.php"><i class="fa-solid fa-plus"></i><span> Generar Presupuesto</span></a> 
                <li><a href="#" class="desplegarP"><i class="fa-regular fa-file"></i><span> Historial de Presupusto <i class="fa-solid fa-chevron-down"></i></span></a>
                <ul id="datos-presupuesto">
                    <li><a href="PresupuestosAprobados.php"><span>Aprobado</span></a></li>
                    <li><a href="PresupuestosDesaprobados.php"><span>Desaprobado</span></a></li>
                    <li><a href="PresupuestosPendientes.php"><span>Pendientes</span></a></li>
                </ul>
                </li>
               
            </nav>
        </div>

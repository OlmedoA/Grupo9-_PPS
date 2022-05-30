<?php require_once "session.php" ?>
<!--barra lateral con las opciones-->

        <div class="container-fluid">
            <div class="row">
                <div class="barra-lateral col-12 col-sm-auto">
                    
                    <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">                 
                        <ul  style="list-style: none;">
                            <li><a href="menu.php"><i class="fa-solid fa-house iconos"></i><span>Inicio</span></a></li>
        
                            <li><a href="GenerarPresupuesto.php"><i class="fa-solid fa-plus iconos"></i><span>Generar Presupuesto</span></a></li>
        
                            <li><a href="#"><i class="fa-regular fa-file iconos" ></i><span>Historial de Presupuestos</span></a>
                                <ul  style="list-style: none;">
                                <li><a href="PresupuestosPendientes.php">Pendientes</a></li>
                                <li><a href="PresupuestosAprobados.php">Aprobados</a></li>
                                <li><a href="PresupuestosDesaprobados.php">Desaprobados</a></li>
                            </ul></li>
                            <li><a href="#"><i class="fa-regular fa-file iconos" ></i><span>Mesa de ayuda</span></a>
                                <ul  style="list-style: none;">
                                <li><a href="menu.php">Consultas</a></li>
                                <li><a href="">Lista de consultas respondidas</a></li>
                            </ul></li>
                            <li><a href="#"><i class="fa-regular fa-file iconos" ></i><span>Empleados</span></a>
                                <ul  style="list-style: none;">
                                <li><a href="altaEmpleado.php">Alta empleado</a></li>
                                <li><a href="bajaEmpleado.php">Lista de empleados</a></li>
                            </ul></li>
                        </ul>
                    </nav>
                </div>
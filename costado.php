<?php require_once "session.php" ?>
<!--barra lateral con las opciones-->

        <div class="container-fluid">
            <div class="row">
                <div class="barra-lateral col-12 col-sm-auto">
                    
                    <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">                 
                        <ul  style="list-style: none;">
        
                            <li><a href="GenerarPresupuesto.php"><i class="fa-solid fa-plus iconos"></i><span>Generar Presupuesto</span></a></li>
        
                            <li><a href="#"><i class="fa-regular fa-file iconos" ></i><span>Historial de Presupuestos</span></a>
                                <ul  style="list-style: none;">
                                <li><a href="PresupuestosPendientes.php">Pendientes</a></li>
                                <li><a href="PresupuestosAprobados.php">Aprobados</a></li>
                                <li><a href="PresupuestosDesaprobados.php">Desaprobados</a></li>
                            </ul></li>
                            <li><a href="#"><i class="fa-regular fa-file iconos" ></i><span>Mesa de ayuda</span></a>
                                <ul  style="list-style: none;">
                                <li><a href="consultas.php">Consultas</a></li>
                                <li><a href="">Lista de consultas respondidas</a></li>
                            </ul></li>
                            <?php
			   if($_SESSION['nombredelusuario']=="Admin"){
				   echo" <li><a href='#' class='desplegarU'><i class='fa-solid fa-user-plus'></i></i><span> Empleados</span></a>
                    <ul id='datos-usuario'>
                        <li><a href='altaEmpleado.php'><span>Alta de Empleados</span></a></li>
                        <li><a href='bajaEmpleado.php'><span>Baja de Empleados</span></a></li>
                    </ul>
                    </li>";
			   }
			   
			   ?>
               
            </nav>
        </div>


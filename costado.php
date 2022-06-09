<?php require_once "session.php" ?>
<!--barra lateral con las opciones-->
        <div class="container-fluid">
		<i onclick="myFunction()" id="boton" class="fas fa-bars btn_menu0"></i>
            <div class="row">
			

                <div id="myDIV" class="barra-lateral col-12 col-sm-auto" style="display: none;">
                    <!--nav bar-->
                    <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">   

                    <i onclick="myFunction()" class="fas fa-bars btn_menu"></i>
                        <!--lista-->              
                        <ul>
                        <!--generar presupuesto-->
                            <li><a href="GenerarPresupuesto.php"><i class="fa-solid fa-plus iconos"></i><span>Generar Presupuesto</span></a></li>

                        <!--Historial de presupuesto-->
                            <li><a href="#" id="titulo"><i class="fa-regular fa-file iconos" ></i><span>Historial de Presupuestos</span></a>
                                <ul>
                                <li><a href="PresupuestosPendientes.php">Pendientes</a></li>
                                <li><a href="PresupuestosAprobados.php">Aprobados</a></li>
                                <li><a href="PresupuestosDesaprobados.php">Desaprobados</a></li>
                            </ul></li>

                        <!--Consultas Mesa de ayuda-->
                            <li><a href="#" id="titulo"><i class="fa-regular fa-comment-dots iconos"></i><span>Mesa de ayuda</span></a>
                                <ul >
                                <li><a href="consultas.php">Consultas</a></li>
                                <li><a href="listaConsultas.php">Lista de consultas respondidas</a></li>
                            </ul></li>

                         <!--Servicios-->
                         <li><a href="#" id="titulo"><i class="fa-regular fa-computer iconos"></i><span>Servicios</span></a>
                                <ul >
                                    <li><a href="altaServicios.php">Alta de servicio</a></li>
                                <li><a href="bajaServicios.php">Lista de servicio</a></li>
                            </ul></li>

                        <!--Alta y baja de Empleados, solo visible por el admin-->
                            <?php
			   if($_SESSION['nombredelusuario']=="Admin"){
				   echo" <li><a href='#' class='desplegarU' id='titulo'><i class='fa-solid fa-user-plus iconos'></i></i><span> Empleados</span></a>
                    <ul id='datos-usuario'>
                        <li><a href='altaEmpleado.php'><span>Alta de Empleados</span></a></li>
                        <li><a href='bajaEmpleado.php'><span>Baja de Empleados</span></a></li>
                    </ul>
                    </li>";
			   }
			   
			   ?>
               
            </nav>
        </div>




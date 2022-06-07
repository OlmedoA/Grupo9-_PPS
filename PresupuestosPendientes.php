<?php require_once "superior.php"?>
<?php require_once "costado.php"?>
<?php require_once "session.php" ?>

<!--tabla de presupuestos-->
<main class="main col">
   <div class="container">
      <table class="table col-12">
         <h1 class="encabezado">Presupuestos Pendientes</h1>
            <thead>
               <tr>
                  <!--columnas-->
                  <th scope="col">Título</th>      
                  <th scope="col">Fecha de realización</th>
                  <th scope="col">Fecha de vencimiento</th>
                  <th scope="col">Creado por</th>
                  <th scope="col">Acciones</th>      
               </tr>         
            </thead>
            <tbody>
               <?php 
                  //conexion con la base de datos
                  $servername = "localhost";
                  $database = "jacesi";
                  $username = "root";
                  $password = "";
                  // crear conexion
                  $conn = mysqli_connect($servername, $username, $password, $database);
                  if(!$conn){
                     die("No hay conexión: ".mysqli_connect_error());
                  }   
                  //toma los datos de la tabla cerrados
                  $sql = "SELECT * FROM cerrados WHERE estado = 'Pendiente' GROUP BY titulo";
                  $res = mysqli_query($conn, $sql);           
                  while ($row=mysqli_fetch_object($res)){
                  $titulo=$row->titulo;
                  $fecha=$row->fecha;
                  $formateo = DateTime::createFromFormat('Y-m-d', $fecha);
                  $formateofecha = $formateo->format('d/m/Y');
                  $por=$row->creado_por;
                  $hasta = date("d/m/Y",strtotime($fecha."+ 2 weeks"))
     
                  ?>

                  <tr>
                     <th scope="row" data-label="Título" name="titulo" id="titulo"><?php echo $titulo; ?></th>
                     <td data-label="Fecha de realización"><?php echo $formateofecha; ?></td>
                     <td data-label="Fecha de vencimiento"><?php echo $hasta; ?></td>
                     <td data-label="Creado por"><?php echo $por; ?></td>
                     <td data-label="Acciones">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editar"><i class="fa-solid fa-pencil"></i></button>
                        <button type="button" class="btn btn-warning"><i class="fa-solid fa-download"></i></button>
                        <button type="button" class="btn btn-success"><i class="fa-solid fa-check"></i></button>
                        <button type="button" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></i></button>
                     </td>
                  </tr>   
               <?php
               }
               ?> 
            </tbody>
      </table>
   </div>

   <!-- Modal -->
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <?php 
            $titulo=$_GET['titulo'];
         ?>  
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Editar <?php echo $titulo;?></h5>
            <button type="button" class="close" data-dismiss="modal" >
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
            <form method="POST" >
               <div class="modal-body">
                  <?php 
                  //conexion con la base de datos
                  $servername = "localhost";
                  $database = "jacesi";
                  $username = "root";
                  $password = "";
                  // crear conexion
                  $conn = mysqli_connect($servername, $username, $password, $database);
                  if(!$conn){
                     die("No hay conexión: ".mysqli_connect_error());
                  }   
                  //toma los datos de la tabla cerrados
                  $sql = "SELECT * FROM cerrados WHERE titulo = '$titulo'";
                  $res = mysqli_query($conn, $sql);           
                  while ($row=mysqli_fetch_object($res)){
                     $titulo=$row->titulo;
                     $cel_cliente=$row->cel_cliente;
                     $servicio=$row->servicio;
                     $cantidad=$row->cantidad;

                     ?>
                  <div class="col-12">
                     <label for="titulo" class="form-label">Titulo Presupuesto</label>
                     <input type="text" class="form-control"  id="title" name="title" value="<?php echo $titulo; ?>">
                     <br>
                  </div>
                  <div class="col-12">
                     <label for="celular" class="form-label">Número de Celular del Cliente</label>
                     <input type="tel" class="form-control"  id="celular" name="celular" value="<?php echo $cel_cliente; ?>">
                     <br>
                  </div>
                  <div class="col-12">
                  <!--servicio-->
                  <label for="servicio" class="form-label">Servicio</label>
                  <select id="inputState" class="form-select form-control" name="servicio">
                  <option selected><?php echo $servicio; ?></option>
                  <?php
                  $conn = mysqli_connect($servername, $username, $password, $database);
                  $queryservicios= mysqli_query($conn,"SELECT * FROM `servicios`");
                  $nr = mysqli_num_rows($queryservicios);
                  foreach ($queryservicios as  $I){
                     $opcion=$I['Descrip'];
                     echo"<option>$opcion</option>";
                     }
                  ?>
                  </select>
                  <div class="col-12">
                     <label for="celular" class="form-label">Cantidad</label>
                     <input type="tel" class="form-control"  id="celular" name="celular" value="<?php echo $cantidad; ?>">
                     <br>
                  </div>
                  <?php
                  }
                  ?>
            </div>
            <div class="modal-footer">
               <button class="btn btn-primary" type="submit" name="cambiar">Guardar</button>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
            </div>
         </form>
      </div>
   </div>
</div>
</main>

<?php require_once "inferior.php"?>
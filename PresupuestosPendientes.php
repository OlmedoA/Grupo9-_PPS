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
                     <th scope="row" data-label="Título" name="titulo"><?php echo $titulo; ?></th>
                     <td data-label="Fecha de realización"><?php echo $formateofecha; ?></td>
                     <td data-label="Fecha de vencimiento"><?php echo $hasta; ?></td>
                     <td data-label="Creado por"><?php echo $por; ?></td>
                     <td data-label="Acciones">
                        <a href="update.php?titulo=<?php echo $titulo;?>"><button type="button" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></button></a>
                        <a href="./print/print.php?titulo=<?php echo $titulo;?>"><button type="button" class="btn btn-warning"><i class="fa-solid fa-download"></i></button></a>
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

</main>

<?php require_once "inferior.php"?>
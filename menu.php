<!-- pagina de inicio del empleado-->
<?php require_once "superior.php"?>
<?php require_once "costado.php"?>
<?php require_once "session.php" ?>
<main class="main col">
   <div class="container">
      <table class="table col-12">
         <h1 class="encabezado">Consultas</h1>
          <thead>
               <tr>
                  <th scope="col">Nombre</th>      
                  <th scope="col">Consulta</th>
                  <th scope="col">Télefono</th>  
                  <th scope="col">Atendido?</th>         
               </tr>         
          </thead>
          <tbody>
               <?php 
                  $dbhost = "localhost";
                  $dbuser = "root";
                  $dbpass = "";
                  $dbname = "jacesi";
                  $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);;
                  $sql = "SELECT * FROM consultas";
                  $res = mysqli_query($conn, $sql);           
                  while ($row=mysqli_fetch_object($res)){
                  $nombre=$row->nombre;
                  $consulta=$row->consulta;
                  $telefono=$row->telefono;
     
               ?>

               <tr>
                    <td scope="row" data-label="Nombre"><?php echo $nombre;?></td>
                    <td data-label="Consulta"><?php echo $consulta;?></td>
                    <td data-label="Telefono"><?php echo $telefono;?></td>
                    <td data-label="Eliminar">
                         <button type="button" class="btn btn-danger"><i class="fa-regular fa-check-can"></i></button>
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
<?php require_once "superior.php"?>
<?php require_once "costado.php"?>
<?php require_once "session.php" ?>
<?php
if (isset($_GET['id'])){
      $id=$_GET['id'];
      $servername = "localhost";
      $database = "jacesi";
      $username = "root";
      $password = "";
      // crear conexion
      $conn = mysqli_connect($servername, $username, $password, $database);
      $query = mysqli_query($conn,"UPDATE `consultas` SET `estado` = 'Contestado'  WHERE `id` = '$id'");  
    } 
?>
<!--tabla de presupuestos-->
<main class="main col">
   <div class="container">
      <table class="table col-12">
         <h1 class="encabezado">Lista de consultas</h1>
            <thead>
               <tr>
                  <!--columnas-->
                  <th scope="col">Nombre</th>      
                  <th scope="col">Consulta</th>
                  <th scope="col">Teléfono</th>      
               </tr>         
            </thead>
            <tbody>
               <?php 
               //conexion con la base de datos
                  $dbhost = "localhost";
                  $dbuser = "root";
                  $dbpass = "";
                  $dbname = "jacesi";
                  $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

                  //toma los datos de la tabla consultas
                  $sql = "SELECT * FROM consultas WHERE estado = 'Contestado'";
                  $res = mysqli_query($conn, $sql);           
                  while ($row=mysqli_fetch_object($res)){
                  $nombre=$row->nombre;
                  $consulta=$row->consulta;
                  $telefono=$row->telefono;
     
               ?>

               <tr>
                  <!--trae los datos y los muestra-->
                    <td scope="row" data-label="Nombre"><?php echo $nombre;?></td>
                    <td data-label="Consulta"><?php echo $consulta;?></td>
                    <td data-label="Telefono"><?php echo "<a href='https://api.whatsapp.com/send?phone=54$telefono'>$telefono</a>";?></td>
               </tr>   
                  <?php
                    }
                  ?>                 
          </tbody>
      </table>
   </div>
</main>

<?php require_once "inferior.php"?>
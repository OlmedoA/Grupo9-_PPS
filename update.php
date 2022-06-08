<?php require_once "superior.php"?>
<?php require_once "session.php" ?>
<?php
   if (isset($_GET['titulo'])){
      $titulo=$_GET['titulo'];
   } else {
      header("location:../PresupuestosPendientes.php");
   }
?>         
      <form method="POST" class="row g-3 formStyle mx-auto py-4 px-4 form">
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
               $sql = "SELECT titulo, cel_cliente FROM cerrados WHERE titulo = '$titulo'";
               $res = mysqli_query($conn, $sql); 
               $row = mysqli_fetch_object($res);
               $titulo=$row->titulo;
               $cel_cliente=$row->cel_cliente; 
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

               <?php 
               $query = "SELECT * FROM cerrados WHERE titulo = '$titulo'";
               $result = mysqli_query($conn, $query);
               while ($data=mysqli_fetch_object($result)){
                  $servicio=$data->servicio;
                  $cantidad=$data->cantidad;
               ?>
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
               </div>
               <div class="col-12">
                  <label for="celular" class="form-label">Cantidad</label>
                  <input type="tel" class="form-control"  id="cantidad" name="cantidad" value="<?php echo $cantidad; ?>">
                  <br>
               </div>
               <div class="col-12" align="center">
                  <button class="btn btn-primary" type="submit" name="cambiaruno">Cambiar</button>
                  <button class="btn btn-secondary" type="submit" name="eliminaruno">Eliminar</button>
               </div>
               <?php
               }
               ?>
            </div>
         <div class="modal-footer">
            <button class="btn btn-primary" type="submit" name="cambiartodos">Guardar</button>
            <button class="btn btn-primary" type="submit" name="agregarnuevo">Agregar nuevo</button>
            <a href="PresupuestosPendientes.php"><button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button></a>
         </div>
      </form>

<?php

   if(isset($_POST['cambiaruno'])){ 
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

      $titulo = $_POST['title'];
      $celular = $_POST['celular'];
      $servicio = $_POST['servicio'];
      $cantidad = $_POST['cantidad'];
      $subtotal = 0.00;
      $cons = mysqli_query($conn,"INSERT INTO `pretemp` (titulo, cel_cliente, servicio, cantidad, subtotal) VALUES ('$titulo', '$celular', '$servicio', '$cantidad', '$subtotal')");

      $query = "SELECT `Precio` FROM `servicios` WHERE `Descrip` = '$servicio'";
      $result = mysqli_query($conn, $query);           
      while ($row=mysqli_fetch_object($result)){
         $precio=$row->Precio;
         $query1 = mysqli_query($conn,"UPDATE `pretemp` SET `subtotal` = '$precio' * '$cantidad'  WHERE `servicio` = '$servicio'");
      }
      while ($table=mysqli_fetch_object($res)){
            $titulo=$table->titulo;
            $celular=$table->cel_cliente;
            $servicio=$table->servicio;
            $cantidad=$table->cantidad;
            $subtotal=$table->subtotal;
            $fecha=date("Y/m/d");
            $por=$_SESSION['nombredelusuario'];

      $unitario=0;
      $fecha=date("Y/m/d");
      $consulta = mysqli_query($conn,"UPDATE `cerrados` SET titulo = '$titulo', cel_cliente = '$celular', servicio = '$servicio', cantidad='$cantidad', unitario='$unitario', fecha='$fecha' WHERE servicio = '$servicio'");
      $sql = "SELECT `Precio` FROM `servicios` WHERE `Descrip` = '$servicio'";
      $response = mysqli_query($conn, $sql);           
      while ($row=mysqli_fetch_object($response)){
         $precio=$row->Precio;
         $consulta = mysqli_query($conn, "UPDATE `cerrados` SET `unitario` = '$precio'  WHERE `servicio` = '$servicio'");
         $consulta2 = mysqli_query($conn, "UPDATE `cerrados` SET `subtotal` = '$precio' * '$cantidad'  WHERE `servicio` = '$servicio'");
      }
   }
      
   if(isset($_POST['cambiartodos'])){ 
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

      $res = mysqli_query($conn, "SELECT * FROM pretemp WHERE titulo = '$titulo'");           
      while ($table=mysqli_fetch_object($res)){
         $titulo=$table->titulo;
         $celular=$table->cel_cliente;
         $servicio=$table->servicio;
         $cantidad=$table->cantidad;
         $unitario=0;
         $fecha=date("Y/m/d"); 

         $query = mysqli_query($conn,"UPDATE `cerrados` SET titulo = '$titulo', cel_cliente = '$celular', servicio='$servicio', cantidad='$cantidad', unitario='$unitario', fecha='$fecha' WHERE titulo = '$titulo'");

         $sql = "SELECT `Precio` FROM `servicios` WHERE `Descrip` = '$servicio'";
         $response = mysqli_query($conn, $sql);           
         while ($row=mysqli_fetch_object($response)){
            $precio=$row->Precio;
            $cons = mysqli_query($conn, "UPDATE `cerrados` SET `unitario` = '$precio'  WHERE `servicio` = '$servicio'");
            $cons2 = mysqli_query($conn,"UPDATE `cerrados` SET `subtotal` = '$precio' * '$cantidad'  WHERE `servicio` = '$servicio'");
         }
      }
   }

?>

<?php require_once "inferior.php"?>
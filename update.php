<?php require_once "superior.php"?>
<?php require_once "session.php" ?>
<?php
   if (isset($_GET['titulo'])){
      $titulo=$_GET['titulo'];
   } else {
      header("location: PresupuestosPendientes.php");
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
                  <label for="titulo" class="form-label">Título Presupuesto</label>
                  <input type="text" class="form-control"  id="title" name="title" value="<?php echo $titulo; ?>">
                  <br>
               </div>
               <div class="col-12">
                  <label for="celular" class="form-label">Número de Celular del Cliente</label>
                  <input type="tel" class="form-control"  id="celular" name="celular" value="<?php echo $cel_cliente; ?>">
                  <br>
               </div>

               <?php 
			   $con=0;
               $query = "SELECT * FROM cerrados WHERE titulo = '$titulo'";
               $result = mysqli_query($conn, $query);
               while ($data=mysqli_fetch_object($result)){
                  $servicio=$data->servicio;
                  $cantidad=$data->cantidad;
                  $cod=$data->cod;
				  $con=$con + 1;
				  $dato="servicio".$con."";
               ?>
               <div class="col-12">
               <!--servicio-->
               <label for="servicio" class="form-label">Servicio</label>
                <select id="inputState" class="form-select form-control" name="<?php echo $dato;?>" size="2" required>
               

               <option selected><?php echo $servicio; ?></option>
               <?php
			   
			   $dato2="cantidad".$con."";
			   $dato3="cambiar".$con."";
			   $dato4="cod".$con."";
			   $dato5="eliminaruno".$con."";
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
                  <input type="tel" class="form-control"  id="cantidad" name="<?php echo $dato2;?>" value="<?php echo $cantidad; ?>">
                  <br>
               </div>
			   <div class="col-12">
                  <input type="tel" class="form-control" style="display: none;"  id="cod" name="<?php echo $dato4;?>" value="<?php echo $cod; ?>">
                  <br>
               </div>
               <div class="col-12 botonesEditar">
			   
                  <button class="btn btn-primary" type="submit" name="<?php echo $dato3;?>">Cambiar</button>
                  <button class="btn btn-secondary" type="submit" name="<?php echo $dato5;?>">Eliminar</button>
               </div>
               <?php
               }
               ?>
            </div>
         <div class="modal-footer">
            <button class="btn btn-primary" type="submit" name="cambiartodos">cambiar todos</button>
            <a href="PresupuestosPendientes.php"><button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button></a>
         </div>
      </form>

<?php

//cambiar 1 solo
	$cont=0;
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
	
    $query = "SELECT * FROM cerrados WHERE titulo = '$titulo'";
    $result = mysqli_query($conn, $query);
    while ($data=mysqli_fetch_object($result)){
		$cont=$cont+1;
		$data1="cambiar".$cont."";
		$data2="servicio".$cont."";
		$data3="cantidad".$cont."";
		$data4="cod".$cont."";
	if(isset($_POST[''.$data1.''])){ 
	  $codi=$_POST[''.$data4.''];
      $titulo = $_POST['title'];
      $celular = $_POST['celular'];
      $servicio = $_POST[''.$data2.''];
      $cantidad = $_POST[''.$data3.''];
      $subtotal = 0.00;
      $cons = mysqli_query($conn,"INSERT INTO `pretemp` (id, titulo, cel_cliente, servicio, cantidad, subtotal) VALUES ('$codi','$titulo', '$celular', '$servicio', '$cantidad', '$subtotal')");

      $query = "SELECT `Precio` FROM `servicios` WHERE `Descrip` = '$servicio'";
      $result = mysqli_query($conn, $query);           
      while ($row=mysqli_fetch_object($result)){
         $precio=$row->Precio;
         $query1 = mysqli_query($conn,"UPDATE `pretemp` SET `subtotal` = '$precio' * '$cantidad'  WHERE `servicio` = '$servicio'");
      }
	  $res = mysqli_query($conn, "SELECT * FROM pretemp");           
        while ($table=mysqli_fetch_object($res)){
			
			
          //$titulo=$table->titulo;
          //$celular=$table->cel_cliente;
            $servicio=$table->servicio;
            $cantidad=$table->cantidad;
            $subtotal=$table->subtotal;
            $fecha=date("Y/m/d");
            $por=$_SESSION['nombredelusuario'];
            $unitario = 0;
			 $query = mysqli_query($conn,"UPDATE `cerrados` SET `servicio`='$servicio',`cantidad`='$cantidad',`unitario`='$unitario',`subtotal`='$subtotal',`estado`='Pendiente',`fecha`='$fecha',`creado_por`='$por' WHERE `cod`='$codi'");

            $sql = "SELECT `Precio` FROM `servicios` WHERE `Descrip` = '$servicio'";
            $response = mysqli_query($conn, $sql);           
            while ($row=mysqli_fetch_object($response)){
                $precio=$row->Precio;
                $cons = mysqli_query($conn, "UPDATE `cerrados` SET `unitario` = '$precio'  WHERE `servicio` = '$servicio'");
            }
        }
		$consulta = mysqli_query($conn,  "TRUNCATE TABLE pretemp");
		echo "<script>window.location= 'PresupuestosPendientes.php' </script>";
		}
		
	}

	 
//cambiar todos
$cont=0;
$data2="";
$data3="";
$data4="";
	 //conexion con la base de datos
	 if(isset($_POST['cambiartodos'])){ 
      $servername = "localhost";
      $database = "jacesi";
      $username = "root";
      $password = "";
      // crear conexion
      $conn = mysqli_connect($servername, $username, $password, $database);
      if(!$conn){
         die("No hay conexión: ".mysqli_connect_error());
      }
	

   for ($i = 1; $i <= $con; $i++){
		$cont=$cont+1;
		$data2="servicio".$cont."";
		$data3="cantidad".$cont."";
		$data4="cod".$cont."";
		
	  $codi=$_POST[''.$data4.''];
      $titulo = $_POST['title'];
      $celular = $_POST['celular'];
      $servicio = $_POST[''.$data2.''];
      $cantidad = $_POST[''.$data3.''];
      $subtotal = 0.00;
      $cons = mysqli_query($conn,"INSERT INTO `pretemp` (id, titulo, cel_cliente, servicio, cantidad, subtotal) VALUES ('$codi','$titulo', '$celular', '$servicio', '$cantidad', '$subtotal')");

      $query = "SELECT `Precio` FROM `servicios` WHERE `Descrip` = '$servicio'";
      $result = mysqli_query($conn, $query);           
      while ($row=mysqli_fetch_object($result)){
         $precio=$row->Precio;
         $query1 = mysqli_query($conn,"UPDATE `pretemp` SET `subtotal` = '$precio' * '$cantidad'  WHERE `servicio` = '$servicio'");
      }
	  $res = mysqli_query($conn, "SELECT * FROM pretemp");           
        while ($table=mysqli_fetch_object($res)){
			
			
            $titulo=$table->titulo;
            $celular=$table->cel_cliente;
            $servicio=$table->servicio;
            $cantidad=$table->cantidad;
            $subtotal=$table->subtotal;
            $fecha=date("Y/m/d");
            $por=$_SESSION['nombredelusuario'];
            $unitario = 0;
			 $query = mysqli_query($conn,"UPDATE `cerrados` SET `titulo`='$titulo',`cel_cliente`='$celular',`servicio`='$servicio',`cantidad`='$cantidad',`unitario`='$unitario',`subtotal`='$subtotal',`estado`='Pendiente',`fecha`='$fecha',`creado_por`='$por' WHERE `cod`='$codi'");

            $sql = "SELECT `Precio` FROM `servicios` WHERE `Descrip` = '$servicio'";
            $response = mysqli_query($conn, $sql);           
            while ($row=mysqli_fetch_object($response)){
                $precio=$row->Precio;
                $cons = mysqli_query($conn, "UPDATE `cerrados` SET `unitario` = '$precio'  WHERE `servicio` = '$servicio'");
            }
        }
		if ($cont==$con){
		$consulta = mysqli_query($conn,  "TRUNCATE TABLE pretemp");
		echo "<script>window.location= 'PresupuestosPendientes.php' </script>";
		}
		}
		
}
//eliminar 1
$cont=0;
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
	
    $query = "SELECT * FROM cerrados WHERE titulo = '$titulo'";
    $result = mysqli_query($conn, $query);
    while ($data=mysqli_fetch_object($result)){
		$cont=$cont+1;
		$data1="eliminaruno".$cont."";
		$data4="cod".$cont."";
	if(isset($_POST[''.$data1.''])){ 
	  $codi=$_POST[''.$data4.''];
      $cons = mysqli_query($conn,"DELETE FROM `cerrados` WHERE cod=$codi");
	  echo "<script>window.location= 'PresupuestosPendientes.php' </script>";
	}
	}
?>

<?php require_once "inferior.php"?>
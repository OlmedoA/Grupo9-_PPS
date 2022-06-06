<?php require_once "superior.php"?>
<?php require_once "costado.php"?>
<?php require_once "session.php" ?>
<?php
    if(isset($_POST['agregar'])){ 
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

        $celular = $_POST['celular'];
        $servicio = $_POST['servicio'];
        $cantidad = $_POST['cantidad'];
        $subtotal = 0.00;
        $query = mysqli_query($conn,"INSERT INTO `pretemp` (cel_cliente, servicio, cantidad, subtotal) VALUES ( '$celular', '$servicio', '$cantidad', '$subtotal')");

        $sql = "SELECT `Precio` FROM `servicios` WHERE `Descripcion` = '$servicio'";
        $res = mysqli_query($conn, $sql);           
        while ($row=mysqli_fetch_object($res)){
            $precio=$row->Precio;
            $query = mysqli_query($conn,"UPDATE `pretemp` SET `subtotal` = '$precio' * '$cantidad'  WHERE `servicio` = '$servicio'");
        }
    }
?>

</script>

<main class="main col">
        <!--formulario para generar presupuesto-->
        <form action=""  method="POST" class="row g-3 formStyle mx-auto py-4 px-4 form">
            <div class="form">
                <h1>Generar presupuesto</h1>

            <div class="col-12">
                <!--celular, type tel-->
                <label for="celular" class="form-label">Número de Celular del Cliente</label>
                <input type="tel" class="form-control"  id="celular" name="celular">
            </div> 
            <div class="col-12">
                 <!--servicio-->
                <label for="servicio" class="form-label">Servicio</label>
                <select id="inputState" class="form-select form-control" name="servicio">
                <option selected>Elegir servicio...</option>
                <?php
                //conexion con la base de datos
				$servername = "localhost";
				$database = "jacesi";
				$username = "root";
				$password = "";
				// crear conexion
				$conn = mysqli_connect($servername, $username, $password, $database);
				$queryservicios= mysqli_query($conn,"SELECT * FROM `servicios`");
			//	$servicio = mysqli_fetch_array($queryservicios);
				$nr = mysqli_num_rows($queryservicios);
				foreach ($queryservicios as  $I){
					$opcion=$I['Descripcion'];
					echo"<option>$opcion</option>";
				}
				?>
                </select>
            </div>        
            <div class="col-12">
                 <!--cantidad, type number, minimo 1-->
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" min="1" class="form-control"  id="cantidad" name="cantidad">
            </div>
            </div>
             <!--boton-->
            <button class="btn btn-primary" type="submit" name="agregar">Agregar a presupuesto</button>
        </form>
        
    <div class="container" align="center" id = "temporal">
        <form method="POST">
            <table class="table col-12">
                <thead>
                    <tr>
                        <!--columnas-->
                        <th scope="col">ID</th>
                        <th scope="col">Celular Cliente</th>      
                        <th scope="col">Servicio</th>
                        <th scope="col">Cantidad</th>  
                        <th scope="col">Subtotal</th>         
                    </tr>         
                </thead>
                <tbody>
                    <?php 
                    //toma los datos de la tabla pretemp
                    $sql = "SELECT * FROM pretemp";
                    $res = mysqli_query($conn, $sql);           
                    while ($row=mysqli_fetch_object($res)){
                    $id=$row->id;
                    $celular=$row->cel_cliente;
                    $servicio=$row->servicio;
                    $cantidad=$row->cantidad;
                    $subtotal=$row->subtotal;
     
                    ?>

                    <tr>
                        <!--trae los datos y los muestra-->
                        <td scope="row" data-label="Id"><?php echo $id;?></td>
                        <td data-label="Celular" name="celular"><?php echo $celular;?></td>
                        <td data-label="Servicio" name="servicio"><?php echo $servicio;?></td>
                        <td data-label="Cantidad" name="cantidad"><?php echo $cantidad;?></td>
                        <td data-label="Subtotal" name="subtotal">ARS$<?php echo $subtotal;?></td>
                    </tr>   
                    <?php
                    }
                    ?>                 
                </tbody> 
            </table>
            <button class="btn btn-primary" type="submit" name="cerrar">Cerrar Presupuesto</button> 
        </form>  
   </div>

<?php
    if(isset($_POST['cerrar'])){ 
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

        $cod = mt_rand(100000, 999999);
        $res = mysqli_query($conn, "SELECT * FROM pretemp");           
        while ($table=mysqli_fetch_object($res)){
            $celular=$table->cel_cliente;
            $servicio=$table->servicio;
            $cantidad=$table->cantidad;
            $subtotal=$table->subtotal;
            $unitario = 0;
            $query = mysqli_query($conn,"INSERT INTO `cerrados` (cod, cel_cliente, servicio, cantidad, unitario, subtotal, estado) VALUES ('$cod', '$celular', '$servicio', '$cantidad', '$unitario', '$subtotal', 'Pendiente')");

            $sql = "SELECT `Precio` FROM `servicios` WHERE `Descripcion` = '$servicio'";
            $response = mysqli_query($conn, $sql);           
            while ($row=mysqli_fetch_object($response)){
                $precio=$row->Precio;
                $cons = mysqli_query($conn, "UPDATE `cerrados` SET `unitario` = '$precio'  WHERE `servicio` = '$servicio'");
            }
        }
        $consulta = mysqli_query($conn,  "TRUNCATE TABLE pretemp");
        //echo "<script>window.location= '/print/print.php' </script>";
    }
?>

</main>


<?php require_once "inferior.php"?>
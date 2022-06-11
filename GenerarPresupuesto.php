<?php require_once "superior.php"?>
<?php require_once "costado.php"?>
<?php require_once "session.php" ?>
<?php
    if (isset($_GET['celular'])){

        $celular=$_GET['celular'];

    } else {
        $celular="";
    }

    $titulo="";

    if(isset($_POST['setear'])){ 

        $titulo = $_POST['title'];
        $celular = $_POST['celular'];

    }

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

        $titulo = $_POST['title'];
        $celular = $_POST['celular'];
        $servicio = $_POST['servicio'];
        $cantidad = $_POST['cantidad'];
        $subtotal = 0.00;
        $query = mysqli_query($conn,"INSERT INTO `pretemp` (titulo, cel_cliente, servicio, cantidad, subtotal) VALUES ('$titulo', '$celular', '$servicio', '$cantidad', '$subtotal')");

        $sql = "SELECT `Precio` FROM `servicios` WHERE `Descrip` = '$servicio'";
        $res = mysqli_query($conn, $sql);           
        while ($row=mysqli_fetch_object($res)){
            $precio=$row->Precio;
            $query = mysqli_query($conn,"UPDATE `pretemp` SET `subtotal` = '$precio' * '$cantidad'  WHERE `servicio` = '$servicio'");
        }
    }

?>



<!-- Modal -->
<div class="modal fade" id="datos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Agregar o cambiar teléfono y título</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" value="<?php echo $titulo ?>">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action=""  method="POST" class="row g-3 formStyle mx-auto py-4 px-4 form">
                <label for="titulo" class="form-label">Título Presupuesto</label>
                <input type="text" class="form-control"  id="title" name="title">
                <br>
                <label for="celular" class="form-label">Número de Celular del Cliente</label>
                <input type="tel" class="form-control"  id="celular" name="celular" pattern="[0-9]{10}" value="<?php echo $celular ?>">
                <br>
                <button class="btn btn-primary" type="submit" name="setear">Guardar</button>
            </form>
        </div>
    </div>
  </div>
</div>

<main class="main col">
        <!--formulario para generar presupuesto-->
        <form action=""  method="POST" class="row g-3 formStyle mx-auto py-4 px-4 form">
            <div class="form">
                <h1>Generar presupuesto</h1>
            <div class="col-12">
            
                <label for="titulo" class="form-label">Título Presupuesto</label>
                <input type="text" class="form-control"  id="title" name="title" placeholder="Agregue el título" readonly value="<?php echo $titulo ?>" required>
                
                <label for="celular" class="form-label">Número de Celular del Cliente</label>
                <input type="tel" class="form-control"  id="celular" name="celular" placeholder="Agregue el teléfono" pattern="[0-9]{10}" readonly value="<?php echo $celular ?>" required>
                
            </div>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#datos">Agregar o cambiar teléfono y título</button>
 
            <div class="col-12">
                 <!--servicio-->
                <label for="servicio" class="form-label">Servicio</label>
                <select id="inputState" class="form-select form-control" name="servicio" required>
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
					$opcion=$I['Descrip'];
					echo"<option>$opcion</option>";
				}
				?>
                </select>
            </div>        
            <div class="col-12">
                 <!--cantidad, type number, minimo 1-->
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" min="1" class="form-control"  id="cantidad" name="cantidad" required>
            </div>
            </div>
             <!--boton-->
            <button class="btn btn-primary" type="submit" name="agregar">Agregar a presupuesto</button>
        </form>
        
    <div class="container" align="center" id="temporal">
        <form method="POST">
            <table class="table col-12">
                <thead>
                    <tr>
                        <!--columnas-->
                        <th scope="col">Items</th>    
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
                    $items=$row->id;
                    $servicio=$row->servicio;
                    $cantidad=$row->cantidad;
                    $subtotal=$row->subtotal;
     
                    ?>

                    <tr>
                        <!--trae los datos y los muestra-->
                        <td scope="row" data-label="Items"><?php echo $items;?></td>
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

        $consulta= "SELECT cod from cerrados";
        $response = mysqli_query($conn, $consulta);           
        while ($row=mysqli_fetch_object($response)){
            $cod=$row->cod;
        }
        $cod = $cod + 1;
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
            $query = mysqli_query($conn,"INSERT INTO `cerrados` (cod, titulo, cel_cliente, servicio, cantidad, unitario, subtotal, estado, fecha, creado_por) VALUES ('$cod', '$titulo', '$celular', '$servicio', '$cantidad', '$unitario', '$subtotal', 'Pendiente', '$fecha', '$por')");

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
?>

</main>

<script type="text/javascript">
    var x = document.getElementById("temporal");
    function ocultar() {
        x.style.display = "none";
        };
    function mostrar() {
        x.style.display = "block";
        };
</script>

<?php require_once "inferior.php"?>
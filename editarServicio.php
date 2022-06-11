<?php require_once "superior.php"?>
<?php require_once "costado.php"?>    

<?php
//conecto con la base de datos
$servername = "localhost";
$database = "jacesi";
$username = "root";
$password = "";
// crear conexion
$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
    die("No hay conexión: ".mysqli_connect_error());
}

if (isset($_GET['ID_Proced'])){
   $id = $_GET['ID_Proced'];
        
   $sql="SELECT * from servicios where ID_Proced = $id";
   $resul = mysqli_query($conn, $sql);
   if(mysqli_num_rows($resul) == 1){
       while($row=mysqli_fetch_array($resul)){
        //$row = mysqli_fetch_array($resul);
        $id = $row['ID_Proced'];
        $descrip = $row['Descrip'];
        $precio = $row['Precio'];
       }
   /*     $row = mysqli_fetch_array($resul);
        $id = $row['ID_Proced'];
        $descrip = $row['Descrip'];
        $precio = $row['Precio'];*/
    }
}       
?>
<main class="main col">
    <!--Formulario alta de usuarios-->
            <form action="editarServicio_sql.php"  method="POST" class="row g-3 formStyle mx-auto py-4 px-4 form">
                <div class="form">
                    <h1>Editar Servicio</h1>

                <div class="col-12">                    
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control" id="id" name="id" value="<?php echo $id ?>">
                </div>

                <div class="col-12">                    
                    <label for="descrip" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="descrip" name="descrip" value="<?php echo $descrip ?>">
                </div>

                <div class="col-12">                    
                    <label for="precio" class="form-label">Precio</label>
                    <input type="tel" class="form-control"  id="precio" name="precio" value="<?php echo $precio ?>">
                </div>                   

                <button type="submit" class="btn btn-success w-25" name='boton' value=1>Editar</button>
                <button type="submit" class="btn btn-danger w-25" name='boton' value=0>Cancelar</button>
                </div>
            
            </form>
    </main>  
<?php require_once "inferior.php"?>
    


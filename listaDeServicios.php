<?php require_once "superior.php"?>
<?php require_once "costado.php"?>
<?php require_once "session.php" ?>
<?php
 //conexion con la base de datos
$conexion=mysqli_connect('localhost','root','','jacesi')
?>
<main @click="convertirMoneda()" class="main col">
<div class="container" id="app">
      <!--tabla de baja de empleados-->
      <table class="table col-12">
         <h1 class="encabezado">Lista de Servicios</h1>
         <div class="col-sm-4">
            <label><b> 1 USD$ = {{ calcularResultado }} ARS$ </b></label>
         </div>
            <thead>
               <tr>
                   <!--columnas-->  
                  <th scope="col">Servicio</th>    
                  <th scope="col">Precio en pesos</th> 
                  <th scope="col">Acciones</th>       
               </tr>         
            </thead>
            <?php
             $sql="SELECT * from servicios";
             $result= mysqli_query($conexion,$sql);
            while($mostrar=mysqli_fetch_object($result)){
               $ID_Proced = $mostrar->ID_Proced;   
               $descrip = $mostrar->Descrip;
               $precio = $mostrar->Precio;
               ?>
            <tbody>
               <tr>
                   <!--trae los datos y los muestra-->
                  <th data-label="Servicio"> <?php echo $descrip?></th>
                  <th data-label="Precio en pesos" id="pesos">$<?php echo $precio?></th>

                   <!--boton para eliminar, conecta con eliminar.php-->              
                  <td data-label="Acciones">
                      <!--<button type="button" class="btn btn-danger"><i class="fa-regular fa-trash-can"><a href="eliminar.php"></i></button>-->
                     <a href="eliminarServicio_sql.php?Descrip=<?php echo $descrip;?>" class="btn btn-danger" title="Eliminar"><i class="fa-regular fa-trash-can"></i></a>
                      <!--<button type="button" class="btn btn-danger"><i class="fa-regular fa-trash-can"><a href="eliminar.php"></i></button>-->
                     <a href="editarServicio.php?ID_Proced=<?php echo $ID_Proced?>"class="btn btn-primary" title="Editar"><i class="fa-solid fa-pencil"></i></a>
                     
                  </td>
               </tr>
            </tbody>
            <?php
            }
            ?>
      </table>
   </div>

</main>

<?php require_once "inferior.php"?>

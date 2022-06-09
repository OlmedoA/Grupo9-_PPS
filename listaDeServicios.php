<?php require_once "superior.php"?>
<?php require_once "costado.php"?>
<?php require_once "session.php" ?>
<?php
 //conexion con la base de datos
$conexion=mysqli_connect('localhost','root','','jacesi')
?>
<main class="main col">
<div class="container">
      <!--tabla de baja de empleados-->
      <table class="table col-12">
         <h1 class="encabezado">Lista de Servicios</h1>
            <thead>
               <tr>
                   <!--columnas-->
                  <th scope="col">ID</th>    
                  <th scope="col">Servicio</th>    
                  <th scope="col">Precio en pesos</th>      
                  <th scope="col">Acciones</th>       
               </tr>         
            </thead>
            <?php
             $sql="SELECT * from servicios";
             $result= mysqli_query($conexion,$sql);
            while($mostrar=mysqli_fetch_array($result)){
               ?>
            <tbody>
               <tr>
                   <!--trae los datos y los muestra-->
                  <th data-label="ID"> <?php echo $mostrar['ID_Proced']?></th>
                  <th data-label="Servicio"> <?php echo $mostrar['Descrip']?></th>
                  <th data-label="Precio en pesos"> <?php echo $mostrar['Precio']?></th>

                   <!--boton para eliminar, conecta con eliminar.php-->              
                  <td data-label="Acciones">
                      <!--<button type="button" class="btn btn-danger"><i class="fa-regular fa-trash-can"><a href="eliminar.php"></i></button>-->
                     <a href="eliminarServicio.php?Descrip=<?php echo $mostrar["Descrip"];?>" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></a>
                      <!--<button type="button" class="btn btn-danger"><i class="fa-regular fa-trash-can"><a href="eliminar.php"></i></button>-->
                     <a href="editarServicio.php?ID_Proced=<?php echo $mostrar["ID_Proced"]?>"class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
                     
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
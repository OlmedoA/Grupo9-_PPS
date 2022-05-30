<?php require_once "superior.php"?>
<?php require_once "costado.php"?>
<?php require_once "session.php" ?>


<?php
$conexion=mysqli_connect('localhost','root','','users')
?>
<main class="main col">
   <div class="container">
      <table class="table col-12">
         <h1 class="encabezado">Lista de Empleados</h1>
            <thead>
               <tr>
                  <th scope="col">Nombre</th>    
                  <th scope="col">Apellido</th>     
                  <th scope="col">Fecha de Alta</th>
                  <th scope="col">Télefono</th>
                  <th scope="col">Mail</th>
                  <th scope="col">Usuario</th>   
                  <th scope="col">Eliminar</th>         
               </tr>         
            </thead>
            <?php
            $sql="SELECT * from login where usuario != 'Admin'";
            $result= mysqli_query($conexion,$sql);
            while($mostrar=mysqli_fetch_array($result)){
               ?>
            <tbody>
               <tr>
                  <th data-label="Nombre"> <?php echo $mostrar['nombre']?></th>
                  <th data-label="Apellido"> <?php echo $mostrar['apellido']?></th>
                  <td data-label="Fecha de alta"><?php echo $mostrar['fechaalta'] ?></td>
                  <td data-label="Telefono"><?php echo $mostrar['telefono'] ?></td>
                  <td data-label="Mail"><?php echo $mostrar['mail'] ?></td>
                  <td data-label="Usuario"><?php echo $mostrar['usuario'] ?></td>               
                  <td data-label="Eliminar">
                     <button type="button" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></button>
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
<?php require_once "superior.php"?>
<?php require_once "costado.php"?>
<?php require_once "session.php" ?>


<?php
 //conexion con la base de datos
$conexion=mysqli_connect('localhost','root','','users')
?>
<main class="main col">
   <div class="container">
      <!--tabla de baja de empleados-->
      <table class="table col-12">
         <h1 class="encabezado">Lista de Empleados</h1>
            <thead>
               <tr>
                   <!--columnas-->
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
             //muestra a todos menos al admin
            $sql="SELECT * from login where usuario != 'Admin'";
                  $res = mysqli_query($conn, $sql);           
                  while ($row=mysqli_fetch_object($res)){
                     $usuario=$row->usuario;
                     $nombre=$row->nombre;
                     $apellido=$row->apellido;
                     $fechaalta=$row->fechaalta;
                     $telefono=$row->telefono;
                     $mail=$row->mail;
                     $usuario=$row->usuario;
                  ?>
            <tbody>
               <tr>
                   <!--trae los datos y los muestra-->
                  <th data-label="Nombre"> <?php echo $nombre?></th>
                  <th data-label="Apellido"> <?php echo $apellido?></th>
                  <td data-label="Fecha de alta"><?php echo $fechaalta ?></td>
                  <td data-label="Telefono"><?php echo "<a href='https://api.whatsapp.com/send?phone=54$telefono'>$telefono</a>";?></td>
                  <td data-label="Mail"><?php echo $mail ?></td>
                  <td data-label="Usuario"><?php echo $usuario ?></td> 

                   <!--boton para eliminar, conecta con eliminar.php-->              
                  <td data-label="Eliminar">
                      <!--<button type="button" class="btn btn-danger"><i class="fa-regular fa-trash-can"><a href="eliminar.php"></i></button>-->
                     <a href="eliminar.php?usuario=<?php echo $mostrar["usuario"]; ?>" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></a>
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
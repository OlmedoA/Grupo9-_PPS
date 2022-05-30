<?php require_once "superior.php"?>
<?php require_once "costado.php"?>
<?php require_once "session.php" ?>
	<?php  if(!($_SESSION['nombredelusuario']=="Admin")){
		 header('location: menu.php');
	}?>
<main class="main col">
   <div class="container">
      <table class="table col-12">
         <h1 class="encabezado">Lista de Empleados</h1>
            <thead>
               <tr>
                  <th scope="col">Nombre y Apellido</th>      
                  <th scope="col">Fecha de Alta</th>
                  <th scope="col">Télefono</th>
                  <th scope="col">Mail</th>
                  <th scope="col">Usuario</th>   
                  <th scope="col">Eliminar</th>         
               </tr>         
            </thead>
            <tbody>
               <tr>
                  <th scope="row" data-label="Nombre y Apellido">francisco</th>
                  <td data-label="Fecha de alta">6/5/22</td>
                  <td data-label="Telefono">1133485004</td>
                  <td data-label="Mail">fs080700@gmail.com</td>
                  <td data-label="Usuario">Fran</td>               
                  <td data-label="Eliminar">
                     <button type="button" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></button>
                  </td>
               </tr>
               <tr>
                  <th scope="row" data-label="Nombre y Apellido">Lilen</th>
                  <td data-label="Fecha de alta">6/5/22</td>
                  <td data-label="Telefono">1133485004</td>
                  <td data-label="Mail">fs080700@gmail.com</td>
                  <td data-label="Usuario">Lilen</td>
                  <td data-label="Eliminar">
                      <button type="button" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></button>
                  </td>
               </tr>
               <tr>
                  <th scope="row" data-label="Nombre y Apellido">Nahuel</th>
                  <td data-label="Fecha de Alta">6/5/22</td>
                  <td data-label="Telefono">1133485004</td>
                  <td data-label="Mail">fs080700@gmail.com</td>
                  <td data-label="Usuario">Nahuel</td>
                  <td data-label="Eliminar">
                     <button type="button" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></button>
                   </td>
               </tr>
            </tbody>
      </table>
   </div>
</main>



<?php require_once "inferior.php"?>
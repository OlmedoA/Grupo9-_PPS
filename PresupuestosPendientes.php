<?php require_once "superior.php"?>
<?php require_once "costado.php"?>
<?php require_once "session.php" ?>

<!--tabla de presupuestos-->
<main class="main col">
   <div class="container">
      <table class="table col-12">
         <h1 class="encabezado">Presupuestos Pendientes</h1>
            <thead>
               <tr>
                  <th scope="col">Título</th>      
                  <th scope="col">Fecha de realización</th>
                  <th scope="col">Fecha de vencimiento</th>
                  <th scope="col">Creado por</th>
                  <th scope="col">Acciones</th>      
               </tr>         
            </thead>
            <tbody>
               <tr>
                  <th scope="row" data-label="Título">presupuesto bla</th>
                  <td data-label="Fecha de realización">6/5/22</td>
                  <td data-label="Fecha de vencimiento">21/5/22</td>
                  <td data-label="Creado por">lilen</td>
                  <td data-label="Acciones">
                     <button type="button" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></button>
                     <button type="button" class="btn btn-danger"><i class="fa-solid fa-download"></i></button>
                  </td>
               </tr>
               <tr>
                  <th scope="row" data-label="Título">presupuesto bla bla</th>
                  <td data-label="Fecha de realización">6/5/22</td>
                  <td data-label="Fecha de vencimiento">21/5/22</td>
                  <td data-label="Creado por">fran</td>
                  <td data-label="Acciones">
                      <button type="button" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></button>
                      <button type="button" class="btn btn-danger"><i class="fa-solid fa-download"></i></button>
                  </td>
               </tr>
               <tr>
                  <th scope="row" data-label="Título">presupuesto bla bla bla</th>
                  <td data-label="Fecha de realización">6/5/22</td>
                  <td data-label="Fecha de vencimiento">21/5/22</td>
                  <td data-label="Creado por">lilen</td>
                  <td data-label="Acciones">
                     <button type="button" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></button>
                     <button type="button" class="btn btn-danger"><i class="fa-solid fa-download"></i></button>
                   </td>
               </tr>
            </tbody>
      </table>
   </div>
</main>

<?php require_once "inferior.php"?>
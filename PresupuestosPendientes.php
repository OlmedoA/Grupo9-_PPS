<?php require_once "superior.php"?>
<?php require_once "costado.html"?>
<?php require_once "session.php" ?>

<!--tabla de presupuestos-->
<main class="main col">
<table class="table col-12">
                    <thead>
                        <tr>
                        <th scope="col">Titulo</th>
                        <th scope="col">Fecha de realizacion</th>
                        <th scope="col">Fecha de vencimiento</th>
                        <th scope="col">Creado por</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">presupuesto bla</th>
                        <td>6/5/22</td>
                        <td>21/5/22</td>
                        <td>lilen</td>
                        <td>
                           <button type="button" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></button>
                           <button type="button" class="btn btn-danger"><i class="fa-solid fa-download"></i></button>
                        </td>
                        </tr>
                        <tr>
                        <th scope="row">presupuesto bla bla</th>
                        <td>6/5/22</td>
                        <td>21/5/22</td>
                        <td>fran</td>
                        <td>
                           <button type="button" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></button>
                           <button type="button" class="btn btn-danger"><i class="fa-solid fa-download"></i></button>
                        </td>
                        </tr>
                        <tr>
                        <th scope="row">presupuesto bla bla bla</th>
                        <td>6/5/22</td>
                        <td>21/5/22</td>
                        <td>lilen</td>
                        <td>
                           <button type="button" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></button>
                           <button type="button" class="btn btn-danger"><i class="fa-solid fa-download"></i></button>
                        </td>
                        </tr>
 
                    </tbody>
                </table>
</main>

<?php require_once "inferior.php"?>
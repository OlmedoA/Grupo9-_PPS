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
                  <!--columnas-->
                  <th scope="col">Título</th>   
                  <th scope="col">Núm. Cliente</th>   
                  <th scope="col">Fecha de realización</th>
                  <th scope="col">Días para vencerse</th>
                  <th scope="col">Creado por</th>
                  <th scope="col">Acciones</th>      
               </tr>         
            </thead>
            
               <?php 
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
                  //toma los datos de la tabla cerrados
                  $sql = "SELECT * FROM cerrados WHERE estado = 'Pendiente' GROUP BY titulo";
                  $res = mysqli_query($conn, $sql);           
                  while ($row=mysqli_fetch_object($res)){
                  $titulo=$row->titulo;
                  $celular=$row->cel_cliente;
                  $fecha=$row->fecha;
                  $formateo = DateTime::createFromFormat('Y-m-d', $fecha);
                  $formateofecha = $formateo->format('d/m/Y');
                  $hasta = DateTime::createFromFormat("Y-m-d", date("Y-m-d", strtotime($fecha."+ 2 weeks")));
                  $hoy=DateTime::createFromFormat("Y-m-d", date("Y-m-d"));
                  $intervalo = date_diff($hasta, $hoy); 
                  $por=$row->creado_por;
                  $cantidad = $intervalo->format('%a');

                  if ($cantidad > 10) {
                     $color = '#6CE454';
                  } elseif ( 5 < $cantidad && $cantidad <= 10) {
                     $color = '#F3EE37';
                  } elseif ($cantidad < 5){
                     $color = '#F45B5B';
                  } elseif ($cantidad <= 0){
                     $query = "UPDATE `cerrados` SET `estado` = 'Desaprobado'  WHERE `titulo` = '$titulo'";
                  }
     
     
                  ?>
               <tbody>
                   <tr>
                     <th data-label="Título" name="titulo"><?php echo $titulo; ?></th>
                     <td data-label="Celular"><?php echo "<a href='https://api.whatsapp.com/send?phone=54$celular'>$celular</a>";?></td>
                     <td data-label="Fecha de realización"><?php echo $formateofecha; ?></td>
                     <td data-label="Fecha de vencimiento" style = "background-color:<?php echo $color; ?>;"><?php echo $intervalo->format('%a d&iacute;as'); ?></td>
                     <td data-label="Creado por"><?php echo $por; ?></td>
                     <td data-label="Acciones">
                        <a href="update.php?titulo=<?php echo $titulo;?>"><button type="button" class="btn btn-primary" title="Editar"><i class="fa-solid fa-pencil"></i></button></a>
                        <a href="./print/print.php?titulo=<?php echo $titulo;?>"><button type="button" class="btn btn-warning" title="Descargar"><i class="fa-solid fa-download"></i></button></a>
                        <a href="PresupuestosAprobados.php?titulo=<?php echo $titulo;?>"><button type="button" class="btn btn-success" title="Aprobar"><i class="fa-solid fa-check"></i></button></a>
                        <a href="PresupuestosDesaprobados.php?titulo=<?php echo $titulo;?>"><button type="button" class="btn btn-danger" title="Desaprobar"><i class="fa-regular fa-trash-can"></i></i></button></a>
                     </td>
                  </tr>
               </tbody>  
               <?php
               }
               ?> 
            
      </table>
   </div>

</main>
<script type='text/javascript'>

   var celda = $('#hasta').text();
   var color = document.getElementById('hasta');

   if(parseInt(celda) > 10) {

      color.style.backgroundColor='#6CE454'; 

   } else if (5 < parseInt(celda) <= 10) {

      color.style.backgroundColor='#F3EE37';

   } else if (parseInt(celda) <= 5) {

      color.style.backgroundColor='#F72727';

   }

</script>

<?php require_once "inferior.php"?>
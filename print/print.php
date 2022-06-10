<?php 
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="jacesi";
  
    $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    if (isset($_GET['titulo'])){
      $titulo=$_GET['titulo'];
    } else {
      header("location:../PresupuestosPendientes.php");
    }
    $sql = "SELECT titulo, cod, fecha FROM cerrados WHERE titulo = '$titulo'";
    $res = mysqli_query($conn, $sql); 
    $row = mysqli_fetch_object($res);
    $titulo=$row->titulo;
    $cod=$row->cod; 
    $fecha=$row->fecha;
    $formateo = DateTime::createFromFormat('Y-m-d', $fecha);
    $formateofecha = $formateo->format('d/m/Y');
    $hasta = DateTime::createFromFormat("Y-m-d", date("Y-m-d", strtotime($fecha."+ 2 weeks")));
    $formateohasta = $hasta->format('d/m/Y');

?>

<?php ob_start(); ?>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <style>
    img{
        width:300px;
    }
    .logo{
        text-align: center;
    }
    table
    {
        width: 730px;
        align: center;
    }
    .tablita{
        border: 1px solid black;
        border-collapse: collapse;
	    height: 30px;
   }
   .colorcito{
       background-color:#eeeeee;
   }
   .final{
       text-align:right;
   }
  
</style>
</head>
    <div class="logo"><img src="imagen/logo.png" ></div>
    <div>
 		<div>Terrarosa 3015, El Jagüel </div>
 		<div>http://www.jace-si.com</div>
     	<div>1166500636</div><br>
 	</div>

<table>
    <tr>
        <td><h1>Presupuesto</h1></td>
        <td>Nro: <?php echo $cod; ?></td>
        <td>Fecha: <?php echo $formateofecha; ?> </td>
        
    </tr>
    <tr>
        <td></td>
        <td><b>Proyecto</b> <br><?php echo $titulo; ?></td>
        <td><b>Fecha de vencimiento</b> <br><?php echo $formateohasta; ?>  </td>
    </tr>
</table>


<table class="tablita">
    
    <tr class="tablita">
        <td class="tablita">Descripción</td>
        <td class="tablita">Cantidad</td>
        <td class="tablita">Precio Unitario</td>
        <td class="tablita">Precio Total</td>
    </tr>
    <?php 
        $sql = "SELECT * FROM cerrados WHERE titulo = '$titulo'";
        $res = mysqli_query($conn, $sql);
        $total = 0;           
        while ($row=mysqli_fetch_object($res)){
        $servicio=$row->servicio;
        $cantidad=$row->cantidad;
        $subtotal=$row->subtotal;
        $unitario=$row->unitario;
     
        ?>

        <tr class="tablita colorcito">
            <!--trae los datos y los muestra-->
            <td class="tablita"><?php echo $servicio;?></td>
            <td class="tablita"><?php echo $cantidad;?></td>
            <td class="tablita">ARS$<?php echo $unitario;?></td>
            <td class="tablita">ARS$<?php echo $subtotal;?></td> 
        </tr>   
        <?php
        $total = $total + $subtotal;
        }
        ?> 
     <tr>
        <td class="tablita" colspan="4">Notas</td>

    </tr>
</table>
    <div class="final">
        <h4>Subtotal: $<?php echo $total;?></h4>
        <h4>Ajustes                         </h4>
        <h2>$<?php echo $total;?></h2>
    </div>
</html>

<?php

require_once 'vendor/autoload.php';
use Dompdf\Dompdf;
$dompdf = new DOMPDF();
$dompdf->set_option('defaultFont', 'Roboto');
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "presupuesto_prueba.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>

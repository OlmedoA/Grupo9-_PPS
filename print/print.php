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
?>

<?php ob_start(); ?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
</head>
    
    <!-- <div align="center"><img src="imagen/logo.png"></div> -->
    <img src='imagen/logo.png' width="300px"/>
    <div>
 		<div>Terrarosa 3015, El Jagüel </div>
 		<div>http://www.jace-si.com</div>
     	<div>1166500636</div>
 	</div>

<table width="730px" cellpadding="5px" cellspacing="5px" border="1" align="center">
    <tr>
        <td><h1>Presupuesto <?php echo $titulo ?></h1></td>
        <td>Nro: <?php echo $cod ?></td>
        <td></td>
        <td>Fecha: <?php echo $formateofecha ?> </td>
    </tr>

    <tr>
        <td>Descripción</td>
        <td>Cantidad</td>
        <td>Precio Unitario</td>
        <td>Precio Total</td>
    </tr>
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

        <tr bgcolor="#E4EDEE">
            <!--trae los datos y los muestra-->
            <td ><?php echo $servicio;?></td>
            <td><?php echo $cantidad;?></td>
            <td>ARS$<?php echo $unitario;?></td>
            <td>ARS$<?php echo $subtotal;?></td> 
        </tr>   
        <?php
        $total = $total + $subtotal;
        }
        ?> 
     <tr>
        <td>Notas</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
    <div align="right">
        <h1>Subtotal: ARS$<?php echo $total;?></h1>
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

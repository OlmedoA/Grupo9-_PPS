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

    <div>
 		<div>Terrarosa 3015, El Jagüel </div>
 		<div>http://www.jace-si.com</div>
     	<div>1166500636</div>
 	</div>
<table width="730px" cellpadding="5px" cellspacing="5px" border="1" align="center">
    <tr>
        <td><h1>Presupuesto</h1></td>
        <td>Nro:</td>
        <td></td>
        <td>Fecha: <?php echo date('d/m/y') ?> </td>
    </tr>

    <tr>
        <td>Descripción</td>
        <td>Cantidad</td>
        <td>Precio Unitario</td>
        <td>Precio Total</td>
    </tr>
   </tr>
    <?php 
        $dbhost="localhost";
        $dbuser="root";
        $dbpass="";
        $dbname="jacesi";
  
        $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
        $sql = "SELECT * FROM cerrados";
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
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "presupuesto_prueba.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>

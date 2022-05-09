<?php ob_start(); ?>

<table width="730px" cellpadding="5px" cellspacing="5px" border="1" align="center">
     <div>
 		<div>Terrarosa 3015, El Jagüel </div>
 		<div>http://www.jace-si.com</div>
     	<div>1166500636</div>
 	</div>

    <tr bgcolor="#3498DB">
        <td>Descripción</td>
        <td>Cantidad</td>
        <td>Precio Unitario</td>
        <td>Precio Total</td>
    </tr>
    <tr bgcolor="#E4EDEE">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr bgcolor="#E4EDEE">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr bgcolor="#E4EDEE">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>

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
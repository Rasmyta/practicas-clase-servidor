<?php

require_once 'vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    /*
    ob_start();
    include 'paginaAConvertir.php';
    $content = ob_get_clean();
    */

    //Pedido

    $factura = array(
        array("Producto" => "Mesa stronkbod", "Precio" => 359.44, "Cantidad" => 1),
        array("Producto" => "Sofá Inker", "Precio" => 759.44, "Cantidad" => 1),
        array("Producto" => "Silla Scand", "Precio" => 19, "Cantidad" => 4)
    );
    
    
    //Estilo
    $content = '
    <style type="text/css">
    <!--
    table,td,th {
        border: solid 1px #437ad3;
    table
    {
        padding: 0;
        font-size: 12pt;
        text-align: center;
        vertical-align: middle;
        border-collapse: collapse;
    }
    td
    {
        padding: 1mm;
        width: 150px;
    }
    td.right {
        text-align: right;
        padding-right: 30px;
    }

    -->
    </style>    
        ';


    //Tabla
    $content .= '
    <page backcolor="#FFFFFA" backleft="5mm" backright="5mm" backtop="10mm" backbottom="10mm" >
    <img src="./img/logo.png" style="width: 750px; height: 100px;" alt="logo">
    <h1>Empresa MiKea</h1>
    <h4>Factura xxxxxxxxx</h4>
    <table cellspacing="4">
    ';    

    $content .= '<tr><th>Producto</th><th>Precio</th><th>Cantidad</th><th>Subtotal</th></tr>';

    $total = 0;
    foreach($factura as $value) {
        $content .= "<tr><td>".$value['Producto']."</td>
                         <td>".$value['Precio']."€</td>
                         <td>".$value['Cantidad']."</td>
                         <td>".($value['Precio']*$value['Cantidad'])."€</td></tr>";
        $total += ($value['Precio']*$value['Cantidad']);
    }

    $content .= "<tr><td>TOTAL (con IVA)</td><td colspan='3' class='right'>".$total*1.21."€</td></tr>";

    $content .= "
    </table>
    </page>
    ";
    
    $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 0);
    $html2pdf->writeHTML($content);
    $html2pdf->output('factura.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
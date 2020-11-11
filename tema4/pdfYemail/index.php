<?php

require_once 'vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

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
    <img src="img/logo.jpg" width="700" alt="logo">
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
    //$html2pdf->output('factura.pdf');
    $stringFile = $html2pdf->output('factura.pdf','S');
    file_put_contents("facturaEmail.pdf",$stringFile);


} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}

sleep("1");

error_reporting(E_ALL);
ini_set("display_errors", 1);

// Load Composer's autoloader
require 'vendor/autoload.php';

echo "Enviando mail con PHPMailer ...";

$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;   //Para depurar los mensajes de error del correo. IMPORTANTE
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 465;  //2525 o 587 sin ssl
//Set the encryption mechanism to use - STARTTLS or SMTPS
$mail->SMTPSecure = 'ssl';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = getenv('GMAIL_USER');
//Password to use for SMTP authentication
$mail->Password = getenv('GMAIL_TOKEN');  //Usar un token de Gmail (Cuenta -> Seguridad -> Contraseñas de aplicaciones)
//Set who the message is to be sent from
$mail->setFrom('jjavierguillen@gmail.com');
//Set who the message is to be sent to
$mail->addAddress('jjavierguillen@gmail.com', 'JJ');
//Set the subject line
$mail->Subject = 'Prueba desde Heroku';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML("<body><h2>Hoooola</h2></body>", __DIR__);
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
$mail->addAttachment('facturaEmail.pdf');
//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: '. $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}

<?php
header('Content-Type: text/html; charset=UTF-8');

/***librerias phpmailer**/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* Exception class. */
require 'PHPMailer/src/Exception.php';

/* The main PHPMailer class. */
require 'PHPMailer/src/PHPMailer.php';

/* SMTP class, needed if you want to use SMTP. */
require 'PHPMailer/src/SMTP.php';
/**********/

$mensaje = '<b>Biolog&iacute;a</b><br><b>Nombre del estudiante: </b>';

$para = "jabocho@gmail.com";

$asunto = 'Biología: Actividad';
$asunto = utf8_encode($asunto);				
//Create a new PHPMailer instance
$mail = new PHPMailer();
$mail->IsSMTP();
//Agregar la imagen

//Configuracion servidor mail

$mail->From = "test@lgruiz.com"; //remitente
$mail->FromName = "Majestic Education"; //nombre remitente
$mail->SMTPAuth = true;
$mail->SMTPAutoTLS = false; 
//$mail->SMTPSecure = 'tls'; //seguridad
$mail->Host = "localhost"; // servidor smtp
$mail->Port = 587; //puerto
$mail->Username ='test@lgruiz.com'; //nombre usuario
$mail->Password = '12,X*V.(jHTE'; //password


 
//Agregar destinatario
$mail->AddAddress($para);
$mail->Subject = $asunto;
$mail->IsHTML(true);
$mail->Body = $mensaje;


 
//Avisar si fue enviado o no y dirigir al index
if ($mail->Send()) {
    echo'<script type="text/javascript">
           alert("Enviado correctamente");
		   window.history.back();
        </script>';
} else {
    echo'<script type="text/javascript">
           alert("No enviado, intenta de nuevo");
        </script>';
}
?>
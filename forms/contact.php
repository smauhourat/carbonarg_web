<?php
/**
 * @version 1.0
 */

require("class.phpmailer.php");
require("class.smtp.php");

// Valores enviados desde el formulario
if ( !isset($_POST["name"]) || !isset($_POST["email"]) || !isset($_POST["message"]) ) {
    die ("Es necesario completar todos los datos del formulario");
}
$nombre = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$mensaje = $_POST["message"];

// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = 'c2222030.ferozo.com';  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = 'webmaster@carbonarg.com';  // Mi cuenta de correo
$smtpClave = 'Catal1na/';  // Mi contraseña

// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = "info@carbonarg.com";

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 465; 
$mail->SMTPSecure = 'ssl';
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";


// VALORES A MODIFICAR //
$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;

$mail->From = $email; // Email desde donde envío el correo.
$mail->FromName = $nombre;
$mail->AddAddress($emailDestino); // Esta es la dirección a donde enviamos los datos del formulario

$mail->Subject = "carbonarg.com - Contacto Web"; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "Nombre: {$nombre}<br/>Telefono: {$phone}<br />Email: {$email}<br />{$mensajeHtml} <br /><br />"; // Texto del email en formato HTML
$mail->AltBody = "Nombre: {$nombre}\n Telefono: {$phone}\n Email: {$email}\n {$mensaje} \n\n"; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$estadoEnvio = $mail->Send(); 
if($estadoEnvio){
    echo "OK";
} else {
    echo "Ocurrió un error inesperado.";
}
//echo "El correo fue enviado correctamente.";
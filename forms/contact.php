<?php
  require("class.phpmailer.php");
  require("class.smtp.php");

  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPAuth = true;
  $mail->Port = 465; 
  $mail->SMTPSecure = 'ssl';
  //$mail->IsHTML(true); 
  $mail->CharSet = "utf-8";

  // VALORES A MODIFICAR //
  $mail->Host = 'c2222030.ferozo.com'; 
  $mail->Username = 'webmaster@carbonarg.com'; 
  $mail->Password = 'Catal1na/';

  $mail->From = 'webmaster@carbonarg.com'; // Email desde donde envío el correo.
  $mail->FromName = 'Contacto-Web';
  $mail->AddAddress('santiagomauhourat@hotmail.com')

   echo "OK6";

?>

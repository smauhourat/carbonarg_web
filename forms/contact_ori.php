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
//$mail->AddAddress('info@carbonarg.com'); // Esta es la dirección a donde enviamos los datos del formulario
$mail->AddAddress('santiagomauhourat@hotmail.com')

$mail->Subject = "carbonarg.com - Contacto Web"; // Este es el titulo del email.
$Body = "";
$Body .= "Nombre: ";
//$Body .= $_POST["name"];
$Body .= "\n";
$Body .= "Email: ";
//$Body .= $_POST["email"];
$Body .= "\n";
$Body .= "Telefono: ";
//$Body .= $_POST["phone"];
$Body .= "\n";
$Body .= "Mensaje: ";
//$Body .= $_POST["message"];
$Body .= "\n";
$mensajeHtml = nl2br($Body);
$mail->Body = "{$mensajeHtml} <br /><br />{$name}<br />{$email}"; // Texto del email en formato HTML
$mail->AltBody = "{$Body} \n\n"; // Texto sin formato <HTML></HTML>

// echo $Body

//echo "OK"

// FIN - VALORES A MODIFICAR //

$success = $mail->Send(); 


// redirect to success page
if ($success && $errorMSG == ""){
   echo "OK";
}else{
    if($errorMSG == ""){
        echo "Ha ocurrido un error :(";
    } else {
        echo $errorMSG;
    }
}

?>

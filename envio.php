<?php
require("class.phpmailer.php");
require("class.smtp.php");

// Valores enviados desde el formulario
if ( !isset($_POST["nombre"]) || !isset($_POST["email"]) || !isset($_POST["tel"]) || !isset($_POST["mensaje"]) ) {
    die ("Es necesario completar todos los datos del formulario");
}
$destino = "info@republicista.ar";
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$tel = $_POST["tel"];
$mensaje = $_POST["mensaje"];

// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "mail.republicista.ar";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "test@republicista.ar";  // Mi cuenta de correo
$smtpClave = "casa-5837";  // Mi contraseña

// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = "info@republicista.ar";

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

$mail->Subject = "Formulario de Contacto Web Republicista"; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "
<html>
<body>
<h1>Has recibido un mensaje desde el formulario web, estos son los datos:</h1>
<p>Información enviada por el usuario de la web republicista.ar</p>
<p>Nombre: {$nombre}</p>
<p>E-mail: {$email}</p>
<p>Teléfono: {$tel}</p>
<p>Mensaje: {$mensaje}</p>
</body>
</html>
<br />"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n"; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$mail->SMTPOptions = array(
    'ssl' => array ( 
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true,
    )
    );

$estadoEnvio = $mail->Send(); 
if($estadoEnvio){
    echo "El correo fue enviado correctamente.";
} else {
    echo "Ocurrió un error inesperado.";
}
?>
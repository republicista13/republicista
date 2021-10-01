<?php
ob_start();
?>
<?php
// Conecto mi form / name / con el server a traves de los name
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$mensaje = $_POST['mensaje'];

// Como funciona con el server
$header = 'From:' . $email . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

// Como me a llegar el cuerpo del mail a mi, o sea lo que la gente escribió en el form
$mensaje = "Este mensaje fue enviado por " . $nombre . ",\r\n";
$mensaje .= "Su e-mail es: " . $email . " \r\n";
$mensaje .= "El teléfono es: " . $tel . " \r\n";
$mensaje .= "Mensaje: " . $_POST['mensaje'] . " \r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());

$para = 'info@republicista.ar'; // El mail a donde van a llegar los mensajes
$asunto = 'Mensaje de mi sitio web';

mail($para, $asunto, utf8_decode($mensaje), $header);

header('Location:contacto.html');
?>
<?php
ob_start();
?>
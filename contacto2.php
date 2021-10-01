$nombre = $ _POST['nombre'];
$email = $ _POST['email'];
$tel = $ _POST['tel'];
$mensaje = $ _POST['mensaje'];
$para = 'republicista@gmail.com';
$titulo = 'Formulario de Contacto Web republicista.ar';
 
$msjCorreo = "Nombre: $nombre\n E-Mail: $email\n Mensaje:\n $mensaje";
 
if ($ _POST['submit']) {
if (mail ($para, $titulo, $msjCorreo)) {
echo 'El mensaje se ha enviado';
} else {
echo 'Falló el envio';
}
}

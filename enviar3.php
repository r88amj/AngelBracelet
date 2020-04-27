<?php
require("class.phpmailer.php");
require("class.smtp.php");

if($_POST){
$destino = "postmaster@ayuntaeco.com";
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];



// Datos de la cuenta de correo utilizada para enviar v�a SMTP
$smtpHost = "mail.ayuntaeco.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "postmaster@ayuntaeco.com";  // Mi cuenta de correo
$smtpClave = "-servidor2020";  // Agrega la contraseña


$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 587; 
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";

// VALORES A MODIFICAR //
$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;



$mail->From = $email; // Email desde donde env�o el correo.
$mail->FromName = $nombre;
$mail->AddAddress($destino); // Esta es la direcci�n a donde enviamos los datos del formulario

$mail->Subject = "Correo recibido desde el Sitio Web de Angel Bracelet"; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "
<html> 

<body> 

<h1>Haz recibido un nuevo correo de la página de Angel Bracelet</h1>

<p>Informacion enviada por el usuario:</p>

<p>nombre: {$nombre}</p>

<p>email: {$email}</p>

<p>asunto: {$asunto}</p>

<p>mensaje: {$mensaje}</p>

</body> 

</html>

<br />"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n "; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //


$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$estadoEnvio = $mail->Send(); 
if($estadoEnvio){
    header("Location:index.html");
} else {
    echo "Hubo un problema con el envio.";
    exit();
}
}else{
    echo"No hay datos que procesar";
    exit();
}
?>
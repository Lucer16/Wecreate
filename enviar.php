<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre   = $_POST['Nombre'];
    $email    = $_POST['Email'];
    $telefono = $_POST['Telefono'];
    $servicio = $_POST['Servicio'];
    $mensaje  = $_POST['Mensaje'];

    $para = "info@wecreatebylucero.com";
    
    // 1. Asunto con soporte para tildes
    $asunto = "=?UTF-8?B?".base64_encode("Nueva Cotización: $servicio - $nombre")."?=";

    $contenido = "Has recibido una nueva solicitud desde WeCreate:\n\n";
    $contenido .= "Nombre: $nombre\n";
    $contenido .= "Email: $email\n";
    $contenido .= "Teléfono/WhatsApp: $telefono\n";
    $contenido .= "Servicio de interés: $servicio\n";
    $contenido .= "Mensaje: $mensaje\n";

    // 2. Cabeceras con Content-Type UTF-8
    $headers = "From: info@wecreatebylucero.com" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8" . "\r\n"; // Esta es la clave
    $headers .= "X-Mailer: PHP/" . phpversion();

    if (mail($para, $asunto, $contenido, $headers)) {
        echo "<script>alert('¡Mensaje enviado con éxito!'); window.location.href='contacto.html';</script>";
    } else {
        echo "Error al enviar el correo.";
    }
}
?>
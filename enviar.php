<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $tipo_credito = htmlspecialchars($_POST['tipo_credito']);
    $monto = htmlspecialchars($_POST['monto']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    $destinatario = "tiservicesar@gmail.com";
    $asunto = "NUEVA SOLICITUD DE CRÉDITO - LA NACIÓN";

    $cuerpo = "Detalles de la solicitud recibida:\n\n";
    $cuerpo .= "Nombre del Cliente: $nombre\n";
    $cuerpo .= "Teléfono de Contacto: $telefono\n";
    $cuerpo .= "Producto solicitado: $tipo_credito\n";
    $cuerpo .= "Monto estimado: $ $monto\n";
    $cuerpo .= "Comentarios adicionales: $mensaje\n";

    $headers = "From: web@cooperativalanacion.com" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    if (@mail($destinatario, $asunto, $cuerpo, $headers)) {
        echo "<script>alert('Solicitud enviada con éxito. El equipo de La Nación se contactará con usted.'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Error en el servidor local. Verifique su configuración de sendmail.'); window.location.href='index.html';</script>";
    }
}
?>
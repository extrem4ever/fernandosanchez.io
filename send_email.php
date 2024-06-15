<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate the input
    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email no válido";
        exit;
    }

    // Email details
    $to = "sotomartinemanuel@gmail.com";
    $subject = "Nuevo mensaje de contacto";
    $body = "Nombre: $name\nEmail: $email\nTeléfono: $phone\nMensaje: $message";
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "¡Envío del formulario exitoso!";
    } else {
        echo "Error enviando el mensaje";
    }
} else {
    echo "Método de solicitud no válido";
}
?>

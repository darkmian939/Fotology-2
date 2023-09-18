<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el mensaje enviado por el usuario
    $receiver = $_POST['receiver'];
    $newMessage = $_POST['new-message'];

    // Validar y procesar el mensaje (en este ejemplo, solo se muestra en la misma página)
    echo '<div class="message"><strong>Tú:</strong> ' . htmlspecialchars($newMessage) . '</div>';
}
?>

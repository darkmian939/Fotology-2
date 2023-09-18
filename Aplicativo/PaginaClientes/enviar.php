<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];
    
    $destino = "camilo13056@gmail.com";
    
    $asunto = "Mensaje de contacto de $nombre";
    $contenido = "Nombre: $nombre\n";
    $contenido .= "Correo Electrónico: $email\n";
    $contenido .= "Mensaje:\n$mensaje";
    
    mail($destino, $asunto, $contenido);

    header("Location: confirmacioncontacto.html");
}
?>

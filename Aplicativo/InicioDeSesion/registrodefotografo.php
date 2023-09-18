<?php
require("conexion.php"); 

function encryptPassword($password, $encryptionKey) {
    $cipher = "aes-256-cbc";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $encrypted = openssl_encrypt($password, $cipher, $encryptionKey, 0, $iv);
    return base64_encode($encrypted . "::" . $iv);
}

if(isset($_POST['nombre_fotografo'], $_POST['telefono'], $_POST['email'], $_POST['direccion'], $_POST['contrasena'])) {
    $nombre = $_POST['nombre_fotografo'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $contrasena = $_POST['contrasena'];

   
    $stmt_check = $conexion->prepare("SELECT email FROM Fotografo WHERE Email = ?");
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        echo "El correo electrónico ya existe en la base de datos.";
    } else {
  
        $sql = "INSERT INTO Fotografo (Nombre_fotografo, Telefono, Email, Direccion, Contraseña) VALUES (?, ?, ?, ?, ?)";

        
        $encryptionKey = "Erik123";

       
        $contrasena_encriptada = encryptPassword($contrasena, $encryptionKey);

        
        $stmt = $conexion->prepare($sql);

      
        $stmt->bind_param("sssss", $nombre, $telefono, $email, $direccion, $contrasena_encriptada);

        
        if ($stmt->execute()) {
            echo "Registro exitoso";
        } else {
            echo "Error al registrar: " . $stmt->error;
        }

        $stmt->close();
    }

    $conexion->close();
} else {
    echo "No se enviaron todos los campos requeridos.";
}
?>

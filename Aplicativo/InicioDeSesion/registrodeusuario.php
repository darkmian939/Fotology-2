<?php
require("conexion.php");

function encryptPassword($password, $encryptionKey) {
    $cipher = "aes-256-cbc";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $encrypted = openssl_encrypt($password, $cipher, $encryptionKey, 0, $iv);
    return base64_encode($encrypted . "::" . $iv);
}


if(isset($_POST['nombre'], $_POST['telefono'], $_POST['email'], $_POST['contrasena'])) {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena']; 

   
    $stmt_check = $conexion->prepare("SELECT Email FROM Cliente WHERE Email = ?");
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        echo "El correo electrónico ya existe en la base de datos.";
    } else {
    
        $sql = "INSERT INTO Cliente (IDcliente, Nombre_cliente, Email, Contraseña, Telefono) VALUES (?, ?, ?, ?, ?)";

 
        $IDcliente = uniqid();

 
        $encryptionKey = "Erik123"; 
        $contrasena_encriptada = encryptPassword($contrasena, $encryptionKey);

     
        $stmt = $conexion->prepare($sql);

        
        $stmt->bind_param("sssss", $IDcliente, $nombre, $email, $contrasena_encriptada, $telefono);

       
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



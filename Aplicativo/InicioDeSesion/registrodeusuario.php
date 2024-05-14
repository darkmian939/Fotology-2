<?php
require("conexion.php");

function encryptPassword($password, $encryptionKey) {
    $cipher = "aes-256-cbc";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $encrypted = openssl_encrypt($password, $cipher, $encryptionKey, 0, $iv);
    return base64_encode($encrypted . "::" . $iv);
}

if (isset($_POST['nombre_cliente'], $_POST['telefono'], $_POST['email'], $_POST['contrasena'], $_FILES['foto_perfil'])) {
    $nombre = $_POST['nombre_cliente'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    
    $uploadDirectory = "../ImagenesDeClientes/";
    $profileImagePath = $uploadDirectory . $_FILES['foto_perfil']['name'];
    
    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    if (is_uploaded_file($_FILES['foto_perfil']['tmp_name'])) {
        $encryptionKey = "Erik123";
        $contrasena_encriptada = encryptPassword($contrasena, $encryptionKey);

        // Generar un ID único para la inserción
        $id_cliente = uniqid();

        $stmt_check = $conexion->prepare("SELECT Email FROM Cliente WHERE Email = ?");
        $stmt_check->bind_param("s", $email);
        $stmt_check->execute();
        $stmt_check->store_result();

        if ($stmt_check->num_rows > 0) {
            echo "El usuario ya esta registrado en la pagina.";
        } else {
            $sql = "INSERT INTO Cliente (IDcliente, Nombre_cliente, Telefono, Email, Contrasena, Foto_perfil) VALUES (?, ?, ?, ?, ?, ?)";

            $stmt = $conexion->prepare($sql);

            $stmt->bind_param("ssssss", $id_cliente, $nombre, $telefono, $email, $contrasena_encriptada, $profileImagePath);

            if ($stmt->execute()) {
                move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $profileImagePath);
                header("Location: registrousuario.php?exito=Registro exitoso");
                exit();
            } else {
                echo "Error al registrar: " . $stmt->error;
            }

            $stmt->close();
        }
    } else {
        echo "No se ha cargado una foto de perfil.";
    }

    $conexion->close();
} else {
    echo "No se enviaron todos los campos requeridos.";
}
?>








<?php
require("conexion.php");

function encryptPassword($password, $encryptionKey) {
    $cipher = "aes-256-cbc";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $encrypted = openssl_encrypt($password, $cipher, $encryptionKey, 0, $iv);
    return base64_encode($encrypted . "::" . $iv);
}

if (isset($_POST['nombre_fotografo'], $_POST['telefono'], $_POST['email'], $_POST['direccion'], $_POST['contrasena'], $_FILES['foto_de_perfil'])) {
    // Obtén los valores de los campos del formulario
    $nombre = $_POST['nombre_fotografo'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $contrasena = $_POST['contrasena'];
    
    // Ruta donde deseas guardar las imágenes
    $uploadDirectory = "../ImagenesDeFotografos/";
    $profileImagePath = $uploadDirectory . $_FILES['foto_de_perfil']['name'];
    
    // Verificar si la carpeta existe, si no, crearla
    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    // Verifica si se ha cargado una foto de perfil
    if (is_uploaded_file($_FILES['foto_de_perfil']['tmp_name'])) {
        // Continúa con la inserción de los demás datos en la base de datos
        $encryptionKey = "Erik123";
        $contrasena_encriptada = encryptPassword($contrasena, $encryptionKey);

        $stmt_check = $conexion->prepare("SELECT email FROM Fotografo WHERE Email = ?");
        $stmt_check->bind_param("s", $email);
        $stmt_check->execute();
        $stmt_check->store_result();

        if ($stmt_check->num_rows > 0) {
            echo "El correo electrónico ya existe en la base de datos.";
        } else {
            $sql = "INSERT INTO Fotografo (Nombre_fotografo, Telefono, Email, Direccion, Contrasena, Foto_de_perfil) VALUES (?, ?, ?, ?, ?, ?)";

            $stmt = $conexion->prepare($sql);

            // Bind de la contraseña encriptada y la ruta de la imagen
            $stmt->bind_param("ssssss", $nombre, $telefono, $email, $direccion, $contrasena_encriptada, $profileImagePath);

            if ($stmt->execute()) {
                // Mueve la foto de perfil a la ubicación deseada
                move_uploaded_file($_FILES['foto_de_perfil']['tmp_name'], $profileImagePath);
                header("Location: registrofotografo.php?exito=Registro exitoso");
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

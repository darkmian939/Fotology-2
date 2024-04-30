<?php
session_start();
include('../InicioDeSesion/conexion.php');

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_SESSION['usuario_id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $descripcion = $_POST['descripcion'];

    // Verifica si se ha cargado una nueva imagen
    if ($_FILES['foto']['error'] == 0) {
        // Verificar y mover el archivo de imagen
        $rutaGuardado = "../ImagenesDeFotografos/{$id}.jpg";
        $archivoImagen = $_FILES['foto']['tmp_name'];
        $nombreImagen = $_FILES['foto']['name'];
        $extensionImagen = pathinfo($nombreImagen, PATHINFO_EXTENSION);
        $nombreImagenUnico = uniqid($id . '_', true) . '.' . $extensionImagen;
        $rutaGuardado = $uploadDirectory . $nombreImagenUnico;

        // Verificar el tipo de archivo (puedes agregar más tipos de imagen si es necesario)
        $tiposPermitidos = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array(strtolower($extensionImagen), $tiposPermitidos)) {
            if (move_uploaded_file($archivoImagen, $rutaGuardado)) {
                // Actualiza los datos del perfil sin tocar la columna de imagen
                $query = "UPDATE Fotografo SET Nombre_fotografo=?, Email=?, Telefono=?, Descripcion=?, Foto_de_perfil=? WHERE IDfotografo=?";
                $stmt = $conexion->prepare($query);
                $stmt->bind_param("sssssi", $nombre, $correo, $telefono, $descripcion, $nombreImagenUnico, $id);

                if ($stmt->execute()) {
                    header("Location: perfil.php");
                    exit();
                } else {
                    echo "Error al actualizar el perfil.";
                }

                $stmt->close();
            } else {
                echo "Error al mover la imagen.";
            }
        } else {
            echo "Tipo de archivo no permitido.";
        }
    } else {
        // Si no se cargó una nueva imagen, actualiza los otros campos sin cambiar la imagen de perfil
        $query = "UPDATE Fotografo SET Nombre_fotografo=?, Email=?, Telefono=?, Descripcion=? WHERE IDfotografo=?";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("ssssi", $nombre, $correo, $telefono, $descripcion, $id);

        if ($stmt->execute()) {
            header("Location: perfil.php");
            exit();
        } else {
            echo "Error al actualizar el perfil.";
        }

        $stmt->close();
    }

    $conexion->close();
}
?>

<?php
session_start();
include('../InicioDeSesion/conexion.php');

if (!isset($_SESSION['usuario_id'])) {
    header("Location: iniciodesesion.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];

// Procesar la foto de perfil si se ha proporcionado una nueva
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $foto_temporal = $_FILES['foto']['tmp_name'];
    $foto_nombre = $_FILES['foto']['name'];
    $foto_ruta = "../ImagenesDeClientes/" . $foto_nombre; // Ruta temporal como ejemplo

    // Mover la foto a la ubicación deseada
    if (move_uploaded_file($foto_temporal, $foto_ruta)) {
        // Actualizar la ruta de la foto de perfil en la base de datos
        $query_update = "UPDATE Cliente SET Nombre_cliente=?, Email=?, Telefono=?, Foto_perfil=? WHERE IDcliente=?";
        $stmt_update = $conexion->prepare($query_update);
        $stmt_update->bind_param("ssssi", $nombre, $correo, $telefono, $foto_ruta, $usuario_id);
        $stmt_update->execute();
        $stmt_update->close();

        // Redirigir o mostrar un mensaje de éxito
        header("Location: perfilusuario.php?exito=Perfil actualizado correctamente");
        exit();
    } else {
        echo "Error al mover la foto.";
        exit();
    }
}

// Si no se proporciona una nueva foto, actualizar solo los otros campos
$query_update = "UPDATE Cliente SET Nombre_cliente=?, Email=?, Telefono=? WHERE IDcliente=?";
$stmt_update = $conexion->prepare($query_update);
$stmt_update->bind_param("sssi", $nombre, $correo, $telefono, $usuario_id);
$stmt_update->execute();
$stmt_update->close();

// Redirigir o mostrar un mensaje de éxito
header("Location: perfil.php?exito=Perfil actualizado correctamente");
exit();

$conexion->close();
?>



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
    $conexion->close();
}
?>

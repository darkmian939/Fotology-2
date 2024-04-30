<?php   
session_start();
include('conexion.php');

if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

$correo = $_POST['username'];
$contrasena = $_POST['password'];

$stmt = $conexion->prepare("SELECT IDfotografo, Email, Contrasena FROM Fotografo WHERE Email = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$resultado = $stmt->get_result();
if ($resultado->num_rows === 1) {
    $fila = $resultado->fetch_assoc();
    $contrasena_bd = $fila['Contrasena'];
    if ($contrasena === $contrasena_bd) {
        $_SESSION['usuario_id'] = $fila['IDfotografo'];
        header("Location: ../PaginaFotografos/perfil.php");
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Correo electrónico no encontrado.";
}
$stmt->close();
$conexion->close();
?>

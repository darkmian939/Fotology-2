<?php   
session_start();
include('conexion.php');

if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

$correo = $_POST['Email'];
$contrasena = $_POST['Clave'];

$stmt = $conexion->prepare("SELECT IDcliente, Nombre_cliente, foto_perfil, Contrasena FROM Cliente WHERE Email = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$resultado = $stmt->get_result();
if ($resultado->num_rows === 1) {
    $fila = $resultado->fetch_assoc();
    $contrasena_bd = $fila['Contrasena'];
    if ($contrasena === $contrasena_bd) {
        $_SESSION['usuario_id'] = $fila['IDcliente'];
        $_SESSION['nombre_cliente'] = $fila['Nombre_cliente'];
        $_SESSION['foto_perfil'] = $fila['foto_perfil'];
        header("Location: ../PaginaClientes/pagina.php");
        exit(); // Importante para detener la ejecución después de redireccionar
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Correo electrónico no encontrado.";
}
$stmt->close();
$conexion->close();
?>

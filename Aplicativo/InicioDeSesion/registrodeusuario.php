<?php
session_start();
include('conexion.php');

if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

// Verificar si se enviaron los campos del formulario
if(isset($_POST['Email'], $_POST['Clave'])) {
    $email = $_POST['Email'];
    $contrasena = $_POST['Clave'];

    $stmt = $conexion->prepare("SELECT IDcliente, Email, Contrasena FROM Cliente WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();
    if ($resultado->num_rows === 1) {
        $fila = $resultado->fetch_assoc();
        $contrasena_bd = $fila['Contrasena'];
        
        // Implementar la lógica para desencriptar y comparar contraseñas
        // Ejemplo de comparación básica (sin desencriptación):
        if ($contrasena === $contrasena_bd) {
            // Iniciar sesión
            $_SESSION['usuario_id'] = $fila['IDcliente'];
            $_SESSION['nombre_cliente'] = $fila['Nombre_cliente'];
            $_SESSION['foto_perfil'] = $fila['Foto_Perfil'];

            // Redirigir al perfil después del inicio de sesión exitoso
            header("Location: ../PaginaClientes/perfil.php");
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Correo electrónico no encontrado.";
    }
} else {
    echo "No se enviaron todos los campos requeridos.";
}

// Cerrar conexiones y liberar recursos
$stmt->close();
$conexion->close();
?>




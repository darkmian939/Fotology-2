<?php
session_start();
include('../InicioDeSesion/conexion.php');

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: iniciodesesion.php");
    exit();
}

// Obtener el ID del usuario de la sesión
$usuario_id = $_SESSION['usuario_id'];

// Consultar la información del cliente en la base de datos
$query = "SELECT Nombre_cliente, Email, Telefono, Foto_perfil FROM Cliente WHERE IDcliente = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("s", $usuario_id); // Si el ID es un string, usa "s" en bind_param
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    // Obtener los datos del cliente si existe
    $fila = $resultado->fetch_assoc();
    $nombre = $fila['Nombre_cliente'];
    $correo = $fila['Email'];
    $telefono = $fila['Telefono'];
    $fotoPerfil = $fila['Foto_perfil'];
} else {
    // Redirigir o mostrar un mensaje de error si no se encuentra el cliente
    echo "Cliente no encontrado para ID: " . $usuario_id;
    exit();
}

$stmt->close();
$conexion->close();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Cliente</title>
    <link rel="stylesheet" href="../PaginaFotografos/stylepagfotografo.css">
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="../Recursos/LOGOA.png" alt="Logo">
        </div>
        <nav>
            <ul class="linksnav">
                <li><a href="Perfil.php">Mi Perfil</a></li>
                <li><a href="Publicaciones.html">Publicaciones</a></li>
                <li><a href="Calificaciones.html">Calificaciones</a></li>
                <li><a href="contacto.html">Contacto</a></li>
            </ul>
        </nav>
        <a class="btn" href="../InicioDeSesion/index.php"><button>Cerrar Sesión</button></a>
    </header>
    <main>
        <section class="profile">
            <div class="profile-image">
                <img src="<?php echo $fotoPerfil; ?>" alt="Foto de perfil" />
            </div>
            <div class="profile-info">
                <h2 id="profile-name"><?php echo $nombre; ?></h2><br>
                <p>Correo Electrónico: <span id="profile-email"><?php echo $correo; ?></span></p><br>
                <p>Telefono de contacto: <span id="contacto"><?php echo $telefono; ?></span></p><br>
                <a class="edit-button" href="editarperfil.php">Editar Perfil</a> <!-- Revisar el enlace a editarperfil.php -->
            </div>
        </section>
    </main>
</body>
</html>

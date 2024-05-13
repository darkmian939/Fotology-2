<?php
session_start();
include('../InicioDeSesion/conexion.php');

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

$idCliente = $_SESSION['usuario_id'];
$query = "SELECT Nombre_cliente, Email, Telefono, Foto_de_perfil FROM Cliente WHERE IDcliente = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $idCliente);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $fila = $resultado->fetch_assoc();
    $nombre = $fila['Nombre_cliente'];  // Corregir el nombre de la columna
    $correo = $fila['Email'];
    $telefono = $fila['Telefono'];
    $fotoPerfil = $fila['Foto_de_perfil'];
} else {
    echo "Cliente no encontrado.";
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
    <link rel="stylesheet" href="stylepagfotografo.css">
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
                <p id="profile-description"></p><br>
                <a class="edit-button" href="editarperfil.html">Editar Perfil</a> <!-- Revisar el enlace a editarperfil.php -->
            </div>
        </section>
    </main>
</body>
</html>


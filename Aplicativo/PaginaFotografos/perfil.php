<?php
session_start();
include('../InicioDeSesion/conexion.php');

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

$idFotógrafo = $_SESSION['usuario_id'];
$query = "SELECT Nombre_fotografo, Email, Telefono, Descripcion, Foto_de_perfil FROM Fotografo WHERE IDfotografo = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $idFotógrafo);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $fila = $resultado->fetch_assoc();
    $nombre = $fila['Nombre_fotografo'];
    $correo = $fila['Email'];
    $telefono = $fila['Telefono'];
    $descripcion = $fila['Descripcion'];
    $fotoPerfil = $fila['Foto_de_perfil'];
} else {
    echo "Fotógrafo no encontrado.";
    exit();
}
$stmt->close();
$conexion->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Fotógrafo</title>
    <link rel="stylesheet" href="stylepagfotografo.css">
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="../Recursos/LOGOA.png" alt="Logo">
        </div>
        <nav>
            <ul class="linksnav">
            <li><a href="perfil.php">Inicio</a></li>
          <li><a href="portafolio.php">Portafolio</a></li>
          <li><a href="mensajes.php">Mensajes</a></li>
          <li><a href="ayuda.html">Ayuda</a></li>
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
                <p id="profile-description">
                    Descripción: <?php echo $descripcion; ?>
                </p><br>
                <a class="edit-button" href="editarperfil.html">Editar Perfil</a> <!-- Corregir el enlace a editarperfil.php -->
            </div>
        </section>
    </main>
</body>
</html>

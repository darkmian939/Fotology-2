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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="../PaginaFotografos/stylepagfotografo.css">
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="../Recursos/LOGOA.png" alt="Logo">
        </div>
    </header>
    <main>
        <section class="profile-edit">
            <h2>Editar Perfil</h2><br>
            <form id="edit-profile-form" method="POST" action="editarelperfil.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $_SESSION['usuario_id']; ?>">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
                </div>
                <div class="form-group">
                    <label for="correo">Correo Electrónico:</label>
                    <input type="email" id="correo" name="correo" value="<?php echo $correo; ?>">
                </div>
                <div class="form-group">
                    <label for="telefono">Número de contacto:</label>
                    <input type="number" id="telefono" name="telefono" value="<?php echo $telefono; ?>">
                </div>
                <div class="form-group">
                    <label for="foto">Foto de Perfil:</label>
                    <input type="file" id="foto" name="foto">
                </div>
                <button class="edit-button" type="submit">Guardar Cambios</button>
            </form>
        </section>
    </main>
</body>
</html>

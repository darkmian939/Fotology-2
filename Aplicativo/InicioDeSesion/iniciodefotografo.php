<?php
session_start();
include('conexion.php');

$Usuario = $_POST['username']; 
$Clave = $_POST['password'];

if (empty($Usuario)) {
    header("Location: index.php?error=El Usuario Es Requerido");
    exit();
} elseif (empty($Clave)) {
    header("Location: index.php?error=La clave Es Requerida");
    exit();
} else {
    $q = "SELECT IDfotografo FROM Fotografo WHERE Email = '$Usuario' AND Contrasena = '$Clave'";
    $consulta = mysqli_query($conexion, $q);
    $array = mysqli_fetch_array($consulta);

    if ($array) {
        $_SESSION['usuario_id'] = $array['IDfotografo']; // Establecer el ID del usuario en la sesión

        header("Location: ../PaginaFotografos/perfil.php");
        exit();
    } else {
        header("Location: index.php?error=El usuario o la clave son incorrectas");
        exit();
    }
}
?>

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
    $q = "SELECT COUNT(*) as contar from Fotografo where Email = '$Usuario' and Contraseña = '$Clave'";
    $consulta = mysqli_query($conexion, $q);
    $array = mysqli_fetch_array($consulta);

    if ($array['contar'] > 0) {
        $_SESSION['username'] = $Usuario;

        header("Location: ../PaginaFotografos/pagfotografo.html");
        exit();
    } else {
        header("Location: index.php?error=El usuario o la clave son incorrectas");
        exit();
    }
}

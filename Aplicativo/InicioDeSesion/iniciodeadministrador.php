<?php   
session_start();
include('conexion.php');

$Usuario = $_POST['usuario']; 
$Clave = $_POST['contraseña'];

if (empty($Usuario)) {
    header("Location: index.php?error=El Usuario Es Requerido");
    exit();
} elseif (empty($Clave)) {
    header("Location: index.php?error=La clave Es Requerida");
    exit();
} else {
    $q = "SELECT COUNT(*) as contar from administrador where Email = '$Usuario' and Contraseña = '$Clave'";
    $consulta = mysqli_query($conexion, $q);
    $array = mysqli_fetch_array($consulta);

    if ($array['contar'] > 0) {
        $_SESSION['Usuario'] = $Usuario;

        header("Location: ../PaginaAdministrador/pagadministrador.php");
        exit();
    } else {
        header("Location: index.php?error=El usuario o la clave son incorrectas");
        exit();
    }
}

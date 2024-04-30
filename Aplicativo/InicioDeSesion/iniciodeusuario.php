<?php   
session_start();
include('conexion.php');

$Usuario = $_POST['Email']; 
$Clave = $_POST['Clave'];

if (empty($Usuario)) {
    header("Location: index.php?error=El Usuario Es Requerido");
    exit();
} elseif (empty($Clave)) {
    header("Location: index.php?error=La clave Es Requerida");
    exit();
} else {
    $q = "SELECT COUNT(*) as contar from cliente where Email = '$Usuario' and Contrasena = '$Clave'";
    $consulta = mysqli_query($conexion, $q);
    $array = mysqli_fetch_array($consulta);

    if ($array['contar'] > 0) {
        $_SESSION['Usuario'] = $Usuario;

        header("Location: ../PaginaClientes/pagina.html");
        exit();
    } else {
        header("Location: index.php?error=El usuario o la clave son incorrectas");
        exit();
    }
}

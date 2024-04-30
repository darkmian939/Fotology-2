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
    // Consulta preparada para evitar inyección SQL
    $q = "SELECT COUNT(*) as contar from cliente where Email = ? and Contrasena = ?";
    $stmt = mysqli_prepare($conexion, $q);
    
    // Verificar si la preparación de la consulta fue exitosa
    if ($stmt) {
        // Asociar parámetros con la consulta preparada
        mysqli_stmt_bind_param($stmt, "ss", $Usuario, $Clave);
        
        // Ejecutar la consulta preparada
        mysqli_stmt_execute($stmt);
        
        // Vincular resultado de la consulta
        mysqli_stmt_bind_result($stmt, $contar);
        
        // Obtener resultados
        mysqli_stmt_fetch($stmt);
        
        // Verificar si se encontró un usuario con esa combinación de Email y Contraseña
        if ($contar > 0) {
            $_SESSION['Usuario'] = $Usuario;
            header("Location: ../PaginaClientes/pagina.html");
            exit();
        } else {
            header("Location: index.php?error=El usuario o la clave son incorrectas");
            exit();
        }
    } else {
        // Error en la preparación de la consulta
        echo "Error en la preparación de la consulta SQL";
    }

    // Cerrar la consulta preparada
    mysqli_stmt_close($stmt);
}

// Cerrar conexión a la base de datos
mysqli_close($conexion);
?>

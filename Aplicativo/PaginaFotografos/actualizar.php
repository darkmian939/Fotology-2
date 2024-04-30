<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    
    // Actualiza la información en la base de datos
    $query = "UPDATE Fotografo SET Nombre_fotografo=?, Email=?, Telefono=?, Descripcion=? WHERE IDfotografo=?";
    
    if ($conn->query($sql) === TRUE) {
        echo "Información actualizada correctamente.";
    } else {
        echo "Error al actualizar la información: " . $conn->error;
    }
    
    // Cierra la conexión a la base de datos
    $conn->close();
}
?>

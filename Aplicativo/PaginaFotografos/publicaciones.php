<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PagPrincipal</title>
    <link rel="stylesheet" href="Publicaciones.css">
    <link rel="icon" href="~/Recursos/LOGOA.png">
    <script src="https://kit.fontawesome.com/9bf48cfb4e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/646ac4fad6.js" crossorigin="anonymous"></script>
</head>
<body>
    <script src="~/js/dropdown.js"></script>

    <header class="header">
        <div class="logo">
            <img src="../Recursos/LOGOA.png" alt="Logo" />
        </div>
        <nav>
            <ul class="linksnav">
               <ul class="linksnav">
                <li><a href="Perfil.php">My Perfil</a></li>
                <li><a href="Publicaciones.html">Portafolio</a></li>
                <li><a href="Publicaciones.html">Calificaciones</a></li>
                <li><a href="contacto.html">Contacto</a></li>
            </ul>
           
        </nav>

    </header>
<body>
    <h1>Subir Imagen</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="title">Título:</label><br>
        <input type="text" id="title" name="title"><br><br>
        <label for="description">Descripción:</label><br>
        <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>
        <label for="category">Categoría:</label><br>
        <input type="text" id="category" name="category"><br><br>
        <input type="file" name="file" id="file"><br><br>
        <input type="submit" value="Subir Imagen" name="submit">
    </form>
    
    <?php
// Directorio donde se guardarán las imágenes
$upload_dir = "uploads/";

// Verificar si el directorio de uploads existe, si no, crearlo
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true); // Crear directorio con permisos de escritura
}

// Verificar si el formulario ha sido enviado
if(isset($_POST['submit'])) {
    // Obtener datos del formulario
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];

    // Verificar si se ha subido un archivo
    if(isset($_FILES['file'])) {
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];
        
        // Mover el archivo a la carpeta de uploads
        move_uploaded_file($file_tmp, $upload_dir . $file_name);
        
        // Guardar los datos en un archivo de texto
        $data = "Título: $title\nDescripción: $description\nCategoría: $category\nNombre del archivo: $file_name\n\n";
        file_put_contents("data.txt", $data, FILE_APPEND);
        
        echo "Imagen subida exitosamente.";
    } else {
        echo "Por favor selecciona un archivo.";
    }
}
?>

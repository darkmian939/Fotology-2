<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleportafolio.css">
    <title>Portafolio de Fotografías</title>
</head>
<body>
<header class="header">
      <div class="logo">
        <img src="../Recursos/LOGOA.png" alt="Logo" />
      </div>
      <nav>
        <ul class="linksnav">
        <li><a href="pagfotografo.html">Inicio</a></li>
          <li><a href="portafolio.php">Portafolio</a></li>
          <li><a href="mensajes.php">Mensajes</a></li>
          <li><a href="ayuda.html">Ayuda</a></li>
          <li><a href="contacto.html">Contacto</a></li>
        </ul>
      </nav>
      <a class="btn" href="../InicioDeSesion/index.php"
        ><button>Cerrar Sesion</button></a
      >
    </header>

    <main>
        <section class="portfolio">
            <?php
            $images = [
                ['image1.jpg', 'Título de la Imagen 1', 'Descripción de la Imagen 1', 'Categoría 1'],
                ['image2.jpg', 'Título de la Imagen 2', 'Descripción de la Imagen 2', 'Categoría 2'],
                ['image3.jpg', 'Título de la Imagen 3', 'Descripción de la Imagen 3', 'Categoría 1'],
                ['image4.jpg', 'Título de la Imagen 4', 'Descripción de la Imagen 4', 'Categoría 2'],
                ['image5.jpg', 'Título de la Imagen 5', 'Descripción de la Imagen 5', 'Categoría 1'],
            ];

            foreach ($images as $index => $image) {
                echo '<div class="portfolio-item">';
                echo '<img src="' . $image[0] . '" alt="' . $image[1] . '" class="portfolio-image">';
                echo '<h2>' . $image[1] . '</h2>';
                echo '<p>' . $image[2] . '</p>';
                echo '<p>' . $image[3] . '</p>';
                echo '<a href="editarportafolio.php?index=' . $index . '">Editar</a>';
                echo '</div>';
            }
            ?>
        </section>
    </main>
    <?php
    // Directorio donde se encuentran las imágenes
    $upload_dir = "uploads/";

    // Obtener la lista de archivos en el directorio
    $files = scandir($upload_dir);

    // Mostrar cada imagen encontrada
    foreach($files as $file) {
        if ($file != '.' && $file != '..') { // Ignorar los directorios . y ..
            echo "<img src='$upload_dir$file' alt='Imagen'><br>";
        }
    }
    ?>

</body>
</html>

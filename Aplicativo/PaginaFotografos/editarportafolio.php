<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleportafolio.css">
    <title>Editar Imagen</title>
</head>
<body>
    <header>
        <h1>Editar Imagen</h1>
    </header>

    <main>
        <?php
        // Datos de las imágenes (simulados)
        $images = [
            ['image1.jpg', 'Título de la Imagen 1', 'Descripción de la Imagen 1', 'Categoría 1'],
            ['image2.jpg', 'Título de la Imagen 2', 'Descripción de la Imagen 2', 'Categoría 2'],
            ['image3.jpg', 'Título de la Imagen 3', 'Descripción de la Imagen 3', 'Categoría 1'],
            ['image4.jpg', 'Título de la Imagen 4', 'Descripción de la Imagen 4', 'Categoría 2'],
            ['image5.jpg', 'Título de la Imagen 5', 'Descripción de la Imagen 5', 'Categoría 1'],
        ];

        $index = $_GET['index'];
        $image = $images[$index];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $categoria = $_POST['categoria'];

            // Actualizar los datos de la imagen
            $images[$index][1] = $titulo;
            $images[$index][2] = $descripcion;
            $images[$index][3] = $categoria;

            // Redirigir de nuevo al portafolio
            header("Location: portafolio.php");
        }
        ?>

        <form method="POST">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo $image[1]; ?>"><br>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion"><?php echo $image[2]; ?></textarea><br>

            <label for="categoria">Categoría:</label>
            <input type="text" id="categoria" name="categoria" value="<?php echo $image[3]; ?>"><br>

            <input type="submit" value="Guardar Cambios">
        </form>
    </main>
</body>
</html>

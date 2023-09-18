<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="stylepagfotografo.css">
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="../Recursos/LOGOA.png" alt="Logo">
        </div>
        <nav>
            <ul class="linksnav">
            <li><a href="pagfotografo.html">Inicio</a></li>
          <li><a href="portafolio.php">Portafolio</a></li>
          <li><a href="#">Mensajes</a></li>
          <li><a href="#">Ayuda</a></li>
          <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php
        include 'actualizar.php';
        ?>
        <section class="profile-edit">
            <h2>Editar Perfil</h2><br>
            <form id="edit-profile-form" method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="Nombre del Fotógrafo">
                </div>
                <div class="form-group">
                    <label for="correo">Correo Electrónico:</label>
                    <input type="email" id="correo" name="correo" value="correo@fotografo.com">
                </div>
                <div class="form-group">
                    <label for="telefono">Numero de contacto:</label>
                    <input type="number" id="telefono" name="telefono" value="3103232332">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" rows="4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus modi et est! Corrupti aliquid reprehenderit sed perspiciatis esse quisquam nisi, consectetur culpa tempore beatae dolore delectus eum nesciunt quis ipsa.</textarea>
                </div>
                <div class="form-group">
                    <label for="foto">Foto de Perfil:</label>
                    <input type="file" id="foto" name="foto">
                </div>
                <button class="edit-button" type="button" id="save-button">Guardar Cambios</button>
            </form>
        </section>
    </main>
</body>
</html>

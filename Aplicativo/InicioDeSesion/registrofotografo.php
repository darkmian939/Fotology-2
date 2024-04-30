<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Registrarse</title>
</head>
<body>
    <div class="container-form sign-up">  
        <form class="formulario" method="POST" action="registrodefotografo.php" enctype="multipart/form-data">
            <h2 class="create-account">Crear una cuenta</h2>
            <div class="iconos">
                <div class="border-icon">
                    <i class='bx bxl-facebook-circle'></i>
                </div>
                <div class="border-icon">
                    <i class='bx bxl-gmail'></i>
                </div>
                <div class="border-icon">
                    <i class='bx bxl-microsoft'></i>
                </div>
            </div>
            <p class="cuenta-gratis">Crear una cuenta gratis</p>
            <input type="text" name="nombre_fotografo" placeholder="nombre" required>
            <input type="tel" name="telefono" placeholder="telefono" required>
            <input type="email" name="email" placeholder="email" required>
            <input type="text" name="direccion" placeholder="direccion" required>
            <input type="password" name="contrasena" placeholder="contraseña" required>
            <h5>foto de perfil</h5>
            <input type="file" name="foto_de_perfil" accept="image/*" required>
            <input type="submit" value="Registrarse" name="registrarse"> 
            <br>
            
            <?php
            if (isset($_GET['exito'])) {
                ?>
                <p class="success">
                    <?php
                    echo $_GET['exito'];
                    ?>
                </p>
                <?php    
            }
            ?>
        </form>

        <div class="welcome-back">
            <div class="message">
                <h2>Bienvenido a Fotology</h2>
                <p>Si ya tienes una cuenta, por favor inicia sesión aquí</p>
                <button><a href="index.php" class="sign-up-btn">Iniciar Sesión</a></button>
            </div>
        </div>
    </div>
    <script src="java.js"></script>
</div>
</body>
</html>

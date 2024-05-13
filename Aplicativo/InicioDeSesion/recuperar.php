<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="stylesrecuperar.css">
</head>
<body>
    <div class="container-form">
        <div class="header">
            <h2>Recuperar Contraseña</h2>
        </div>
        <form class="form" method="POST" action="recuperar_contraseña.php">
            <div class="row">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="row">
                <input type="submit" value="Enviar" class="btn">
            </div>
        </form>
        <div class="footer">
            <a href="../home" id="switchToSignup">Volver al Inicio</a>
        </div>
    </div>
</body>
</html>

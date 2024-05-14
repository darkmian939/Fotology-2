<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión como Fotógrafo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="contenedor-form">
    <form id="Fotografo" action="iniciodefotografo.php" method="POST">
    <div class="header">
                <a class="selected" data-user-type="Usuario">FOTOGRAFO</a><BR></BR>
            </div>
            <hr>
            <?php 
            if (isset($_GET['error'])) {
                ?>
                <p class="error">
                    <?php
                    echo $_GET['error'];
                    ?>
                </p>
                <?php    
            }
            ?>
        <div class="fila">
            <label for="username">Nombre de Fotógrafo</label>
            <input type="text" id="username" name="username">
        </div>
        <div class="fila">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password">
        </div>
        <div class="fila"><BR></BR>
                <input type="checkbox" class="check" id="mantener-sesion" name="mantener-sesion">
                <label for="mantener-sesion">Mantener Sesión</label>
            </div>
        <input type="submit" value="Iniciar Sesión" class="btn">
    </form>
    <p>¿Quieres iniciar sesión como <a href="Usuario.php">Usuario</a> o <a href="Administrador.php">Administrador</a>?</p><BR></BR>
    <a href="./recuperar.php" class="olvido">Olvidó la Contraseña</a>
</div>
<script src="script.js"></script>
</body>
</html>

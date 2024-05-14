<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión como Usuario</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="contenedor-form">
    <div id="usuarioContainer">
        <form id="Usuario" action="iniciodeusuario.php" method="POST">
            <div class="header">
                <a class="selected" data-user-type="Usuario">USUARIO</a><BR></BR>
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
                <label for="Email">Usuario</label>
                <input type="text" id="Email" name="Email">
            </div>
            <div class="fila">
                <label for="Clave">Contraseña</label>
                <input type="password" id="Clave" name="Clave">
            </div>
            <div class="fila"><BR></BR>
                <input type="checkbox" class="check" id="mantener-sesion" name="mantener-sesion">
                <label for="mantener-sesion">Mantener Sesión</label>
            </div>
            <input type="submit" value="Iniciar Sesión" class="btn">
        </form>
    </div>
    <p>¿Quieres iniciar sesión como <a href="fotografo.php">Fotógrafo</a> o <a href="administrador.php">Administrador</a>?</p><BR></BR>

    <a href="./recuperar.php" class="olvido">Olvidó la Contraseña</a>
</div>
<script src="script.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="contenedor-form">
    <div id="usuarioContainer">
        <form id="Usuario" action="iniciodeusuario.php" method="POST">
            <input type="hidden" name="user-type" value="Usuario">            
            <div class="header">
                <a href="#" class="selected" data-user-type="Usuario">USUARIO</a>
                <a href="#" data-user-type="Fotografo">FOTOGRAFO</a>
                <a href="#" data-user-type="Administrador">ADMINISTRADOR</a>
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
            <hr>
            <div class="fila">
                <label for="Email">Email</label>
                <input type="text" id="Email" name="Email">
            </div>
            <div class="fila">
                <label for="Clave">Contraseña</label>
                <input type="password" id="Clave" name="Clave">
            </div>
            <div class="fila">
                <input type="checkbox" class="check" id="mantener-sesion" name="mantener-sesion">
                <label for="mantener-sesion">Mantener Sesión</label>
            </div>
            <input type="submit" value="Iniciar Sesión" class="btn">
            <p><a href="registrousuario.html" id="switchToSignup">¿No tienes una cuenta? Regístrate aquí como Usuario.</a></p>
        </form>
    </div>

    <div id="fotografoContainer" style="display: none;">
        <form id="Fotografo" action="iniciodefotografo.php" method="POST">
            <input type="hidden" name="user-type" value="Fotografo">
            <div class="header">
                <a href="#" data-user-type="Usuario">USUARIO</a>
                <a href="#" class="selected" data-user-type="Fotografo">FOTOGRAFO</a>
                <a href="#" data-user-type="Administrador">ADMINISTRADOR</a>
            </div>
            <hr>
            <hr>
            <div class="fila">
                <label for="username">Nombre de Fotógrafo</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="fila">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="fila">
                <input type="checkbox" class="check" id="fotografo-mantener-sesion" name="mantener-sesion">
                <label for="fotografo-mantener-sesion">Mantener Sesión</label>
            </div>
            <input type="submit" value="Iniciar Sesión" class="btn">
            <p><a href="registrofotografo.html" id="switchToSignup">¿No tienes una cuenta? Regístrate aquí como Usuario.</a></p>
        </form>
    </div>

    <div id="administradorContainer" style="display: none;">
        <form id="Administrador" action="iniciodeadministrador.php" method="POST">
            <input type="hidden" name="user-type" value="Administrador">
            <div class="header">
                <a href="#" data-user-type="Usuario">USUARIO</a>
                <a href="#" data-user-type="Fotografo">FOTOGRAFO</a>
                <a href="#" class="selected" data-user-type="Administrador">ADMINISTRADOR</a>
            </div>
            <hr>
            <hr>
            <div class="fila">
                <label for="usuario">Usuario de Administrador</label>
                <input type="text" id="usuario" name="usuario">
            </div>
            <div class="fila">
                <label for="contraseña">Contraseña</label>
                <input type="password" id="contraseña" name="contraseña">
            </div>
            <div class="fila">
                <input type="checkbox" class="check" id="admin-mantener-sesion" name="mantener-sesion">
                <label for="admin-mantener-sesion">Mantener Sesión</label>
            </div>
            <input type="submit" value="Iniciar Sesión" class="btn">
        </form>
    </div>
    <hr>

    <a href="#olvido" class="olvido">Olvidó la Contraseña</a>
</div>

<script src="script.js"></script>
</body>
</html>

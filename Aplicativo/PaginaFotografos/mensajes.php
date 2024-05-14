<!DOCTYPE html>
<html>
<head>
    <title>Messenger</title>
    <link rel="stylesheet" href="stylemensajes.css">
</head>
<body>
<header class="header">
      <div class="logo">
        <img src="../Recursos/LOGOA.png" alt="Logo" />
      </div>
      <nav>
        <ul class="linksnav">
          <li><a href="perfil.php">Inicio</a></li>
          <li><a href="portafolio.php">Portafolio</a></li>
          <li><a href="#mensajes">Mensajes</a></li>
          <li><a href="ayuda.html">Ayuda</a></li>
          <li><a href="contacto.html">Contacto</a></li>
        </ul>
      </nav>
      <a class="btn" href="../InicioDeSesion/index.php"
        ><button>Cerrar Sesion</button></a
      >
    </header>
    <div id="container">
        <div id="user-list">
            <h2>Usuarios</h2>
            <ul>
                <li><a href="?user=Usuario1">Usuario 1</a></li>
                <li><a href="?user=Usuario2">Usuario 2</a></li>
                <!-- Agrega más usuarios aquí -->
            </ul>
        </div>
        <div id="message-panel">
            <?php
            // Código PHP para cargar y mostrar mensajes
            if (isset($_GET['user'])) {
                $currentUser = htmlspecialchars($_GET['user']);
                $messages = array(
                    'Usuario1' => array(
                        array('sender' => 'Usuario 1', 'text' => 'Hola, ¿cómo estás?'),
                        array('sender' => 'Tú', 'text' => '¡Hola! Estoy bien, gracias.'),
                    ),
                    'Usuario2' => array(
                        array('sender' => 'Usuario 2', 'text' => '¡Hola! ¿Qué tal?'),
                        array('sender' => 'Tú', 'text' => 'Estoy bien, ¿y tú?'),
                    ),
                );

                echo '<h2>' . $currentUser . '</h2>';

                if (array_key_exists($currentUser, $messages)) {
                    foreach ($messages[$currentUser] as $message) {
                        echo '<div class="message"><strong>' . $message['sender'] . ':</strong> ' . $message['text'] . '</div>';
                    }
                }
            }
            ?>
            <div id="message-input">
                <form method="post" action="enviarmensaje.php">
                    <input type="hidden" name="receiver" value="<?php echo $currentUser; ?>">
                    <textarea name="new-message" placeholder="Escribe tu mensaje"></textarea>
                    <button type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

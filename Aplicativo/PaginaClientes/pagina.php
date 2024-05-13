<?php
session_start();
// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: iniciodesesion.php");
    exit();
}

$nombreCliente = $_SESSION['nombre_cliente'];
$fotoPerfil = $_SESSION['foto_perfil'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="stylepagprincipal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header class="header">
        <!-- Logo y menú de navegación -->
        <div class="logo">
            <img src="../Recursos/LOGOA.png" alt="Logo">
        </div>
        <nav>
            <ul class="linksnav">
                <li><a href="pagina.html">Inicio</a></li>
                <li><a href="fotografos.html">Fotografos</a></li>
                <li><a href="categorias.html">Categorías</a></li>
                <li><a href="contacto.html">Contacto</a></li>
            </ul>
        </nav>

        <!-- Menú desplegable -->
        <div class="perfil-dropdown">
            <button class="btn-profile">
                <img src="<?php echo $fotoPerfil; ?>" alt="Foto de perfil">
                Bienvenido, <?php echo $nombreCliente; ?>
                <i class="fas fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="perfil.php">Ver Perfil</a>
                <form method="post" action="../InicioDeSesion/Usuario.php">
                    <button type="submit"name="cerrar_sesion">Cerrar Sesión</button>
                </form>
            </div>
        </div>
    </header>
    <div class="fdestacados">
      <h1>Fotografos</h1>
      <h2>Destacados</h2>
    </div>
    <div class="contenedor">
      <img class="imagen" src="../Recursos/Paisaje1.jpg" alt="Paisaje" />
      <div class="texto">
        <h1 class="nombre">Erick Ricaurte</h1>
        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea officiis
          quis optio voluptatem deleniti, labore cumque, debitis neque, dolor
          autem consequatur beatae. Quam excepturi rem, eaque quasi ad esse
          harum?Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea
          officiis quis optio voluptatem deleniti, labore cumque, debitis neque,
          dolor autem consequatur beatae. Quam excepturi rem, eaque quasi ad
          esse harum?Lorem ipsum, dolor sit amet consectetur adipisicing elit.
          Ea officiis quis optio voluptatem deleniti, labore cumque, debitis
          neque, dolor autem consequatur beatae. Quam excepturi rem, eaque quasi
          ad esse harum?Lorem ipsum, dolor sit amet consectetur adipisicing
          elit. Ea officiis quis optio voluptatem deleniti, labore cumque,
          debitis neque, dolor autem consequatur beatae. Quam excepturi rem,
          eaque quasi ad esse harum?Lorem ipsum.
        </p>
        <a class="mas" href="#"><button>Saber mas</button></a>
      </div>
    </div>
    <div class="categorias">
      <h1>Categorias</h1>
      <h2>Principales</h2>
      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea officiis
        quis optio voluptatem deleniti, labore cumque, debitis neque, dolor
        autem consequatur beatae. Quam excepturi rem, eaque quasi ad esse
        harum?Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea
        officiis quis optio voluptatem deleniti, labore cumque, debitis neque,
        dolor autem consequatur beatae. Quam excepturi rem, eaque quasi ad esse
        harum?Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea
        officiis quis optio voluptatem deleniti, labore cumque, debitis neque,
        dolor autem consequatur beatae. Quam excepturi rem, eaque quasi ad esse
        harum?
      </p>
    </div>
    <div class="container-card">
      <div class="card">
        <figure>
          <img
            src="https://media.colombian.com.co/wp-content/uploads/2018/12/04114439/ImagenDestacada-Paisajes-01.jpg"
          />
        </figure>
        <div class="contenido-card">
          <h3>Paisajes</h3>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea
            officiis quis optio voluptatem deleniti, labore cumque, debitis
            neque, dolor autem consequatur beatae.
          </p>
          <a class="smas" href="#"><button>Ver</button></a>
        </div>
      </div>
      <div class="card">
        <figure>
          <img src="https://i.blogs.es/a709d5/kevin-biskaborn/1366_2000.jpg" />
        </figure>
        <div class="contenido-card">
          <h3>Animales</h3>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea
            officiis quis optio voluptatem deleniti, labore cumque, debitis
            neque, dolor autem consequatur beatae.
          </p>
          <a class="smas" href="#"><button>Ver</button></a>
        </div>
      </div>
      <div class="card">
        <figure>
          <img
            src="https://www.formacionyestudios.com/wp-content/uploads/2018/09/como-ser-modelo.jpg"
          />
        </figure>
        <div class="contenido-card">
          <h3>Personas</h3>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea
            officiis quis optio voluptatem deleniti, labore cumque, debitis
            neque, dolor autem consequatur beatae.
          </p>
          <a class="smas" href="#"><button>Ver</button></a>
        </div>
      </div>
      <div class="card">
        <figure>
          <img
            src="https://4.bp.blogspot.com/-_wiVPaJL1UQ/Vu76uPP_RnI/AAAAAAAACHY/iq58X7aV6bYC80JuBxK3OnZptTYJxNaGw/s1600/importancia-decoracion-eventos-sociales.jpg"
          />
        </figure>
        <div class="contenido-card">
          <h3>Eventos</h3>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea
            officiis quis optio voluptatem deleniti, labore cumque, debitis
            neque, dolor autem consequatur beatae.
          </p>
          <a class="smas" href="#"><button>Ver</button></a>
        </div>
      </div>
    </div>
  </body>
</html>

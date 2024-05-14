<?php
session_start();
include('../InicioDeSesion/conexion.php');

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: iniciodesesion.php");
    exit();
}

$nombreCliente = $_SESSION['nombre_cliente'];

// Obtener la foto de perfil del usuario desde la base de datos
$usuario_id = $_SESSION['usuario_id'];

// Modifica esta consulta para usar el nombre correcto de la columna que identifica al usuario
$stmt = $conexion->prepare("SELECT foto_perfil FROM Cliente WHERE IDcliente = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$stmt->bind_result($fotoPerfil);
$stmt->fetch();
$stmt->close();
$conexion->close();
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
    <div class="perfil-btn">
            <form id="perfilForm" method="GET" action="perfilusuario.php">
                <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['usuario_id']; ?>">
                <button type="submit" class="btn-profile">
                    <?php if (!empty($fotoPerfil)) : ?>
                        <img src="<?php echo $fotoPerfil; ?>" alt="Foto de perfil">
                    <?php endif; ?>
                    <?php echo $nombreCliente; ?>
                </button>
            </form>
        </div>
        <script>
            document.getElementById('perfilForm').addEventListener('submit', function(event) {
                event.preventDefault();
                window.location.href = this.action + '?usuario_id=' + this.querySelector('input[name="usuario_id"]').value;
            });
        </script>
        
        <nav>
            <ul class="linksnav">
<<<<<<< HEAD
                <li><a href="pagina.php">Inicio</a></li>
                <li><a href="fotografos.html">Fotografos</a></li>
                <li><a href="categorias.html">Categorías</a></li>
                <li><a href="contacto.html">Contacto</a></li>
=======
          <li><a href="fotografos.html">Fotografos</a></li>
          <li><a href="categorias.html">Categorias</a></li>
          <li><a href="ayuda.html">Ayuda</a></li>
          <li><a href="contacto.html">Contacto</a></li>
>>>>>>> 61f572ea148373b1527ce293c332cef6d0c7e6ad
            </ul>
        </nav>
        <a class="btn" href="../InicioDeSesion/Usuario.php"><button>Cerrar Sesion</button></a>
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

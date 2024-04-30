<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .eliminar-btn {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
    <link rel="stylesheet" href="styleadministrador.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/646ac4fad6.js" crossorigin="anonymous"></script>
    <title>Panel de Administrador</title>
</style>
</head>
<body>
<script>
function eliminar(){
  var respuesta=confirm("¿Estas seguro que deseas eliminar este registro?");
  return respuesta
}
    </script>
<header class="header">
        <div class="logo">
          <img src="../Recursos/LOGOA.png" alt="Logo" />
        </div>
        <a class="btn" href="../InicioDeSesion/index.php"
          ><button>Cerrar Sesion</button></a
        >
      </header>

    <div class="container">
        <h1>Panel de Administrador</h1>
        <button class="filter-btn" onclick="filterData('Fotografos')">Fotografos</button>
        <button class="filter-btn" onclick="filterData('Clientes')"><a href="crudcliente.php">Clientes</a></button>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del fotografo</th>
                    <th>Email</th>
                    <th>Contraseña</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Acción</th> <!-- Nueva columna para el botón de eliminación -->
                </tr>
            </thead>
            <tbody>
                <?php
                include "../InicioDeSesion/conexion.php";
                $sql = $conexion->query("SELECT * from fotografo ");
                while ($datos = $sql->fetch_object()) { ?>
                    <tr>
                        <td><?= $datos->IDfotografo ?></td>
                        <td><?= $datos->Nombre_fotografo ?></td>
                        <td><?= $datos->Email ?></td>
                        <td><?= $datos->Contrasena ?></td>
                        <td><?= $datos->Direccion ?></td>
                        <td><?= $datos->Telefono ?></td>
                        <td>
                             <!-- Formulario para enviar la solicitud de eliminación -->
                             <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="hidden" name="eliminar_id" value="<?= $datos->IDfotografo ?>">
                                <button type="submit" onclick="return eliminar()" class="eliminar-btn">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php
    // Manejar la eliminación del registro si se envía un formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar_id'])) {
        $eliminar_id = $_POST['eliminar_id'];

        // Consulta SQL para eliminar el registro
        $sql = "DELETE FROM fotografo WHERE IDfotografo = $eliminar_id";

        if ($conexion->query($sql) === TRUE) {
            echo "Registro eliminado correctamente.";
        } else {
            echo "Error al eliminar el registro: " . $conexion->error;
        }
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
    ?>

</body>
</html>


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
    <title>Panel de Administrador</title>
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
        <a class="btn" href="../InicioDeSesion/index.php"><button>Cerrar Sesion</button></a>
    </header>

    <div class="container">
        <h1>Panel de Administrador</h1>
        <button class="filter-btn" onclick="filterData('Fotografos')"><a href="pagadministrador.php">Fotografos</a></button>
        <button class="filter-btn" onclick="filterData('Clientes')">Clientes</button>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del cliente</th>
                    <th>Email</th>
                    <th>Contraseña</th>
                    <th>Telefono</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../InicioDeSesion/conexion.php";
                $sql = $conexion->query("SELECT * from cliente ");
                while ($datos = $sql->fetch_object()) { ?>
                    <tr>
                        <td><?= $datos->IDcliente ?></td>
                        <td><?= $datos->Nombre_cliente ?></td>
                        <td><?= $datos->Email ?></td>
                        <td><?= $datos->Contrasena ?></td>
                        <td><?= $datos->Telefono ?></td>
                        <td>
                            <!-- Formulario para enviar la solicitud de eliminación -->
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="hidden" name="eliminar_id" value="<?= $datos->IDcliente ?>">
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
        $sql = "DELETE FROM cliente WHERE IDcliente = '$eliminar_id'";

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


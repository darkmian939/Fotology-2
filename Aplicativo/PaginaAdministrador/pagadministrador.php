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

        .notification-btn {
            background-color: transparent;
            border: none;
            cursor: pointer;
            position: relative;
        }

        .notification-icon {
            color: #555;
            font-size: 24px;
        }

        .badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: orange;
            color: white;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 14px;
        }

        .notification-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            width: 300px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-top: none;
            border-radius: 0 0 5px 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 999;
        }

        .notification-dropdown.active {
            display: block;
        }

        .notification-dropdown-header {
            background-color: #f9f9f9;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .notification-dropdown-header h3 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }

        .notification-dropdown-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .notification-dropdown-item {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .notification-dropdown-item:last-child {
            border-bottom: none;
        }

        .notification-dropdown-item:hover {
            background-color: #f2f2f2;
        }
    </style>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/646ac4fad6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styleadministrador.css">
    <title>Panel de Administrador</title>
</head>
<body>
<script>
    function eliminar() {
        var respuesta = confirm("¿Estas seguro que deseas eliminar este registro?");
        return respuesta;
    }

    function toggleNotificationDropdown() {
        document.getElementById('notificationDropdown').classList.toggle('active');
    }
</script>
<header class="header">
    <div class="logo">
        <img src="../Recursos/LOGOA.png" alt="Logo" />
    </div>
    <div class="notifications">
        <button class="notification-btn" onclick="toggleNotificationDropdown()">
            <i class="fas fa-bell notification-icon"></i> <!-- Ícono de notificación -->
            <span class="badge">3</span> <!-- Número de notificaciones pendientes -->
        </button>
        <div class="notification-dropdown" id="notificationDropdown">
            <div class="notification-dropdown-header">
                <h3>Notificaciones</h3>
            </div>
            <ul class="notification-dropdown-list">
                <li class="notification-dropdown-item">Notificación 1</li>
                <li class="notification-dropdown-item">Notificación 2</li>
                <li class="notification-dropdown-item">Notificación 3</li>
            </ul>
        </div>
    </div>
    <a class="btn" href="../InicioDeSesion/index.php">
        <button>Cerrar Sesión</button>
    </a>
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

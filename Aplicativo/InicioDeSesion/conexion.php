<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fotology";

$conexion = new mysqli($servername, $username, $password, $dbname);

if ($conexion->connect_error) {
    die("Conexion fallida: " . $conexion->connect_error);
}
?>

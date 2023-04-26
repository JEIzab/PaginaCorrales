<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "corrales";

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conexion->connect_error) {
  die("La conexión falló: " . $conexion->connect_error);
}
echo "";

?>
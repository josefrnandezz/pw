<?php
include_once ("../bd_util.php");
$host = "127.0.0.1";
// Resto parámetros conexión bd
$conn = new mysqli ($host, $username, $password, $database);
if ($conn->connect_error)
    die ($conn->connect_error);
$sql = "DELETE FROM Libro WHERE signatura='".$_GET["signatura"]."'";
$resultado = $conn->query ($sql);
if (!$resultado)
    die ("Operación en base de datos fallida: " . $conn->error);
$conn = null;
header ("Location: biblioteca.php");
?>
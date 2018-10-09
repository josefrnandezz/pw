<?php include "../cabecera.php"?>
<?php
$host = "127.0.0.1";
$username = "pgespejo";
$password = "***";
$database = "c9";
$conn = new mysqli ($host, $username, $password, $database);
if ($conn->connect_error)
    die ($conn->connect_error);
$sql = "SELECT * FROM Libro where signatura=".$_GET["signatura"];
$rows = $conn->query ($sql);
if (!$rows)
    die ($conn->error);
$row=$rows->fetch_assoc ();
?>
    <p><strong>ISBN: </strong><?php echo $row["isbn"]?></p>
    <p><strong>Año: </strong><?php echo $row["anno"]?></p>
    <p><strong>Edición: </strong><?php echo $row["edicion"]?></p>
    <p><strong>Autor: </strong><?php echo $row["autor"]?></p>
    <p><strong>Título: </strong><?php echo $row["titulo"]?></p>
    <p><strong>Editorial: </strong><?php echo $row["editorial"]?></p>
    <p><strong>Signatura: </strong><?php echo $row["signatura"]?></p>
    <p><strong>Disponibilidad: </strong><?php echo
        $row["disponibilidad"]?></p>
    <br/>
    <a href="catalogo.php">Catálogo</a>
<?php
$conn = null;
?>
<?php include "../pie.php"?>
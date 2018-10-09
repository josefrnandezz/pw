<?php include "../cabecera.php"?>
    <h1>Catálogo de la biblioteca</h1>
<?php
$host = "127.0.0.1";
$username = "pgespejo";
$password = "***";
$database = "c9";
$conn = new mysqli ($host, $username, $password, $database);
if ($conn->connect_error)
    die ($conn->connect_error);
$sql = "SELECT titulo, autor, signatura FROM Libro";
?>
    <table border=1>
    <tr>
        <th>Título</th>
        <th>Autor</th>
    </tr>
<?php
$rows = $conn->query ($sql);
if (!$rows)
    die ($conn->error);
foreach ($rows as $row) {
    echo '<tr><td>'.$row["titulo"].'</td><td>'.$row["autor"].
        '</td><td><a
        href="detalles_libro.php?signatura='.urlencode($row["signatura"]).'">V
        er detalles</a></td></tr>';
}
echo "</table>";
$conn = null;
?>
<?php include "../pie.php"?>
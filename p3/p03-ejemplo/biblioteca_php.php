<?php include "../cabecera.php"?>
    <h1>Catálogo de la biblioteca</h1>
<?php
$host = "127.0.0.1";
// Resto parámetros conexión bd
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
    foreach ($rows as $row)
    {
        echo '<tr><td>'.$row["titulo"].'</td><td>'.$row["autor"].
            '</td><td><a
href="editar_libro.php?signatura='.$row["signatura"].'">Editar</a></td
>'.
            '</td><td><a
href="borrar_libro.php?signatura='.$row["signatura"].'">Borrar</a></td
>'.
            '</tr>';
    }
    echo "</table>";
    $conn = null;
    ?>
    <br/><br/>
    <form method="post" action="editar_libro.php">
        <input type="submit" value="Registrar nuevo libro" />
    </form>
<?php include "../pie.php"?>
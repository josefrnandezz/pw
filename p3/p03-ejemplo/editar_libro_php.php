<?php include "../cabecera.php"?>
<?php
$host = "127.0.0.1";
// Resto parámetros conexión bd
$conn = new mysqli ($host, $username, $password, $database);
if ($conn->connect_error)
    die ($conn->connect_error);
if (isset ($_GET["signatura"]))
{
    $sql = "SELECT * FROM Libro where signatura=".$_GET["signatura"];
    $rows = $conn->query ($sql);
    if (!$rows)
        die ($conn->error);
    $row=$rows->fetch_assoc ();
}
?>
    <form method="post" action="guardar_libro.php">
        <label>ISBN
            <input type="text" name="isbn" id="isbn" value="<?php echo $row["isbn"]?$row["isbn"]:""?>" /><br/>
        </label>
        <label for="anno">Año</label>
        <input type="text" name="anno" id="anno" value="<?php echo $row["anno"]?$row["anno"]:""?>" /><br/>
        <label for="edicion">Edición</label>
        <input type="text" name="edicion" id="edicion" value="<?php echo $row["edicion"]?$row["edicion"]:""?>" /><br/>
        <label for="autor">Autor</label>
        <input type="text" name="autor" id="autor" value="<?php echo $row["autor"]?$row["autor"]:""?>" /><br/>
        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo" value="<?php echo $row["titulo"]?$row["titulo"]:""?>" /><br/>
        <label for="editorial">Editorial</label><input type="text" name="editorial" id="editorial" value="<?php echo $row["editorial"]?$row["editorial"]:""?>"
        /><br/>
        <label for="signatura">Signatura</label>
        <input type="text" name="signatura" id="signatura" value="<?php echo $row["signatura"]?$row["signatura"]:""?>"
        /><br/>
        <label for="disponibilidad">Disponibilidad</label>
        <select name="disponibilidad" id="disponibilidad" size="1">
            <option value="prestable" <?php echo
            ($row["disponibilidad"]=="prestable")?"selected='selected'":""?>>Prestable</option>
            <option value="no prestable" <?php echo ($row["disponibilidad"]=="no prestable")?"selected='selected'":""?>>No
                prestable</option>
        </select><br/><br/>
        <input type="submit" value="Guardar libro" />
        <input type="reset" value="Recuperar valores originales" />
    </form>
    <br/><br/>
    <a href="biblioteca.php">Catálogo</a>
<?php
$conn = null;
?>
<?php include "../pie.php"?>
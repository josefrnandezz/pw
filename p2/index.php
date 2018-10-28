<?php include "ConsultasEmpleados.php"?>

<h1>Empleados de una empresa</h1>

<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 28/10/18
 * Time: 14:54
 */
    $consulta = new ConsultasEmpleados;
    if ($consulta->dbc == null)
        echo "Error al conectar con la base de datos";
?>

<table border=1>
    <tr>
        <th>Apellidos</th>
        <th>Nombre</th>
    </tr>

<?php

$emps = $consulta->getEmpleados();

foreach ($emps as $emp) {
    echo '<tr>
            <td>'.$emp["apellidos"].'</td>
            <td>'.$emp["nombre"]. '</td>
            <td><a href="detalles_empleado.php?dni='.urlencode($emp["dni"]).'">Ver detalles</a></td>
          </tr>';
}

echo "</table>";
$consulta->dbc = null;
?>

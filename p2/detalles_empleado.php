<?php include "ConsultasEmpleados.php" ?>

<h1>Datos empleado</h1>

<?php
$consulta = new ConsultasEmpleados;
if ($consulta->dbc == null)
    $consulta->dbc->errorInfo();

$dni = $_GET["dni"];
$emps = $consulta->getDatosEmpleados($dni);

foreach ($emps as $emp) {
   echo "<p><strong>Nombre: </strong>$emp[nombre]</p>
    <p><strong>Apellidos: </strong>$emp[apellidos]</p>
    <p><strong>Email: </strong>$emp[email]</p>
    <p><strong>DNI: </strong>$emp[dni]</p>
    <p><strong>Puesto: </strong>$emp[puesto]</p>";

   echo "<a href='index.php'>Empleados</a>";

}

$consulta->dbc = null;
?>

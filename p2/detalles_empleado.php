<?php include "ConsultasEmpleados.php"?>
<?php
$consulta = new ConsultasEmpleados;
if ($consulta->dbc == null)
    echo "Error al conectar con la base de datos";

$dni = $_GET["dni"];
$emps = $consulta->getEmpleados();

foreach ($emps as $emp) {
    if ($dni == $emp["dni"]) {
        echo '<p><strong>Nombre: </strong>'.$emp["nombre"].'</p>
          <p><strong>Apellidos: </strong>'.$emp["apellidos"].'</p>
          <p><strong>Email: </strong>'.$emp["email"].'</p>
          <p><strong>DNI: </strong>'.$emp["dni"].'</p>
          <p><strong>Puesto: </strong>'.$emp["puesto"].'</p>
          <br/>
          <a href="index.php">Empleados</a>';
    }
}

$consulta->dbc = null;
?>

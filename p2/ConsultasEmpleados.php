<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 28/10/18
 * Time: 17:06
 */

class ConsultasEmpleados
{
    // usuario

    public $user = 'jose';

    // contraseña

    public $pass = 'Password@pw2018';

    // objeto para conectar con la db

    public $dbc;

    // constructor de la clase

    public function __construct()
    {
        $this->dbc = $this->dbconnect();
    }

    // funcion para conectar con la db

    public function dbconnect() {
        $dbc = null;

        try {
            $dbc = new PDO('mysql:host=localhost; dbname=empleados', $this->user, $this->pass,
                array(PDO::ATTR_PERSISTENT => true));
        } catch (PDOException $e) {
            return null;
        }

        return $dbc;
    }

    // funcion para obtener los empleados de la empresa

    public function getEmpleados() {
        $emps = array();
        $i = 0;

        $sentence = $this->dbc->prepare("SELECT * FROM informacion");

        if ($sentence->execute()) {
            while ($row = $sentence->fetch()) {
                $emps[$i] = $row;
                $i++;
            }
        }

        return $emps;
    }
}
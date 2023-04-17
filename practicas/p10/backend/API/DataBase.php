<?php

abstract class DataBase {
    protected $conexion;

    public function __construct($db_name) {
        $this->conexion = new mysqli(
            'localhost', 
            'root',
            '1983270828040110', 
            $db_name 
        );

        if ($this->conexion->connect_error) {
            die('Error de conexión (' . $this->conexion->connect_errno . ') '
                . $this->conexion->connect_error);
        }

        $this->conexion->set_charset('utf8');
    }

    public function Database($sql) {
        $result = $this->conexion->query($sql);
        if ($result === false) {
            die('Error en la consulta (' . $this->conexion->errno . ') '
                . $this->conexion->error);
        }
        return $result;
    }
}

?>

<?php
/*
    $conexion = @mysqli_connect(
        'localhost',
        'root',
        '12345678a',
        'marketzone'
    );

    if(!$conexion) {
        die('¡Base de datos NO conextada!');
    }
    */

namespace Database;

abstract class DataBase {
    protected $conexion;

    // Constructor para establecer la conexión a la base de datos
    public function __construct() {
        $this->conexion = new \mysqli('localhost', 'root', '12345678a', 'marketzone');
        if ($this->conexion->connect_error) {
            die("Connection failed: " . $this->conexion->connect_error);
        }
    }

    // Método para cerrar la conexión
    public function closeConnection() {
        $this->conexion->close();
    }
}
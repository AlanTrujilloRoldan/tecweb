<?php

namespace TECWEB\MYAPI;

require_once __DIR__ ."/../database.php";

use TECWEB\MYAPI\DataBase;

class Delete extends DataBase {

    public function __construct($db,$user = 'root', $pass = '12345678a') {
        parent::__construct($db,$user,$pass);
    }

    // Método para eliminar un producto por ID
    public function delete($id) {
        $sql = "UPDATE productos SET eliminado = 1 WHERE id = {$id}";
        if ($this->conexion->query($sql)) {
            $this->response = ['status' => 'success', 'message' => 'Producto eliminado'];
        } else {
            $this->response = ['status' => 'error', 'message' => 'No se pudo eliminar el producto: ' . mysqli_error($this->conexion)];
        }
    }

}
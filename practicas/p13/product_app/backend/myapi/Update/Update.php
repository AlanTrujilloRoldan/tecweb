<?php

namespace TECWEB\MYAPI;

require_once __DIR__ ."/../database.php";

use TECWEB\MYAPI\DataBase;

class Update extends DataBase {

    public function __construct($db,$user = 'root', $pass = '12345678a') {
        parent::__construct($db,$user,$pass);
    }

    public function edit($product) {
        $sql = "UPDATE productos SET nombre = '{$product->name}', marca = '{$product->brand}', 
                modelo = '{$product->model}', precio = {$product->price}, detalles = '{$product->details}', 
                unidades = {$product->units} WHERE id = {$product->id}";

        if ($this->conexion->query($sql)) {
            $this->response = ['status' => 'success', 'message' => 'Producto modificado'];
        } else {
            $this->response = ['status' => 'error', 'message' => 'No se pudo modificar el producto: ' . mysqli_error($this->conexion)];
        }
    }

}
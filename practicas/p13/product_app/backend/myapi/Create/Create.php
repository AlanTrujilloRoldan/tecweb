<?php

namespace TECWEB\MYAPI\Create;

require_once __DIR__ ."/../Database.php";

use TECWEB\MYAPI\Database\Database;

class Create extends Database {

    public function __construct($db,$user = 'root', $pass = '12345678a') {
        parent::__construct($db,$user,$pass);
    }

    // Métodos como add, delete, edit, etc
    public function add($product) {
        $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) 
                VALUES ('{$product->name}', '{$product->brand}', '{$product->model}', 
                        {$product->price}, '{$product->details}', {$product->units}, '{$product->image}')";
    
        if ($this->conexion->query($sql)) {
            $this->response = [
                'status' => 'success',
                'message' => 'Producto agregado',
                'product_id' => $this->conexion->insert_id  // Include the new product's ID
            ];
        } else {
            $this->response = [
                'status' => 'error',
                'message' => 'No se pudo agregar el producto: ' . mysqli_error($this->conexion)
            ];
        }
    
        return $this->response;
    }
}
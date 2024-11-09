<?php

require_once __DIR__ . '/myapi/Products.php';
use TECWEB\MYAPI\Products;

// Crear una instancia de la clase Products
$productApp = new Products('marketzone');
// Llamar al método edit para modificar el producto
$productApp->edit(json_decode(file_get_contents('php://input')));
// Devolver la respuesta en formato JSON
echo $productApp->getData();
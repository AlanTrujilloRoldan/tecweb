<?php

require_once __DIR__ . '/Products.php';
use Products\Products;

// Crear una instancia de la clase Products
$productApp = new Products('marketzone');
// Llamar al método edit para modificar el producto
$productApp->edit(json_decode(file_get_contents('php://input')));
// Devolver la respuesta en formato JSON
echo $productApp->getData();
<?php
require_once __DIR__ . '/Products.php';
use Products\Products;

// Crear una instancia de la clase Products
$productApp = new Products('marketzone');
// Llamar al método add para agregar el producto
$productApp->add(json_decode(file_get_contents('php://input')));
// Devolver la respuesta en formato JSON
echo $productApp->getData();
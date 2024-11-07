<?php
require_once __DIR__ . '/Products.php';
use Products\Products;

// Obtener el nombre del producto desde la solicitud GET
$name = $_GET['name'];
// Crear una instancia de la clase Products
$productApp = new Products('marketzone');
// Obtener el producto por nombre
$productApp->singleByName($name);
// Devolver la respuesta en formato JSON
echo $productApp->getData();
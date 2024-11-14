<?php
require_once __DIR__ . '/../vendor/autoload.php';

use TECWEB\MYAPI\Create\Create;

// Crear una instancia de la clase Products
$productApp = new Create('marketzone');
// Llamar al método add para agregar el producto
$productApp->add(json_decode(file_get_contents('php://input')));
// Devolver la respuesta en formato JSON
echo $productApp->getData();
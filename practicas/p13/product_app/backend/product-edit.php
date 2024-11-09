<?php

require_once __DIR__ . '/myapi/Update/Update.php';
use TECWEB\MYAPI\Update;

// Crear una instancia de la clase Products
$productApp = new Update('marketzone');
// Llamar al método edit para modificar el producto
$productApp->edit(json_decode(file_get_contents('php://input')));
// Devolver la respuesta en formato JSON
echo $productApp->getData();
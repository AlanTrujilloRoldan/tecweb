<?php
require_once __DIR__ . '/myapi/Read/Read.php';
use TECWEB\MYAPI\Read;

// Obtener el nombre del producto desde la solicitud GET
$name = $_GET['name'];
// Crear una instancia de la clase Products
$productApp = new Read('marketzone');
// Obtener el producto por nombre
$productApp->singleByName($name);
// Devolver la respuesta en formato JSON
echo $productApp->getData();
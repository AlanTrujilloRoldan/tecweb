<?php
require_once __DIR__ . '/myapi/Read/Read.php';
use TECWEB\MYAPI\Read;

// Crear una instancia de la clase Products
$productApp = new Read('marketzone');
// Listar los productos
$productApp->list();
// Devolver los resultados en formato JSON
echo $productApp->getData();
<?php
require_once __DIR__ . '/../vendor/autoload.php';

use TECWEB\MYAPI\Read\Read;

// Crear una instancia de la clase Products
$productApp = new Read('marketzone');
// Listar los productos
$productApp->list();
// Devolver los resultados en formato JSON
echo $productApp->getData();
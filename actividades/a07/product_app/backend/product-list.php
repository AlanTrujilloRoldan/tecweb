<?php

namespace Backend;

require_once __DIR__ . '/Products.php';

use Products\Products;

// Crear una instancia de la clase Products
$productApp = new Products();

// Listar los productos
$productApp->list();

// Devolver los resultados en formato JSON
echo $productApp->getData();
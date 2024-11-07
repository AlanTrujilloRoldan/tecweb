<?php

namespace Backend;

require_once __DIR__ . '/Products.php';

use Products\Products;

// Obtener el ID del producto desde la solicitud GET
$id = $_GET['id'];

// Crear una instancia de la clase Products
$productApp = new Products();

// Obtener el producto por ID
$productApp->single($id);

// Devolver la respuesta en formato JSON
echo $productApp->getData();
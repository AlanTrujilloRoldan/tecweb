<?php

namespace Backend;

require_once __DIR__ . '/Products.php';

use Products\Products;

// Obtener el término de búsqueda desde la solicitud GET
$searchTerm = $_GET['search'];

// Crear una instancia de la clase Products
$productApp = new Products();

// Realizar la búsqueda
$productApp->search($searchTerm);

// Devolver la respuesta en formato JSON
echo $productApp->getData();
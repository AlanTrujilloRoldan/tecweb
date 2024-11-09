<?php
require_once __DIR__ . '/myapi/Products.php';
use TECWEB\MYAPI\Products;

// Obtener el término de búsqueda desde la solicitud GET
$searchTerm = $_GET['search'];
// Crear una instancia de la clase Products
$productApp = new Products('marketzone');
// Realizar la búsqueda
$productApp->search($searchTerm);
// Devolver la respuesta en formato JSON
echo $productApp->getData();
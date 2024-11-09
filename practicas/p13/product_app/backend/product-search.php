<?php
require_once __DIR__ . '/myapi/Read/Read.php';
use TECWEB\MYAPI\Read;

// Obtener el término de búsqueda desde la solicitud GET
$searchTerm = $_GET['search'];
// Crear una instancia de la clase Products
$productApp = new Read('marketzone');
// Realizar la búsqueda
$productApp->search($searchTerm);
// Devolver la respuesta en formato JSON
echo $productApp->getData();
<?php

require_once __DIR__ . '/myapi/Products.php';
use TECWEB\MYAPI\Products;

// Obtener el ID del producto desde la solicitud GET
$id = $_GET['id'];
// Crear una instancia de la clase Products
$productApp = new Products('marketzone');
// Llamar al método delete para eliminar el producto
$productApp->delete($id);
// Devolver la respuesta en formato JSON
echo $productApp->getData();
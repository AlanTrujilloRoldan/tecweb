<?php
require_once __DIR__ . '/../vendor/autoload.php';

use TECWEB\MYAPI\Read\Read;

// Obtener el ID del producto desde la solicitud GET
$id = $_GET['id'];
// Crear una instancia de la clase Products
$productApp = new Read('marketzone');
// Obtener el producto por ID
$productApp->single($id);
// Devolver la respuesta en formato JSON
echo $productApp->getData();
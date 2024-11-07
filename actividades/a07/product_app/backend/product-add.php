<?php
namespace Backend;

use Products\Products;

// Crear una instancia de la clase Products
$productApp = new Products();

// Crear un objeto de producto desde la entrada JSON
$productData = json_decode(file_get_contents('php://input'));

// Llamar al método add para agregar el producto
$productApp->add($productData);

// Devolver la respuesta en formato JSON
echo $productApp->getData();
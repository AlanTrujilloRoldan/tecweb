<?php

namespace Backend;

use Products\Products;

// Obtener el ID del producto desde la solicitud GET
$id = $_GET['id'];

// Crear una instancia de la clase Products
$productApp = new Products();

// Llamar al método delete para eliminar el producto
$productApp->delete($id);

// Devolver la respuesta en formato JSON
echo $productApp->getData();
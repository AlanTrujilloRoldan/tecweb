<?php

require_once __DIR__ . '/myapi/Delete/Delete.php';
use TECWEB\MYAPI\Delete\Delete;

// Obtener el ID del producto desde la solicitud GET
$id = $_GET['id'];
// Crear una instancia de la clase Products
$productApp = new Delete('marketzone');
// Llamar al método delete para eliminar el producto
$productApp->delete($id);
// Devolver la respuesta en formato JSON
echo $productApp->getData();
<?php
include_once __DIR__.'/database.php';

// SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
$producto = file_get_contents('php://input');
if (!empty($producto)) {
    // SE TRANSFORMA EL STRING DEL JSON A OBJETO
    $jsonOBJ = json_decode($producto);

    // Validar si el producto ya existe
    $nombre = $jsonOBJ->nombre;

    // Consulta para verificar si el producto ya existe
    $query = "SELECT * FROM productos WHERE nombre = '{$nombre}' AND eliminado = 0";
    $result = $conexion->query($query);

    if ($result->num_rows > 0) {
        // Si existe, devolver un mensaje
        echo 'El producto ya existe en la base de datos.';
    } else {
        // Preparar la inserción
        $precio = $jsonOBJ->precio;
        $unidades = $jsonOBJ->unidades;
        $modelo = $jsonOBJ->modelo;
        $marca = $jsonOBJ->marca;
        $detalles = $jsonOBJ->detalles;
        $imagen = $jsonOBJ->imagen;

        // Realizar la inserción
        $insertQuery = "INSERT INTO productos (nombre, precio, unidades, modelo, marca, detalles, imagen, eliminado) VALUES ('{$nombre}', '{$precio}', '{$unidades}', '{$modelo}', '{$marca}', '{$detalles}', '{$imagen}', 0)";
        
        if ($conexion->query($insertQuery) === TRUE) {
            echo 'Producto agregado exitosamente.';
        } else {
            echo 'Error al agregar el producto: ' . mysqli_error($conexion);
        }
            
    }

    $conexion->close();
} else {
    echo 'No se recibió información del producto.';
}
?>

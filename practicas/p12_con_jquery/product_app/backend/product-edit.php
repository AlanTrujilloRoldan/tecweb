<?php
include_once __DIR__ . '/database.php';

// SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
$producto = file_get_contents('php://input');
$data = array(
    'status' => 'Error',
    'message' => 'Edición fallida del producto'
);

if (!empty($producto)) {
    // SE TRANSFORMA EL STRING DEL JASON A OBJETO
    $jsonOBJ = json_decode($producto);
    // Se obtiene el ID del producto a editar
    $idProducto = $jsonOBJ->id;

    // SE OBTIENEN LOS DATOS ACTUALES DEL PRODUCTO
    $sqlSelect = "SELECT * FROM productos WHERE id = '{$idProducto}'";
    $resultado = $conexion->query($sqlSelect);
    
    if ($resultado && $resultado->num_rows > 0) {
        $productoActual = $resultado->fetch_assoc();

        // COMPARAR LOS DATOS ACTUALES CON LOS NUEVOS
        if ($productoActual['nombre'] == $jsonOBJ->nombre && 
            $productoActual['marca'] == $jsonOBJ->marca && 
            $productoActual['modelo'] == $jsonOBJ->modelo && 
            $productoActual['precio'] == $jsonOBJ->precio && 
            $productoActual['detalles'] == $jsonOBJ->detalles && 
            $productoActual['unidades'] == $jsonOBJ->unidades) {
            // Si no hay cambios, devolver mensaje de edición fallida
            $data['message'] = "Edición fallida: los datos no han cambiado.";
        } else {
            // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
            $sqlUpdate = "UPDATE productos SET nombre = '{$jsonOBJ->nombre}', marca = '{$jsonOBJ->marca}', modelo = '{$jsonOBJ->modelo}', precio = {$jsonOBJ->precio}, detalles = '{$jsonOBJ->detalles}', unidades = {$jsonOBJ->unidades} WHERE id = '{$idProducto}'";

            $result = $conexion->query($sqlUpdate);

            if ($result) {
                $data['status'] = "Success";
                $data['message'] = "Producto Modificado";
            } else {
                $data['message'] = "ERROR: No se ejecutó $sqlUpdate. " . mysqli_error($conexion);
            }
        }
    } else {
        $data['message'] = "ERROR: Producto no encontrado.";
    }

    // Cierra la conexión
    $conexion->close();
}

// SE HACE LA CONVERSIÓN DE ARRAY A JSON
echo json_encode($data, JSON_PRETTY_PRINT);

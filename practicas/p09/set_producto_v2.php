<?php
// Recibir los datos del formulario
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$unidades = $_POST['unidades'];
$detalles = $_POST['detalles'];
$imagen = $_FILES['imagen']['name'];

/** SE CREA EL OBJETO DE CONEXION */
@$link = new mysqli('localhost', 'root', '12345678a', 'marketzone');

if ($link->connect_errno) {
    die('Falló la conexión: ' . $link->connect_error . '<br/>');
}

/** Preparar la consulta */
$stmt = $link->prepare("SELECT * FROM productos WHERE nombre = ? AND marca = ? AND modelo = ?");
$stmt->bind_param("sss", $nombre, $marca, $modelo);
$stmt->execute();
$result = $stmt->get_result();

/** Inicializar la variable $row */
$row = null;

if ($result) {
    /** Se extraen las tuplas obtenidas de la consulta */
    $row = $result->fetch_all(MYSQLI_ASSOC);
}

/** Liberar resultados */
$stmt->close();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
    <title>Práctica 09</title>
</head>

<body>
    <?php
    // Verificar si $row fue inicializado y tiene datos
    if (isset($row) && !empty($row)) {
        // Si los datos ya existen, mostrar un mensaje de error
        echo "<h2>Error: El producto ya existe en la base de datos.</h2>";
    } else {
        // Definir la carpeta de destino para guardar la imagen
        $directorio = "img/";

        // Generar una ruta única para la imagen en caso de que haya imágenes con nombres repetidos
        $archivoImg = $directorio . basename($imagen);

        // Subir la imagen al servidor
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $archivoImg)) {
            // Guardar la ruta de la imagen en la base de datos
            $imagen_ruta = $archivoImg; // Esta será la ruta que se almacenará: "img/nombreimagen.png"

            // Insertar los datos en SQL
            $SQLquery = "INSERT INTO productos (nombre, marca, modelo, precio, unidades, detalles, imagen, eliminado) VALUES (?, ?, ?, ?, ?, ?, ?, 0)";
            $insertStmt = $link->prepare($SQLquery);
            if ($insertStmt === false) {
                die('Error en la preparación de la consulta: ' . $link->error);
            }

            $insertStmt->bind_param("sssdiss", $nombre, $marca, $modelo, $precio, $unidades, $detalles, $imagen_ruta);

            if ($insertStmt->execute()) {
                echo "<h2>Producto insertado correctamente</h2>";
                echo "<p>Producto insertado con ID: " . $link->insert_id . "</p>";
                echo "<p><strong>Nombre:</strong> $nombre</p>";
                echo "<p><strong>Marca:</strong> $marca</p>";
                echo "<p><strong>Modelo:</strong> $modelo</p>";
                echo "<p><strong>Precio:</strong> $$precio</p>";
                echo "<p><strong>Unidades:</strong> $unidades</p>";
                echo "<p><strong>Detalles:</strong> $detalles</p>";
            } else {
                echo 'El Producto no pudo ser insertado: ' . $insertStmt->error;
            }
            $insertStmt->close(); // Cerrar la declaración de inserción
        } else {
            echo "<h2>Error al subir la imagen.</h2>";
        }
    }
    $link->close(); // Cerrar la conexión aquí
    ?>
</body>

</html>

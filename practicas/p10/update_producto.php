<?php
/* MySQL Conexion*/
@$link = new mysqli('localhost', 'root', '12345678a', 'marketzone_laptops');
// Chequea coneccion
if ($link === false) {
    die("ERROR: No pudo conectarse con la DB. " . mysqli_connect_error());
}


$imagen = $_FILES['imagen']['name'];


if ($imagen == '') {
    // Ejecuta la actualizacion del registro
    $sql = "UPDATE productos SET 
    nombre = '{$_POST['nombre']}', 
    marca = '{$_POST['marca']}', 
    modelo = '{$_POST['modelo']}', 
    precio = '{$_POST['precio']}', 
    unidades = '{$_POST['unidades']}', 
    detalles = '{$_POST['detalles']}'
    WHERE id = '{$_POST['id']}';";

} else {
    // Definir la carpeta de destino para guardar la imagen
    $directorio = "img/";

    // Generar una ruta única para la imagen en caso de que haya imágenes con nombres repetidos
    $archivoImg = $directorio . basename($imagen);

    // Subir la imagen al servidor
    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $archivoImg)) {
        // Guardar la ruta de la imagen en la base de datos
        $imagen_ruta = $archivoImg; // Esta será la ruta que se almacenará: "img/nombreimagen.png"

        $sql = "UPDATE productos SET 
        nombre = '{$_POST['nombre']}', 
        marca = '{$_POST['marca']}', 
        modelo = '{$_POST['modelo']}', 
        precio = '{$_POST['precio']}', 
        unidades = '{$_POST['unidades']}', 
        detalles = '{$_POST['detalles']}', 
        imagen = '$imagen_ruta'
        WHERE id = '{$_POST['id']}';";
    }
}

if (mysqli_query($link, $sql)) {
    header("Location: get_producto_xhtml_v2.php?tope=1800");
    echo "Registro actualizado.";
} else {
    echo "ERROR: No se ejecuto $sql. " . mysqli_error($link);
}
// Cierra la conexion
mysqli_close($link);
?>
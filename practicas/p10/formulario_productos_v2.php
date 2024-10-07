<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
    <title>Práctica</title>
    <script src="./src/main.js"></script>
</head>

<body>
    <h1>Formulario Productos</h1>
    <?php print_r($_POST);?>
    <form action=" " method="post" enctype="multipart/form-data" onsubmit="verificarEntImagen()">
        <fieldset>
            <legend>Información Producto</legend>
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" onblur="verificarEntrada(this,id)" /><br /><br />

            <label for="marca">Marca:</label><br>
            <select id="marca" name="marca" onchange="verificarEntradaSelect(this)" />
            <option value="Apple">Apple</option>
            <option value="Asus">Asus</option>
            <option value="Acer">Acer</option>
            <option value="HP">HP</option>
            <option value="Huawei">Huawei</option>
            <option value="Lenovo">Lenovo</option>
            </select>
            <br /><br />

            <label for="modelo">Modelo:</label><br>
            <input type="text" id="modelo" name="modelo" onblur="verificarEntrada(this,id)" /><br /><br />

            <label for="precio">Precio:</label><br>
            <input type="number" id="precio" name="precio" step="0.01" onblur="verificarEntrada(this,id)" /><br /><br />

            <label for="unidades">Unidades:</label><br>
            <input type="number" id="unidades" name="unidades" onblur="verificarEntrada(this,id)" /><br /><br />

            <label for="detalles">Detalles:</label><br>
            <textarea id="detalles" name="detalles" rows="4" cols="50" onblur="verificarEntDetalles(this)"></textarea><br /><br />

            <label for="imagen">Subir imagen:</label><br>
            <input type="file" id="imagen" name="imagen" accept="image/png"/><br /><br />

            <input type="submit" value="Enviar"/>
        </fieldset>
    </form>

</body>

</html>
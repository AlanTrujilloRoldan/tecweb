<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">

<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
    <title>Práctica 05</title>
</head>

<body>
    <?php
    echo "La variable \$_myvar es válida porque respeta no empezar con un número" . '<br />';
    echo "La variable \$_7myvar es válida porque respeta no empezar con un número" . '<br />';
    echo "La variable myvar NO es válida porque no declara el inicio de la variable con \$" . '<br />';
    echo "La variable \$var7 es válida porque respeta no empezar con un número" . '<br />';
    echo "La variable \$_element1 es válida porque respeta no empezar con un número" . '<br />';
    echo "La variable \$house*5 NO es válida porque contiene un carácter no permitido (*)" . '<br />';    
    ?>
</body>

</html>

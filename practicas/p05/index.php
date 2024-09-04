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


    $a = "ManejadorSQL";
    $b = 'MySQL';
    $c = &$a;
    echo '<br />';
    echo $a. '<br />';
    echo $b. '<br />';
    echo $c. '<br />';

    echo '<br />';
    $a = "PHP server";
    $b = &$a;
    echo $a. '<br />';
    echo $b. '<br />';
    echo $c. '<br />';
    ?>
    <p>
        En el primer bloque, $c refencia a la variable $a, mientras que $b es una variable con un valor distinto 'MySQL'.
        Esto hace que cualquier cambio en $a se refleje en $c, pero no afecta a $b. 
        En el segundo bloque, tanto $b como $c son referencias a $a, lo que significa que cualquier 
        cambio en $a se refleja automáticamente en ambas, haciendo que las tres variables
        compartan el mismo valor "PHP server".
        <br> 
        La principal diferencia es que en el segundo bloque,$b deja de ser una variable independiente
        y se convierte en una referencia a $a, igualando su valor con el de $a y $c.
    </p>
</body>

</html>

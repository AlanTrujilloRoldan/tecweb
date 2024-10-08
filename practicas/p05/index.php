<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
    <title>Práctica 05</title>
</head>

<body>
    
    <p>
        <?php
        echo "La variable \$_myvar es válida porque respeta no empezar con un número.<br />";
        echo "La variable \$_7myvar es válida porque respeta no empezar con un número.<br />";
        echo "La variable myvar NO es válida porque no declara el inicio de la variable con \$.<br />";
        echo "La variable \$var7 es válida porque respeta no empezar con un número.<br />";
        echo "La variable \$_element1 es válida porque respeta no empezar con un número.<br />";
        echo "La variable \$house*5 NO es válida porque contiene un carácter no permitido (*).<br />";
        ?>
    </p>

    <p>
        <?php
        $a = "ManejadorSQL";
        $b = 'MySQL';
        $c = &$a;
        echo $a . '<br />';
        echo $b . '<br />';
        echo $c . '<br />';

        echo '<br />';
        $a = "PHP server";
        $b = &$a;
        echo $a . '<br />';
        echo $b . '<br />';
        echo $c . '<br />';
        ?>
    </p>

    <p>
        En el primer bloque, $c refencia a la variable $a, mientras que $b es una variable con un valor distinto
        'MySQL'.
        Esto hace que cualquier cambio en $a se refleje en $c, pero no afecta a $b.
        En el segundo bloque, tanto $b como $c son referencias a $a, lo que significa que cualquier
        cambio en $a se refleja automáticamente en ambas, haciendo que las tres variables
        compartan el mismo valor "PHP server".
        <br />
        La principal diferencia es que en el segundo bloque, $b deja de ser una variable independiente
        y se convierte en una referencia a $a, igualando su valor con el de $a y $c.
    </p>

    <p>
        <?php
        $a = "PHP 5";
        echo $a . '<br />';

        $z[] = &$a;
        print_r($z);
        echo '<br />';

        $b = "5a versión de PHP";
        echo $b . '<br />';

        $c = (int) $b * 10;
        echo $c . '<br />';

        $a .= $b;
        echo $a . '<br />';

        $b *= $c;
        echo $b . '<br />';

        $z[0] = "MySQL";
        print_r($z);

        echo '<br /><br />';
        echo "\$GLOBALS['a'] = " . $GLOBALS['a'] . " (" . gettype($GLOBALS['a']) . ")<br />";
        echo "\$GLOBALS['b'] = " . $GLOBALS['b'] . " (" . gettype($GLOBALS['b']) . ")<br />";
        echo "\$GLOBALS['c'] = " . $GLOBALS['c'] . " (" . gettype($GLOBALS['c']) . ")<br />";
        echo "\$GLOBALS['z'] = ";
        print_r($GLOBALS['z']);
        echo " (" . gettype($GLOBALS['z']) . ")<br />";
        ?>
    </p>

    <p>
        <?php
        $a = "7 personas";
        echo $a . '<br />';
        $b = (integer) $a;
        echo $b . '<br />';
        $a = "9E3";
        echo $a . '<br />';
        $c = (double) $a;
        echo $c . '<br />';

        $a = "0";
        $b = "TRUE";
        $c = FALSE;
        $d = ($a or $b);
        $e = ($a and $c);
        $f = ($a XOR $b);

        echo '<br />';
        var_dump($a);
        echo '<br />';
        var_dump($b);
        echo '<br />';
        var_dump($c);
        echo '<br />';
        var_dump($d);
        echo '<br />';
        var_dump($e);
        echo '<br />';
        var_dump($f);

        echo '<br /><br />';
        echo var_export($c, true) . '<br />';
        echo var_export($e, true) . '<br />';

        echo '<br />';
        $apacheVersion = $_SERVER['SERVER_SOFTWARE'];
        $phpVersion = phpversion();
        echo $apacheVersion . '<br />';
        echo $phpVersion . '<br />';

        $serverOS = PHP_OS;
        echo $serverOS . '<br />';

        $lenguajeBuscador = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        echo $lenguajeBuscador . '<br />';
        ?>
    </p>
    <p>
        <a href="https://validator.w3.org/markup/check?uri=referer"><img src="https://www.w3.org/Icons/valid-xhtml11"
                alt="Valid XHTML 1.1" height="31" width="88" /></a>
    </p>
</body>

</html>

<?php


function multiplo5y7($numero) {
        $num = $_GET['numero'];
        if ($num%5==0 && $num%7==0)
        {
            echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
        }
        else
        {
            echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
        }
}

function esPar($numero) {
    return $numero % 2 == 0;
}

function esImpar($numero) {
    return $numero % 2 != 0;
}

function matrizAleatoria() {
    $validacion = false;
    $iteraciones = 0;
    $numGenerados = 0;
    $matriz = [];

    while (!$validacion) {
        $num1 = rand(0,999);
        $num2 = rand(0,999);
        $num3 = rand(0,999);

        $matriz[] = [$num1, $num2, $num3];

        $iteraciones++;
        $numGenerados += 3;

        if (esImpar($num1) && esPar($num2) && esImpar($num3)) {
            $validacion = true;
        }
    }
    /*
    foreach ($matriz as $fila) {
        echo implode(", ", $fila) . '<br>';
    }
    */
    echo "<h3>R = $numGenerados números obtenidos en $iteraciones iteraciones</h3>";
}

function primerNumeroEnteroWHILE($numb1) {
    if($numb1 > 0) {
        $valido = false;

        while (!$valido) {
            $numAleatorio = rand(1,999);

            if($numAleatorio % $numb1 == 0) {
                echo "<h3>R = Número aleatorio encontrado: $numAleatorio y es multiplo de $numb1 </h3><br>";
                $valido = true;
            }
        }
    }
}

function primerNumeroEnteroDOWHILE($numb2) {
    if($numb2 > 0) {
        $valido = false;

        do {
            $numAleatorio = rand(1,999);
            if($numAleatorio % $numb2 == 0) {
                echo "<h3>R = Número aleatorio encontrado: $numAleatorio y es multiplo de $numb2 </h3><br>";
                $valido = true;
            }
        } while (!$valido);
    }
}

function imprimirCodigoASCII() {
    $array = array();
    for ($i = 97; $i <= 122; $i++) {
        $array[$i] = chr($i);
    }

    foreach ($array as $k => $valor) {
        echo "<tr><td>$k</td><td>$valor</td></tr>";
    }
}
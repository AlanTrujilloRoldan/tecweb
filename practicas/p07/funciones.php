
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
        $num1 = rand();
        $num2 = rand();
        $num3 = rand();

        $matriz[] = [$num1, $num2, $num3];

        $iteraciones++;
        $numGenerados += 3;

        if (esImpar($num1) && esPar($num2) && esImpar($num3)) {
            $validacion = true;
        }
    }

    echo "<h3>R = $numGenerados números obtenidos en $iteraciones iteraciones</h3>";
}



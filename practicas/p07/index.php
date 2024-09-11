<?php
include "funciones.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 7</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <form action=" " method="GET">
        <input type="number" value="70" name="numero" required>
        <input type="submit" value="Validar Multiplicidad">
        <?php 
            if(isset($_GET['numero'])) 
                multiplo5y7($_GET['numero']);
        ?>
    </form>

    <h2>Ejercicio 2</h2>
    <form action=" " method="POST">
       <input type="submit" name="generar" value="Generar Matriz Aleatoria">
       <br>
        <?php 
            if(isset($_POST['generar'])) 
                matrizAleatoria(); 
        ?>
    </form>

    <h2>Ejercicio 3.1 While</h2>
    <form action=" " method="GET">
        <input type="number" name="numb1" min="1" value="1" required>
        <input type="submit" value="Primer Número Entero">
        <?php 
            if(isset($_GET['numb1'])) {
                primerNumeroEnteroWHILE($_GET['numb1']);
            }
        ?>
    </form>

    <h2>Ejercico 3.2 Do-While</h2>
    <form action=" " method="GET">
    <input type="number" name="numb2" min="1" value="1" required>
        <input type="submit" value="Primer Número Entero">
        <?php 
            if(isset($_GET['numb2'])) {
                primerNumeroEnteroDOWHILE($_GET['numb2']);
            }
        ?>
    </form>

    <h2>Ejercicio 4</h2>
    <table border="1">
        <tr><th>Código ASCII</th><th>Letra</th></tr>
    <?php
    imprimirCodigoASCII();
    ?>
    </table>
</body>
</html>
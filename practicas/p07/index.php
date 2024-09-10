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
        <input type="submit" value="Validar">
        <?php 
            if(isset($_GET['numero'])) 
                multiplo5y7($_GET['numero']);
        ?>
    </form>

    <h2>Ejercicio 2</h2>
    <form action=" " method="POST">
       <input type="submit" name="generar" value="Generar Matriz Aleatoria">
        <?php 
            if(isset($_POST['generar'])) 
                matrizAleatoria(); 
        ?>
    </form>

    <h2>Ejercicio 3</h2>
    <form action=" "></form>
</body>
</html>
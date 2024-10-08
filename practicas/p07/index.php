<?php
include "funciones.php";
include "variables.php";
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

    <h2>Ejercicio 3</h2>
    <form action=" " method="GET">
        <input type="number" name="numb1" min="1" value="1" required>
        <input type="submit" value="Primer Número Entero">
    </form>
    
    <h2>Ejercicio 3.1 While</h2>
    <?php 
        if(isset($_GET['numb1'])) {
            primerNumeroEnteroWHILE($_GET['numb1']);
        }
    ?>

    <h2>Ejercico 3.2 Do-While</h2>
    <?php 
        if(isset($_GET['numb1'])) {
            primerNumeroEnteroDOWHILE($_GET['numb1']);
        }
    ?>

    <h2>Ejercicio 4</h2>
    <table border="1">
        <tr><th>Código ASCII</th><th>Letra</th></tr>
    <?php
    imprimirCodigoASCII();
    ?>
    </table>

    <h2>Ejercicio 5</h2>
    <form action=" " method="POST">
        <label for="sexo">Sexo: </label>
        <select name="sexo" required>
            <option disabled value="0">--Seleccione--</option>
            <option value="hombre">Hombre</option>
            <option value="mujer">Mujer</option>
        </select>
        <br><br>
        <label for="edad">Edad: </label>
        <input type="number" name="edad" min="0" value="18" required>
        <br><br>
        <input type="submit" value="Enviar">
        <?php
        if (isset($_POST['edad']) && isset($_POST['sexo'])) {
            validarSexoEdad($_POST['edad'],$_POST['sexo']);
        }
        ?>
    </form>

    <h2>Ejercicio 6</h2>

    <form action=" " method="POST">
        <label for="matricula" >Matricula: </label>
        <input type="text" name="matricula" maxlength="7">
        <input type="hidden" name="verTodos" value="1">
        <br><br>
        <input type="submit" value="Ver Todos">
        <input type="submit" value="Buscar">
        <br><br><br>
        <?php
            if (isset($_POST['matricula'])) 
                buscarMatricula($_POST['matricula']);
            echo "<br>";
            if (isset($_POST['verTodos'])) 
                print_r($vehiculos);
        ?>
    </form>

    
</body>
</html>
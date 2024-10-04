<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    // Buscar una manera de, dado un número, mostrar los divisores y el número de divisores total. 
    $num = 4;
    $divisor = 0;
    for ($i = 1; $i <= $num; $i++) {
        if ($num % $i == 0) {
            $divisor++;
            echo "$i, ";
        }
    }

    echo "El número total de divisores de $num es: $divisor";

    // 2.- Algortimo que me diga si un número dado es primo o no. (Si su divisor es solo 1 y él mismo)
    echo "<hr>";

    $divisorPrimo = 0;
    $numero = 13;

    for ($j = 1; $j <= $numero; $j++) {
        if ($numero % $j == 0) {
            $divisorPrimo++;
        }
    }

    /* if ($divisorPrimo == 2) {
            echo "$numero es un número primo.";
        } else {
            echo "$numero no es un número primo.";
        } */
    echo ($divisorPrimo == 2) ? "El número $numero SÍ es primo" : "El número $numero NO es primo";

    // Una manera más eficiente mediante falsación
    $flag = true;
    $num1 = 100000000000000000000000;

    for ($i = 2; $i < $num1; $i++) {
        if ($num1 % $i == 0) {
            $flag = false;
            break;
        }
    }
    echo ($flag) ? "<br> El número $num1 SÍ es primo" : "<br> El número $num1 NO es primo";


    echo "<hr>";


    // 2 numeros mayor de 100. Un programa que indique todos los primos entre num1 y num2
    $num1 = 100;
    $num2 = 1000;

    $contador = 0;

    for ($i = $num1; $i <= $num2; $i++) {
        $flag = true;
        for ($j = 2; $j < $i; $j++) {
            if ($i % $j == 0) {
                $flag = false;
                break;
            }
        }
        if ($flag) {
            echo "$i, ";
            $contador++;
        }
    }

    echo "<br> Entre $num1 y $num2 hay $contador divisores.";



    // Un número mayor que 100. Van a darnos un $cantidad= 43, y con eso hay que calcular los 43 primeros primos a partir de num1;

    echo "<hr>";
    $num1 = 120;
    $cantidad = 43;

    echo "<br> Los primeros $cantidad números primos desde $num1 son: ";
    for ($i = $num1;; $i++) {
        $flag = true;
        for ($j = 2; $j < $i; $j++) {
            if ($i % $j == 0) {
                $flag = false;
                break;
            }
        }
        if ($flag) {
            echo "$i, ";
            $cantidad--;
        }
        if ($cantidad == 0) {
            break;
        }
    }

    // Dados un número y una cantidad mostraremos una cantidad de números múltiplos de 7 a partir del número dado
    // Ejemplo: Si el número es 8 y la cantidad 4, mostraré: 14,21,28,35

    echo "<hr>";

    $num1 = 8;
    $cantidad = 4;
    $contador = 0;

        /* for ($i = $num1 ; ; $i++) {
            if ($i % 7 == 0) {
                echo "$i, ";
                $cantidad--;
                $contador++;
            }
            if ($cantidad == 0) {
                break;
            }
        } */

        $i = $num1;
        do {
            
            if ($i % 7 == 0) {
                echo "$i, ";
                $cantidad--;
                $contador++;
            }
            $i++;
            
        } while ($cantidad > 0);

    echo "<br> A partir de $num1, hay un total de $contador múltiplos de 7.";

    // Dos números mayores que 100, buscar entre ambos todos los números múltiplos de 7 (mostrar y contar)
    echo "<hr>";

    $num1 = 4;
    $num2 = 22;
    $contador = 0;

    echo "Los números múltiplos de 7 que se encuentran entre $num1 y $num2 son: ";

    $i = $num1;
    do {
        if ($i % 7 == 0) {
            echo "$i, ";
            $contador++;
        }
        $i++;
    } while ($i <= $num2);

    echo " con un total de $contador múltiplos de 7.";
    ?>

</body>

</html>
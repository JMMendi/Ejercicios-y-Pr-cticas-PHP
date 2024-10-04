<?php

/* 1.- Ejercicio 1: Un comercio realiza descuentos con la siguiente regla:
• Si la compra no alcanza los 100€, no se realiza ningún descuento.
• Si la compra está entre 100€ y 499,99€, se descuenta un 10%.
• Si la compra supera los 500€, se descuenta un 15%.
Dado el monto bruto de una compra, indicar cuánto debe pagar el cliente. Hacer una función “precioFinal(doble
$valor): float

*/

$compra = 254.23;

function precioFinal(float $valor): float
{
    if ($valor < 100) {
        return $valor;
    } elseif ($valor >= 100 && $valor < 500) {
        return $valor -= $valor * 0.1;
    } elseif ($valor >= 500) {
        return $valor -= $valor * 0.15;
    }
}
$resultado = precioFinal($compra);
echo "El precio total por la compra de $compra es: $resultado";

echo "<hr>";

/* 2.- Ejercicio 2: Desarrolla un programa que reciba un número de mes (1, 12) y un número de día de la semana (1, 7) y
devuelva el nombre del mes, el nombre del día de la semana y el número de días de dicho mes (sin tener en cuenta los
bisiestos). Haremos control de errores, es decir, si el número de mes no está entre 1 y 12 o el número del día de la
semana entre 1 y 7 mostraremos un mensaje de error */



function calendario(int $diaSemana, int $mesAnio)
{
    $mes = [
        1 => "Enero",
        2 => "Febrero",
        3 => "Marzo",
        4 => "Abril",
        5 => "Mayo",
        6 => "Junio",
        7 => "Julio",
        8 => "Agosto",
        9 => "Septiembre",
        10 => "Octubre",
        11 => "Noviembre",
        12 => "Diciembre"
    ];
    $dia = [
        1 => "Lunes",
        2 => "Martes",
        3 => "Miércoles",
        4 => "Jueves",
        5 => "Viernes",
        6 => "Sábado",
        7 => "Domingo"
    ];
    $diasTotales = 0;
    if ($diaSemana < 1 || $diaSemana > 7) {
        echo "Error, el día introducido es erróneo.";
    } elseif ($mesAnio < 1 || $mesAnio > 12) {
        echo "Error, el mes introducido es erróneo.";
    } else {
        if ($mesAnio == 2) {
            $diasTotales = 28;
            echo "A día de hoy, estamos en " . $mes[$mesAnio] . " que tiene $diasTotales. Ah, estamos a " . $dia[$diaSemana];
        } elseif ($mesAnio == 4 || $mesAnio == 6 || $mesAnio == 9 || $mesAnio == 11) {
            $diasTotales = 30;
            echo "A día de hoy, estamos en " . $mes[$mesAnio] . " que tiene $diasTotales. Ah, estamos a " . $dia[$diaSemana];
        } else {
            $diasTotales = 31;
            echo "A día de hoy, estamos en " . $mes[$mesAnio] . " que tiene $diasTotales. Ah, estamos a " . $dia[$diaSemana];
        }
    }
}

calendario(5, 7);

echo "<hr>";

/* Ejercicio 3: Desarrolla un programa que reciba un string y que devuelva el número de veces que aparece cada vocal
en el. Comprobaremos que la longitud del string sea mayor que 5.*/

$cadena = "Hola tu, como estas";

/* function contarVocales(string $cadena) : int {
    $contarVocales = 0;
    $vocales = ['a','e','i','o','u'];

    for ($i = 0 ; $i < strtolower(strlen($cadena)) ; $i++) {
        for ($j = 0 ; $j < count($vocales) ; $j++) {
            if ($cadena[$i] == $vocales[$j]) {
                $contarVocales++;
                break;
            }
        }
    }

    return $contarVocales;
} */

function contarVocales(string $cadena)
{
    $numA = 0;
    $numE = 0;
    $numI = 0;
    $numO = 0;
    $numU = 0;

    for ($i = 0; $i < strlen($cadena); $i++) {
        $vocal = $cadena[$i];
        match (strtolower($vocal)) {
            "a" => $numA++,
            "e" => $numE++,
            "i" => $numI++,
            "o" => $numO++,
            "u" => $numU++,
            default => "Pos na"
        };
    };
    echo "Cantidad de A : $numA <br>Cantidad de E : $numE <br>Cantidad de I : $numI <br>Cantidad de O : $numO <br>Cantidad de U : $numU <br>";
}

contarVocales("Oh no estoy atrapado en el IDE ahhhhhh");

/* Ejercicio 4: Desarrolla un programa que compruebe si una palabra o frase es un palíndromo (como las capicúas en
los números. Ejemplos: reconocer, rallar, ‘dábale arroz a la zorra el abad’). Ignoraremos las tildes, pasaremos la cadena
a minúsculas (strtolower()). Pista “strrev()” devuelve una cadena invertida. Cuidado con los espacios en blanco
*/
echo "<hr>";
$texto = "holaaloh";

function comprobarPalindromo(string $cadena)
{
    $palindromo = false;
    $candidato = strrev(strtolower($cadena));
    if ($cadena === $candidato) {
        $palindromo = true;
    }
    echo ($palindromo) ? "$cadena es un palíndromo. YUJU!" : "$cadena no es un palíndromo. Owwww";
}

comprobarPalindromo($texto);

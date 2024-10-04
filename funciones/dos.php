<?php 
// Funciones Anónimas

function suma(int|float $a, int|float $b) : int|float { // Una función de toda la vida
    return $a+$b;
}

$num1 = 100;
$num2 = 456.78;

echo "<br>La suma de n1 y n2 es: ".suma($num1, $num2);

$suma = function(int|float $a, int|float $b) : int|float { // Una función anónima guardada en una variable
    return $a+$b;
};

echo "<br>La suma de n1 y n2 es: ".$suma($num1, $num2);

// Funciones flecha solo (a fecha de hoy) para funciones anónimas de una sola linea y que
// sí o sí devuelven un valor

$suma1 = fn(int|float $a, int|float $b) : int|float => $a+$b;

echo "<br>La suma de n1 y n2 es: ".$suma1($num1, $num2);

//--------------------------------------------------------------------------------------------------------
$pares = fn(int $n) => ($n % 2 == 0);
$multiploTres = fn(int $n) => ($n % 3 == 0);
$primos = function(int $n) {
    if ($n <= 1) {
        return false;
    }
    for ($i = 2 ; $i < $n ; $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}; 

$numeros = range(1,100);

// Filtraremos $numeros por la condición que queramos
function filtrarArray(array $array, callable $filtro) : array{ // callable es una manera de meter por parámetro una función anónima
    $numerosFiltrados = [];
    foreach ($array as $valor) {
        if ($filtro($valor)) $numerosFiltrados[] = $valor;
    }
    return $numerosFiltrados;
}

$arrayPrimos = filtrarArray($numeros, $primos); // creamos un array, filtrándolo mediante el uso de la función
var_dump($arrayPrimos);
$arrayPares = filtrarArray($numeros, $pares);
var_dump($arrayPares);
$array_multiplos7 = filtrarArray($numeros, function($n){
    return ($n % 7 == 0);
});
var_dump($array_multiplos7);

$array_multiplos10 = filtrarArray($numeros, fn(int $n) => ($n % 10 == 0));
var_dump($array_multiplos10);

// --------- O podemos ser listos y usar array_filter()
echo "<hr>";
$misPrimos = array_filter($numeros, $primos);
var_dump($misPrimos);

// Y si queremos hacer una operación sobre un array al completo
$arrayDoble = array_map(fn(int $n) => ($n*2), $numeros);
var_dump($arrayDoble);

$nombres = ['juan', 'pedro' , 'ana', 'lucas', 'maria'];
$nombresBuenos = array_map(fn(string $n) => ucfirst($n), $nombres); // así pones la primera letra de la primera palabra en mayúscula. Si quieres que sean todas las palabras
// usa ucwords = Juan Manuel en vez de Juan manuel 
var_dump($nombresBuenos);

// Ejercicio de replicar el array_map pero de forma manual. Haciendo la función nosotros.

$arrayMap = function(array $nombres, callable $filtro) {
    $array_mapa = []; // no es necesario pero por sí acaso
    foreach ($nombres as $valor) {
        $array_mapa[] = $filtro($valor);
    }
    return $array_mapa;
};

$arrayPrueba = range(1,100);
$filtroMult4 = fn(int $n) => $n*4;

$arrayMapaMult4 = $arrayMap($arrayPrueba, $filtroMult4);
var_dump($arrayMapaMult4);

$misNombres = $arrayMap($nombres, fn(string $n) => ucfirst($n), $nombres);
var_dump($misNombres);
<?php

function suma($a, $b) {
    return $a+$b;
}

function saludo() {
    echo "<br>Hola tú! Soy Mundo!";
}

function suma1(int|float $a, int|float $b): int|float { // Recomendable tipar los valores de los parámetros
    return $a+$b;
}

function isPrimo(int $num) : bool {
    if($num <= 1) {
        return false;
    }
    for ($i = 2 ; $i < $num ; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

$num1=56;
$num2= 67.89;
$primo = 13;

echo "<br>La suma de $num1 y $num2 es: ".suma($num1, $num2);
saludo();
echo "<br>";
echo (isPrimo($primo)) ? "El número $primo es Primo." : "El número $primo NO es primo.";
echo "<hr>";

//-------------------
function saludos(string $nombre="Anónimo") {
    echo "<br>Hola usuario <b>$nombre</b>";
}
saludos();
saludos("Juan Manuel"); // Ponerle un valor por defecto no quiere decir que no le puedas pasar otro.

function saludos1(string $mensaje, string $nombre="Anónimo") {
    echo "<br>$mensaje <b>$nombre</b>";
}
saludos1("Hola usuario: ", "Manolo");
saludos1("Hola usuario: ");

function saludos2(string $mensaje = "Hola usuario: ", string $nombre="Anónimo") {
    echo "<br>$mensaje <b>$nombre</b>";
}

echo "<hr>";
saludos2("Hola valiente usuario: ", "Manolo");
saludos2("Hola usuario: ");
saludos2("Juan Manuel"); // Aquí ya hay problemas, ya que machaca el primer valor por defecto: Juan Manuel Anónimo
saludos2();
saludos2(nombre: "Juan Manuel"); // Así se arregla.

function prueba(string $cad="No pasaste la cadena", int $numero=32) {
    echo "<br>$cad $numero";
}
echo "<hr>";

prueba();
prueba("Cadena por aquí", 23);
prueba("Cadena por allá");
prueba(390);

// Nombre en los argumentos
echo "<hr>";
function datos($nombre, $edad, $email) {
    echo "<br> Nombre: $nombre, Edad: $edad, Correo Electrónico: $email.";
}
datos(email: 'manolo@email.ces', nombre: 'Manolo', edad: 27);
datos('manolo@email.es', 'Manuel', 67); // Aquí saldrá desordenado porque no lo haces en el orden de incialización de parámetros

// Ámbito de las variables
echo "<hr>";

function cambiarNombre(string $usuario) { // Si no le ponemos el &$usuario, no cambiaría el valor de $usuario y después de la función sería user 567
    $usuario = "user000";
    echo "<br>La variable \$usuario dentro de la función: $usuario";

}
$usuario = "user567";
echo "<br>La variable \$usuario fuera de la función y antes de llamarla: $usuario";
cambiarNombre($usuario);
echo "<br>La variable \$usuario fuera de la función y después de llamarla: $usuario";

echo "<hr>";

function cambiarNombreBien(string &$us) { // Ahora sí que cambia el valor. Ahora será user000. Básicamente &$variable es pasar la referencia (da igual el nombre)
    $us = "user000";
    echo "<br>La variable \$usuario dentro de la función: $us";

}
$usuario = "user567";
echo "<br>La variable \$usuario fuera de la función y antes de llamarla: $usuario";
cambiarNombreBien($usuario);
echo "<br>La variable \$usuario fuera de la función y después de llamarla: $usuario";

echo "<hr>";

function cambiarNombreBien2(string $usuario) { // Y si pones global, coge la variable global de fuera y hace la asignación
    global $usuario;
    $usuario = "user000";
    echo "<br>La variable \$usuario dentro de la función: $usuario";

}
$usuario = "user567";
echo "<br>La variable \$usuario fuera de la función y antes de llamarla: $usuario";
cambiarNombreBien2($usuario);
echo "<br>La variable \$usuario fuera de la función y después de llamarla: $usuario";

echo "<hr>"; // Otro ejemplo
function pruebaGlobal() {
    $dato = 67;
}
$dato = 100;
pruebaGlobal();
echo "dato = $dato";

echo "<hr>"; 
function pruebaGlobal1() {
    global $dato;
    $dato = 67;
}
$dato = 100;
pruebaGlobal1();
echo "dato = $dato";



// ----------------------------
// Funciones con número de parámetros indefinidos
echo "<hr>";
function sumaMultiple(...$numeros) : int { // O podría ser sumaMultiple(array $numeros)
    echo "<br><b>Sumaré: ".count($numeros). " Números</b>";
    $suma = 0;
    foreach($numeros as $item) {
        $suma += $item;
    }
    return $suma;
}

$suma = sumaMultiple(1,2,3,4,5,6,7,8,9,10);
echo "<br>La suma es $suma";
$suma = sumaMultiple(5,15);
echo "<br>La suma es $suma";

// vamos a hacerlo como si fuese un array. Primero de la manera inicial y después con el array

function saludosMultiples (...$nombres) : void {
    foreach ($nombres as $item) {
        echo "<br>Hola $item, buenos días!";
    }
}

echo "<hr>";
saludosMultiples("Juan", "Ana", "Pedro", "Ivan");

function saludosMultiples1 (array $nombres) : void { // Y esto con array. Si lo haces así, le tienes que dar un array
    foreach ($nombres as $item) {
        echo "<br>Hola $item, buenos días!";
    }
}

echo "<hr>";
saludosMultiples1(["Juan", "Ana", "Pedro", "Ivan"]);
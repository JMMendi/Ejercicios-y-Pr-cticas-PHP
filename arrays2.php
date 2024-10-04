<?php
$usuarios = [
    'usu1' => 'user45@email.com',
    'usu2' => 'user453@email.com',
    'usu3' => 'user4542@email.com',
    'usu4' => 'user46@email.com',
    'usu5' => 'user4512121@email.com',
    'usu6' => 'user45235671@email.com',
    'userAdmin@email.es',
] ;

// Algunas funciones útiles con arrays

echo "La dimensión de usuarios es: ".count($usuarios)."<br>";
$claves = array_keys($usuarios); // Para coger toooooodas las llaves. No uses Key porque caca.
print_r($claves);
echo "<br>";
$valores = array_values($usuarios); // Para coger tooooooodos los valores. No uses Values porque caca.
print_r($valores);

// Convertir un array en un string
echo "<hr>";
$prueba = ["clave1", "clave2", "manolo", "maria"];
$cadena = implode(", ", $prueba); // implode primero poniendo el separador a usar entre elementos y después el array a convertir en cadena.
echo "<br>$cadena";

// Y ahora transformar un string en array

$cadenita = "PASSWORD1::PASSWORD2::PASSWORD3::JUAN";
$cadenitaA = explode("::", $cadenita); // explode primero el separador que quitar entre elementos y después la cadena a convertir en array.
echo "<br>";
print_r($cadenitaA);

// Compact (sin el Disc)
echo "<hr>";
$email1 = "paco@email.es";
$nombre1 = "Paco";
$edad = 25;
$datos = compact('email1', 'nombre1', 'edad'); // Crea lo siguiente (Y hay que pasarlo sin el $): 

/*
[
    'email1' => 'paco@email.es',
    'nombre1' => 'Paco'
    'edad' => 25
]
*/

// $datos1 = compact('lola'); // Esto devolvería una cadena vacía
print_r($datos);
<?php

// Queremos declarar una persona y un empleado

// OJO! el orden del require es importante. Si pones primero el hijo antes que el padre... no puede.
// ¿Recuerdas que Empleado hereda de Persona? si no existe Persona, no puede recibir la herencia.
require "Persona.php";
require "Empleado.php";


$persona = new Persona("Ana", "Almería");
$empleado = new Empleado("Pepe", "Jaén", "Jefe", "Calle Wallaby");

echo $persona."<br><br>";
echo $empleado;
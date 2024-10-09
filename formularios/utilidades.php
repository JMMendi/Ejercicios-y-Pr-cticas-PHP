<?php

$provincias = [
    'Almería',
    'Granada',
    'Sevilla',
    'Cádiz',
    'Jaén',
    'Huelva',
    'Córdoba',
    'Málaga'
];
$aficiones = [
    'Evadir Impuestos™',
    'Ciclismo',
    'Videojuegos',
    'Cine'
];

// Funcion para limpiar y sanear las cadenas
function limpiarCadenas(string $nombre): string
{
    return htmlspecialchars(trim($nombre));
};

// Para mostrar los errores
function pintarErrores(string $nombreVarSesion)
{
    if (isset($_SESSION[$nombreVarSesion])) {
        echo "<p class='text-red-500 italic mt-4 text-sm'>".$_SESSION[$nombreVarSesion]."</p>";
        unset($_SESSION[$nombreVarSesion]);
    }
};

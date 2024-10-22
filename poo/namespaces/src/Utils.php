<?php
namespace src;

// Extensión útil: PHP namespace resolver <----

const MAY_ON=1;
const MAY_OFF=0;

class Utils{
    public static function saludo(string $nombre) {
        echo "Hola {$nombre}, Buenos días!";
    }
}

<?php

class Usuario2{
    public function __construct(
        private string $nombre,
        private string $provincia,
        private float $sueldo
        )
    {
        
    }

}

$usuario= new Usuario2("Manolo", "Almería", 1123.45);
var_dump($usuario);

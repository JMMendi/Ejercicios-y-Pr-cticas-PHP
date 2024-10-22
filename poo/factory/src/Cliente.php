<?php

namespace src;

// readonly implica que, cuando instancias el objeto con un valor, no se puede cambiar. Es como hacerlo una constante

class Cliente {
    public function __construct(public readonly int $totalCompra)
    {
        
    }

    public function getPrecioFinal(float $descuento) : float {
        return $this->totalCompra*(1-$descuento/100);
    }
}
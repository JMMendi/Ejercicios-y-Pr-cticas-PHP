<?php

namespace src;

// La idea de esto es una tienda que ofrece descuentos según cuanto se gasta

Interface Plan{
    function getDescuento() : int;
}
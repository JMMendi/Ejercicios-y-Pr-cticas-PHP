<?php
// Cliente Frontend
namespace src\Frontend;

class Cliente
{
    public function __construct(private string $nombre) {
        echo "<br>Creado un objeto Cliente del frontend.";
    }

    /**
     * Get the value of nombre
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function __toString() : string
    {
        return "Nombre: {$this->getNombre()}";   
    }
}

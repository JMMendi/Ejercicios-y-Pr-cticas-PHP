<?php
// Cliente Backend
// El namespace es importante. Mira los apuntes
namespace src\Backend;


class Cliente
{
    public function __construct(private string $nombre) {
        echo "<br>Creado un objeto Cliente del backend.";
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

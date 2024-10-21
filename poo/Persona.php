<?php

class Persona{
    

    public function __construct(
        private string $nombre,
        private string $provincia
    )
    {
        
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

    /**
     * Get the value of provincia
     */
    public function getProvincia(): string
    {
        return $this->provincia;
    }

    /**
     * Set the value of provincia
     */
    public function setProvincia(string $provincia): self
    {
        $this->provincia = $provincia;

        return $this;
    }
}
<?php

namespace src;

class Usuario {
    private string $nombre;
    private string $apellidos;
    private string $pais;
    private string $perfil;

    public function __construct(
        
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
     * Get the value of apellidos
     */
    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     */
    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get the value of pais
     */
    public function getPais(): string
    {
        return $this->pais;
    }

    /**
     * Set the value of pais
     */
    public function setPais(string $pais): self
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get the value of perfil
     */
    public function getPerfil(): string
    {
        return $this->perfil;
    }

    /**
     * Set the value of perfil
     */
    public function setPerfil(string $perfil): self
    {
        $this->perfil = $perfil;

        return $this;
    }
}
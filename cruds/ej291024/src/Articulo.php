<?php

namespace App;

Class Articulo extends Conexion {
    private int $id;
    private string $nombre;
    private string $descripcion;
    private float $precio;
    private int $stock;

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
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
     * Get the value of descripcion
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     */
    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of precio
     */
    public function getPrecio(): float
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     */
    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get the value of stock
     */
    public function getStock(): int
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     */
    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }
}
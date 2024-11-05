<?php

namespace Src;

class Usuario {
    private string $nombre;
    private string $apellido;
    private string $email;
    private string $username;
    private string $ciudad;
    private string $pais;
    private string $card;
    private string $perfil;
    private int $edad;

    // toda constante en una clase es Static, es decir, se accede con self o con ::
    private const PERFILES = ['Admin', 'User', 'Guest', 'Root'];


    /**
     * Set the value of nombre
     */
    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Set the value of apellido
     */
    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Set the value of username
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set the value of ciudad
     */
    public function setCiudad(string $ciudad): self
    {
        $this->ciudad = $ciudad;

        return $this;
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
     * Set the value of card
     */
    public function setCard(string $card): self
    {
        $this->card = $card;

        return $this;
    }

    /**
     * Set the value of perfil
     */
    public function setPerfil(string $perfil): self
    {
        $this->perfil = $perfil;

        return $this;
    }

    /**
     * Set the value of edad
     */
    public function setEdad(int $edad): self
    {
        $this->edad = $edad;

        return $this;
    }

    //--------------------------------------
    public static function crearUsuarios(int $cantidad) : array {
        $usuarios = [];
        $faker=\Faker\Factory::create('es-ES');
        for ($i = 0 ; $i < $cantidad ; $i++) {
            $nombre = $faker->firstName();
            $apellidos = $faker->lastName(). " " . $faker->lastName();
            $email = $faker->unique()->email();
            $user = $faker->unique()->userName();
            $ciudad = $faker->city();
            $pais = $faker->country();
            $card = $faker->unique()->creditCardNumber('Visa', true);
            $perfil = $faker->randomElement(self::PERFILES);
            $edad = random_int(18,99); // o $faker->numberBetween(18,99);
            $usuario = (new Usuario)
            ->setNombre($nombre)
            ->setApellido($apellidos)
            ->setEmail($email)
            ->setUsername($user)
            ->setCiudad($ciudad)
            ->setPais($pais)
            ->setCard($card)
            ->setPerfil($perfil)
            ->setEdad($edad);
            $usuarios [] = $usuario;
        }
        

        return $usuarios; 
    }


}
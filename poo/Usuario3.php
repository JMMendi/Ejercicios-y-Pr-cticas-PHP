<?php


class Usuario
{
    private string $nombre;
    private string $provincia;
    private bool $isAdmin;
    private float $sueldo;
    private static int $cont = 0;

    public function __construct()
    {
        self::$cont++;
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

    /**
     * Get the value of isAdmin
     */
    public function isIsAdmin(): bool
    {
        return $this->isAdmin;
    }

    /**
     * Set the value of isAdmin
     */
    public function setIsAdmin(bool $isAdmin): self
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    /**
     * Get the value of sueldo
     */
    public function getSueldo(): float
    {
        return $this->sueldo;
    }

    /**
     * Set the value of sueldo
     */
    public function setSueldo(float $sueldo): self
    {
        $this->sueldo = $sueldo;

        return $this;
    }

    // Getter de $cont

    public static function getCont() : int {
        return self::$cont;
    }

    // Método toString - Podemos llamarlo con el this->valor o usando los getters
    public function __toString() : string
    {
        $soyAdmin=($this->isAdmin) ? "Administrador" : "Usuario Normal";
        return "El nombre es: <b>$this->nombre</b>,
         la provincia es: <b>$this->provincia</b>,
          con un sueldo de: <i>$this->sueldo</i>
           y el tipo de usuario es: <b>$soyAdmin</b>, has instanciado: ".self::$cont." objetos.<br>";
    }
};

$usuario1 = (new Usuario)
    ->setNombre("Pedro")
    ->setProvincia("Granada")
    ->setIsAdmin(true)
    ->setSueldo(1234.75);


echo "USUARIO 1";
var_dump($usuario1);
echo "<br>";
// Vamos a copiar objetos

echo "USUARIO 2";
$usuario2 = $usuario1;
var_dump($usuario2);
echo "<br>";

$usuario2->setProvincia("Lugo");

echo "USUARIO 1";
var_dump($usuario1);
echo "<br>";

echo "USUARIO 2";
$usuario2 = $usuario1;
var_dump($usuario2);
echo "<br>";

// Parece la copia BIEN y no hacer aliasing...

$usuario3 = clone($usuario1);

echo "USUARIO 1";
var_dump($usuario1);
echo "<br>";

echo "USUARIO 2";
$usuario2 = $usuario1;
var_dump($usuario2);
echo "<br>";

echo "USUARIO 3";
var_dump($usuario3);
echo "<br>";

echo "<hr>";
// Son 3 copias iguales. 1 y 2 por referencia 1 y 3 por clonación. Si cambiamos algo de 3...

$usuario3->setProvincia("Ourense");


echo "USUARIO 1";
var_dump($usuario1);
echo "<br>";

echo "USUARIO 2";
$usuario2 = $usuario1;
var_dump($usuario2);
echo "<br>";

echo "USUARIO 3";
var_dump($usuario3);
echo "<br>";

echo "<hr><br>";

// Para mostrar la información de un objeto, necesitamos implementar el método function __toString() que debemos declararlo.
echo $usuario1;

// Para saber la clase de un objeto llamamos al get_class(objeto)
echo "<br> La clase del usuario3 es: ";
echo get_class($usuario3);

// Ó (pero esto todavía no. Usa lo de arriba)

echo "<br> La clase del usuario3 es: ";
echo "-->Clase usuario:".Usuario::class;

// Para acceder a los métodos estáticos...

echo "<br> Las instancias son: ".Usuario::getCont();
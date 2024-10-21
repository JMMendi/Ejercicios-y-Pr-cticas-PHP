<?php
// Creando clases
class Usuario
{
    // Tipar los datos es MUY recomendado. Se hace como en Java
    private string $nombre;
    private string $provincia;
    private bool $isAdmin;
    private float $sueldo;
    private static int $cont = 0;

    // Así se hace el constructor. Esto implica que NO hay sobrecarga de métodos
    public function __construct()
    {
        // vamos a "trampear" para sobrecargar el constructor. Cogiendo el número de argumentos del constructor...
        $num = func_num_args();
        var_dump(func_get_args()); // func_get_arg(0/1/2/3...) == func_get_args()[0/1/2/3...] 

        // para el número de argumentos hay que hacer lo del argumento más los anteriores. Claramente esto no nos sirve
        /* match ($num) {
            0 => "hola",
            1 => $this->nombre = func_get_arg(0),
            2 => $this->provincia = func_get_arg(1),
            3 => $this->isAdmin = func_get_arg(2),
            4 => $this->sueldo = func_get_arg(3)
        }; */

        if ($num == 1) {
            $this->setNombre(func_get_arg(0));
        }
        if ($num == 2) {
            $this
                ->setNombre(func_get_arg(0))
                ->setProvincia(func_get_arg(1));
        }


        // Para acceder a los atributos se usan la flecha -> en vez de this.nombre
        // $this -> nombre=$nombre;

        // Para acceder a los atributos estáticos se usa el self::      
        self::$cont++;
    }

    // Para los getters y setters, puedes instalarte la extensión PHP Getters $ Setters (CV fork). El de 5 estrellas
    // Dale click derecho en un atributo y mira los opciones

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

    // Vamos a hacer el get de $cont
    /**
     * Get the value of cont
     */
    public static function getCont(): int
    {
        return self::$cont;
    }
}

// --------

/* $usuario = new Usuario("Pedro Gutierrez");

var_dump($usuario);
echo "<br>";

echo Usuario::$cont;

$usuario = new Usuario("Ana Pastor Amor");

var_dump($usuario);
echo "<br>";

// Así se muestra el atributo de clase $cont
echo Usuario::$cont;

// Si queremos asignar valores a un atributo público... (primero ponlo público)

// $usuario -> provincia="Almería";

// Y a uno privado... no podremos! Desde fuera al menos

 // $usuario-> sueldo = 123.23;
 */

//--------------------------------

// Usando un constructor con setters, se declaran así. Esto es el ****Fluent Interface****
$usuario = (new Usuario)
    ->setNombre("Pedro")
    ->setProvincia("Granada")
    ->setIsAdmin(true)
    ->setSueldo(1234.75);

var_dump($usuario);
echo "<br>";

// Para ver el $cont, llamamos al getCont

echo Usuario::getCont();

// :: es para atributos de clase estáticos. -> para atributos de clase no estáticos
// Se puede hacer $usuario::getCont() pero es mejor hacerlo como Usuario, como la clase

$usuario1 = (new Usuario("Ana Pastor Amor"));
var_dump($usuario1);
echo "<br>";

$usuario2 = (new Usuario("Alex Lumbago", "Sevilla"));
var_dump($usuario2);
echo "<br>";

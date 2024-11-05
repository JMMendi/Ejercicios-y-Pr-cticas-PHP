<?php

namespace App;

use \PDOException;
use \PDO;

class Articulo extends Conexion
{
    private int $id;
    private string $nombre;
    private string $descripcion;
    private float $precio;
    private int $stock;

    // ------------------------------------ CRUD ---------------------------------------
    // Esta función crear es plantilla. Lo único a cambiar sería la query realmente 
    public function crear()
    {
        // Preparamos la inserción a la tabla
        $q = "insert into articulos(nombre, descripcion, precio, stock) values(:n, :d, :p, :s)";
        // El statement (stmt) llamamos al padre para getConexion y preparamos la query
        $stmt = parent::getConexion()->prepare($q);
        try {
            $stmt->execute([
                ':n' => $this->nombre,
                ':d' => $this->descripcion,
                ':p' => $this->precio,
                ':s' => $this->stock
            ]);
        } catch (PDOException $ex) {
            throw new \Exception("Error en create: " . $ex->getMessage(), 1);
        } finally {
            parent::cerrarConexion();
        }
    }

    // Métodos para crear registros en faker

    public static function crearArticulosFaker(int $cantidad)
    {
        $faker = \Faker\Factory::create("es_ES");
        for ($i = 0; $i < $cantidad; $i++) {
            $nombre = ucfirst($faker->unique()->words(random_int(3, 5), true));
            $descripcion = ucfirst($faker->text());
            $stock = random_int(5, 20);
            $precio = $faker->randomFloat(2, 10, 9999);

            (new Articulo)
                ->setNombre($nombre)
                ->setDescripcion($descripcion)
                ->setPrecio($precio)
                ->setStock($stock)
                ->crear();
        }
    }

    // --------------------------------------------------------------------------------------
    public static function getArticuloById(int $id) : bool|Articulo {
        $q = "select * from articulos where id=:i";
        $stmt = parent::getConexion()->prepare($q);

        try {
            $stmt->execute([':i' => $id]);
        } catch (PDOException $ex) {
            throw new \Exception("Error en getArticuloById: " . $ex->getMessage(), 1);
        } finally {
            parent::cerrarConexion();
        }
        $stmt -> setFetchMode(PDO::FETCH_CLASS, Articulo::class); // Esto hay que hacerlo para que no te lance un error
        $articulo = $stmt->fetch();
        //$articulo = $stmt->fetch(PDO::FETCH_CLASS, Articulo::class);
        return $articulo;
        // Si no encuentro el artículo, devuelve falso. Si lo encuentra, devuelve el artículo.

    }

    

    // ------------------------------------------------------- READ -------------------------
    public static function read(): array
    {
        $q = "select * from articulos order by id desc";
        $stmt = parent::getConexion()->prepare($q);

        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            throw new \Exception("Error en Read: " . $ex->getMessage(), 1);
        } finally {
            parent::cerrarConexion();
        }

        return $stmt->fetchAll(PDO::FETCH_OBJ);
        // FETCH_OBJ te los devuelve como objetos (es decir, que si quieres acceder, sería con el foreach $item->id)
        // FETCH_ASSOC te lo devuelve como array asociativo (es decir, que si quieres acceder, sería con $item['id'])
        // FETCH_CLASS, Articulo::class <- te devuelve un array de artículos. Accederías con los getters (porque son privados los atributos)
        // Puedes llamar al var_dump en borrar.php para comprobar las diferencias
    }


    // --------------------------------- Método para comprobar si el nombre del artículo está duplicado

    public static function existeArticulo(string $nomArticulo, ?int $id=null) : bool {

        $q = ($id==null) ? "select count(*) as total from articulos where (nombre = :n)" :
        "select count(*) as total from articulos where (nombre = :n) AND id <> :i"; // Fijate que el select count(*) le he puesto un alias: total. Eso se usará en el return.
        $stmt = parent::getConexion()->prepare($q);

        try {
            ($id == null) ? $stmt->execute([':n' => $nomArticulo]) : $stmt->execute([':n' => $nomArticulo, ':i' => $id]); // Cuando se pasa una variable por :letra, se pone como en un Array en el execute
        } catch (PDOException $ex) {
            throw new \Exception("Error en existeArticulo: ". $ex->getMessage(), 1);
        } finally {
            parent::cerrarConexion();
        }
        $filas = $stmt->fetch(PDO::FETCH_OBJ); // Con fetch (sin el all), coge solo el primer elemento.
        // $filas = $stmt -> fetchAll(PDO::FETCH_OBJ)[0];
        // return ($filas['total'] > 0;)
        return ($filas->total>0); // ¿Recuerdas el total? Accedes a total con la flecha (por ser un objeto) y compruebas si es 1 o 0
    }


    // -------------------------------------  DELETE  ---------------------------------------------
    public static function delete(int $id) {
        $q = "delete from articulos where id = :i";
        $stmt = parent::getConexion()->prepare($q);

        try {
            $stmt->execute([':i' => $id]); 
        } catch (PDOException $ex) {
            throw new \Exception("Error en delete: ". $ex->getMessage(), 1);
        } finally {
            parent::cerrarConexion();
        }


    }

    // -------------------------------------- Update -----------------------------------------------
    public function update(int $id) {
        $q = "update articulos set nombre=:n, descripcion=:d, precio=:p, stock=:s where id=:i";
        $stmt = parent::getConexion()->prepare($q);
        try {
            $stmt->execute([
                ':n' => $this->nombre,
                ':d' => $this->descripcion,
                ':p' => $this->precio,
                ':s' => $this->stock,
                ':i' => $id
            ]);
        } catch (PDOException $ex) {
            throw new \Exception("Error en update: " . $ex->getMessage(), 1);
        } finally {
            parent::cerrarConexion();
        }
    }

    


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

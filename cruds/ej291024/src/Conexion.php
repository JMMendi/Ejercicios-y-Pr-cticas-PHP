<?php
// RECUERDA INSTALAR DOTENV EN VISUAL STUDIO CODE


namespace App;

use \Exception;
use \PDO; // Pondremos la barra de inicio "\" en cualquier clase y constante que no esté en src
use \PDOException;

class Conexion
{
    private static ?PDO $conexion = null; // PDO permite transformar los datos de una base de datos en clases de php para facilitar transformaciones
    // ponerle un ? implica que o puede ser o un tipo de dato o un nulo

    public static function getConexion(): ?PDO
    {
        if (self::$conexion === null) {
            self::setConexion();
        }
        return self::$conexion;
    }
    // Si no hay una conexión, te establece una. Si no, te devuelve la conexión que ya tiene

    public static function setConexion()
    {
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__."/../");
        $dotenv->load();
        // Por regla general te pone el __DIR__, como está buscando el .env, hay que mapearlo poniendo donde está

        // Cargamos las variables del archivo de .env

        $usuario = $_ENV['USUARIO'];
        $host = $_ENV['HOST'];
        $port = $_ENV['PORT'];
        $database = $_ENV['DATABASE'];
        $password = $_ENV['PASSWORD'];

        // Creamos el dsn (descriptor de nombre de servicio), en nuestro caso para mysql
        $dsn = "mysql:dbname=$database; port=$port; host=$host; charset=utf8mb4;"; // utf8mb4 es para también incluir emoticonos
        $option=[
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT=>true
        ];

        try{
            self::$conexion = new PDO ($dsn, $usuario, $password, $option);
        } catch (PDOException $ex) {
            throw new Exception("Error en la conexión: {$ex->getMessage()}", 1);
        }
    }
    
    public static function cerrarConexion() {
        self::$conexion = null;
    }
}

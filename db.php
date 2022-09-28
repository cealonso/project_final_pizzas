<?php


/**
 * Db Clase para trabajar con Bases de Datos usando PDO
 * 
 * 
 * @author Claudio Alonso <cealonso@gmail.com>
 * @link https://github.com/cealonso/php-mysql-pdo-database-class
 * @version 1.0.0
 * @copyright 2022 
 * 
 */

class Db
{

    protected $connection;

    /**
     * Constructor para obtener una conexion.
     * @return connection
     */

    public function __construct()
    {
        try {
            $options = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"];
            $this->connection = new PDO("mysql:host=" . SERVER_NAME . ";dbname=" . DATABASE_NAME, USER_NAME, PASSWORD, $options);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("ERROR: Could not connect. " . $e->getMessage());
        }
        return $this->connection;
    }

    /**
     * Prepara una SQL Query
     * 
     * @param String $query
     * @return object
     */

    public function prepare($query)
    {
        return $this->connection->prepare($query);
    }


    /**
     * Ejecuta una SQL Query
     * 
     * @param String $query
     * @return object
     */

    public function query($query)
    {
        return $this->connection->query($query);
    }


    /**
     * Cierra una conexion
     *
     * @return void
     */
    public function Close()
    {
        $this->connection = null;
    }
}

<?php

class Database {

    private static $host = "localhost";
    private static $dbname = "academia_app";
    private static $username = "root";
    private static $password = "";

    private static $conexion = null;

    public static function getConexion() {
        if (self::$conexion == null) {
            try {
                self::$conexion = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$username, self::$password);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            } catch (PDOException $e) {
                throw new Exception("Error de conexión: " . $e->getMessage());
            }
        }
        return self::$conexion;
    }
}
?>

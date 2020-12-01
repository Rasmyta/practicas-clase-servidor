<?php
namespace Incidencias;
use \PDO;
use \PDOException;

class ConexionDB {

    private static $MySQL_host;
    private static $MySQL_user;
    private static $MySQL_password;
    private static $MySQL_database;
    private static $conexion;

    public static function conectar($database,$host="localhost",$user="admin",$password="admin") {
        self::$MySQL_host = $host;
        self::$MySQL_user = $user;
        self::$MySQL_password = $password;
        self::$MySQL_database = $database;
        try {
		    $dsn = "mysql:host=".self::$MySQL_host.";dbname=".self::$MySQL_database;
            self::$conexion = new PDO($dsn, self::$MySQL_user,  self::$MySQL_password);
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$conexion;
		} catch (PDOException $e){
		    echo $e->getMessage();
        }
    }

    public static function desconectar() {
        self::$conexion = null;
    }


}

/*
$consulta = "SELECT * FROM empleados";

$conexion = ConexionDB::conectar("2daw");

$stmt = $conexion->prepare($consulta);
$stmt->execute();
$count = $stmt->rowCount();
echo $count;

ConexionDB::desconectar();
*/
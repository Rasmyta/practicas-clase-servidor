<?php
namespace Songs;
use MongoDB\Client;

require 'vendor/autoload.php';

class ConexionDB {

    private static $conexion;

    public static function conectar($database,$host="mongodb://localhost:27017",$user="admin",$password="admin") {
        try {
            //self::$conexion = new Client($host, array('username' => $user, 'password' => $password, 'ssl' => false) );
            self::$conexion = (new Client($host))->{$database};
        } catch (Exception $e){
            echo $e->getMessage();
        }

        return self::$conexion;
    }

    public static function desconectar() {
        self::$conexion = null;
    }

}
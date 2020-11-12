<?php
namespace Carrodelacompra;

include_once('ConexionDB.php');
include_once('Producto.php');
use Carrodelacompra\Producto;
use Carrodelacompra\ConexionDB;
use \PDO;

class ProductoDB {

    //Devuelve todos los productos de la BD como objetos
    public static function getProductos() {

        $consulta = "SELECT * FROM productos";

        $conexion = ConexionDB::conectar("tienda");

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Carrodelacompra\Producto");
        
        ConexionDB::desconectar();
        return $resultado;
        

    }

        //Devuelve todos los productos de la BD como objetos
        public static function getProductoId($unId) {

            $consulta = "SELECT * FROM productos WHERE id = :id";
    
            $conexion = ConexionDB::conectar("tienda");
    
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam(":id",$unId);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Carrodelacompra\Producto");
            $resultado = $stmt->fetch();
            
            ConexionDB::desconectar();
            return $resultado;
            
    
        }





}

<?php
namespace Carrodelacompra;

use Carrodelacompra\Producto;
use Carrodelacompra\ConexionDB;
use \PDO;
use \PDOException;

class ProductoDB {

    //Devuelve todos los productos de la BD como objetos
    public static function getProductos() {

        $consulta = "SELECT * FROM productos";

        $conexion = ConexionDB::conectar("tienda");

        try {
            $stmt = $conexion->prepare($consulta);
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Carrodelacompra\Producto");
        } catch (PDOException $e){
		    echo $e->getMessage();
        }  
          
        ConexionDB::desconectar();
        return $resultado;
        

    }

    //Devuelve todos los productos de la BD como objetos
    public static function getProductoId($unId) {

        $consulta = "SELECT * FROM productos WHERE id = :id";

        $conexion = ConexionDB::conectar("tienda");

        try {
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam(":id",$unId);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Carrodelacompra\Producto");
            $resultado = $stmt->fetch();
        } catch (PDOException $e){
		    echo $e->getMessage();
        } 

        ConexionDB::desconectar();
        return $resultado;
        

    }





}
